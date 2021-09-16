<?php

namespace App\Http\Controllers;

use App\CategoryTranslation;
use App\Models\Category;
use App\Utility\CategoryUtility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('parent_id','!=' , 0)
            ->with('childrenCategories')
            ->get();
        return view('categories.index', ['categories' => $categories]);
    }
    public function addCategory()
    {  $categories = Category::where('parent_id','===' , 0)
        ->with('childrenCategories')
        ->get();
        return view('categories.create', ['categories' => $categories]);
    }

    public function submitCategory(Request $request): \Illuminate\Http\RedirectResponse
    {
        $category = new Category;
        $category->name = $request->name;
        $category->order_level = 0;
        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = 0;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }

        if ($request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if ($request->commision_rate != null) {
            $category->commision_rate = $request->commision_rate;
        }


        $category->save();

        $category_translation = CategoryTranslation::firstOrNew(['lang' => 'English', 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        session()->flash('message', 'Category has been inserted successfully');
        return redirect()->route('category');
    }

    public function updateFeatured(Request $request): int
    {
        $category = Category::findOrFail($request->id);
        $category->featured = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::findOrFail($id);

        // Category Translations Delete
        foreach ($category->category_translations as $key => $category_translation) {
            $category_translation->delete();
        }

//        foreach (Product::where('category_id', $category->id)->get() as $product) {
//            $product->category_id = null;
//            $product->save();
//        }

        CategoryUtility::delete_category($id);

        session()->flash('message', 'Category has been deleted successfully');
//        flash('Category has been deleted successfully')->success();
        return redirect()->route('category');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id','===' , 0)
            ->with('childrenCategories')
            ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=' , $category->id)
            ->orderBy('name','asc')
            ->get();

        return view('categories.edit',  ['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {

        $category = Category::findOrFail($id);

            $category->name = $request->name;

        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = 0;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $previous_level = $category->level;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }
        else{
            $category->parent_id = 0;
            $category->level = 0;
        }

        if($category->level > $previous_level){
            CategoryUtility::move_level_down($category->id);
        }
        elseif ($category->level < $previous_level) {
            CategoryUtility::move_level_up($category->id);
        }

        if ($request->slug != null) {
            $category->slug = strtolower($request->slug);
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }


        if ($request->commision_rate != null) {
            $category->commision_rate = $request->commision_rate;
        }

        $category->save();

        $category_translation = CategoryTranslation::firstOrNew(['lang' => 'English', 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        session()->flash('message', 'Category has been updated successfully');
        return redirect()->route('category');
    }
}

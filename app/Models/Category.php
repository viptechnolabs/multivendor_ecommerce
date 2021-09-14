<?php

namespace App\Models;

use App\CategoryTranslation;
use App\CustomerProduct;
use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    public const    CATEGORY = [
        'handloom' => 'Handloom',
        'grocery' => 'Grocery',
    ];

    public function category_translations(){
        return $this->hasMany(CategoryTranslation::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function classified_products(){
        return $this->hasMany(CustomerProduct::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}

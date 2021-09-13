<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        dd('category');
    }
    public function addCategory()
    {
        return view('categories.create');
    }

    public function submitCategory(Request $request)
    {
        dd($request->all());
    }
}

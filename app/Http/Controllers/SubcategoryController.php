<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SubcategoryController extends Controller
{
    //
    public function addsubcategory(){
        $view_categories = Category::all();
        return view('dashboard.admin.addsubcategory', compact('view_categories'));
    }

    public function createsubcategory(Request $request){
        $request->validate([
            'category_id' => ['required', 'string', 'max:255'],
        ]);
        $add_subcategory = new Subcategory();
        $add_subcategory->category_id = $request->category_id;
        $add_subcategory->subcategory = $request->subcategory;
        $add_subcategory->slug = SlugService::createSlug(Category::class, 'slug', $request->subcategory);
        $add_subcategory->ref_no = substr(rand(0,time()),0, 9);
        $add_subcategory->save();
        return redirect()->back()->with('success', 'You have created successfully');
    }
}

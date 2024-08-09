<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    //
    public function addcategory(){

        return view('dashboard.admin.addcategory');
    }

    public function createcategory(Request $request){
        $request->validate([
            'category' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        $add_category = new Category();
        $add_category->slug = SlugService::createSlug(Category::class, 'slug', $request->category);
        $add_category->category = $request->category;
        $add_category->ref_no = substr(rand(0,time()),0, 9);

        $add_category->save();
        return redirect()->back()->with('success', 'You have created successfully');
        
    }

    public function viewcategory(){
        $view_categories = Category::all();
        return view('dashboard.admin.viewcategory', compact('view_categories'));
    }

    public function editcategory($id){
        $edit_categories = Category::find($id);
        return view('dashboard.admin.editcategory', compact('edit_categories'));
    }

    
    public function updatecategory(Request $request, $id){
        $edit_categories = Category::find($id);

        $request->validate([
            'category' => ['required', 'string', 'max:255'],
        ]);
        
        $edit_categories->category = $request->category;
        $edit_categories->update();
        return redirect()->back()->with('success', 'You have created successfully');
        
    }

    
}

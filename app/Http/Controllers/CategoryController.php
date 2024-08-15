<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Root;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    //
    public function addcategory(){
        $view_roots = Root::all();
        return view('dashboard.admin.addcategory', compact('view_roots'));
    }

    public function createcategory(Request $request){
        $request->validate([
            'category' => ['required', 'string', 'max:255', 'unique:categories'],
            'root_id' => ['required', 'string', 'max:255'],
        ]);
        $add_category = new Category();
        $add_category->slug = SlugService::createSlug(Category::class, 'slug', $request->category);
        $add_category->category = $request->category;
        $add_category->root_id = $request->root_id;
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
        $view_roots = Root::all();

        return view('dashboard.admin.editcategory', compact('view_roots', 'edit_categories'));
    }

    
    public function updatecategory(Request $request, $id){
        $edit_categories = Category::find($id);

        $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'root_id' => ['required', 'string', 'max:255'],
        ]);
        
        $edit_categories->category = $request->category;
        $edit_categories->root_id = $request->root_id;
        $edit_categories->update();
        return redirect()->back()->with('success', 'You have created successfully');
        
    }

    
}

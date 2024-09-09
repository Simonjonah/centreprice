<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SubcategoryController extends Controller
{
    //
    

    public function createsubcategory(Request $request){
        $request->validate([
            'category_id' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],

            'subcategory' => ['required', 'string', 'max:255', 'unique:subcategories'],
            
        ]);
        $add_subcategory = new Subcategory();
        $add_subcategory->category_id = $request->category_id;
        $add_subcategory->subcategory = $request->subcategory;
        $add_subcategory->body = $request->body;
        $add_subcategory->slug = SlugService::createSlug(Category::class, 'slug', $request->subcategory);
        $add_subcategory->ref_no = substr(rand(0,time()),0, 9);
        $add_subcategory->save();
        return redirect()->route('admin.addproducts', ['ref_no' =>$add_subcategory->ref_no]); 

    }

    public function addproducts($ref_no){
        $view_categories = Category::all();
        $view_subcategories = Subcategory::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.addproducts', compact('view_categories', 'view_subcategories'));
    }

    public function viewsubcategory(){
        $view_subcategories = Subcategory::latest()->get();
        return view('dashboard.admin.viewsubcategory', compact('view_subcategories'));
    }

    public function deletesubcategory($slug){
        $view_subcategories = Subcategory::where('slug', $slug)->delete();
        return redirect()->back()->with('success', 'You have created successfully');
    }

    
    public function editsubcategory($slug){
        $edit_subcategories = Subcategory::where('slug', $slug)->first();
        $view_categories = Category::all();
        return view('dashboard.admin.editsubcategory', compact('view_categories','edit_subcategories'));
    }

    public function updatesubcategory(Request $request, $slug){
        $edit_subcategories = Subcategory::where('slug', $slug)->first();

        $request->validate([
            'category_id' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'subcategory' => ['required', 'string', 'max:255'],
        ]);
        
        $edit_subcategories->category_id = $request->category_id;
        $edit_subcategories->subcategory = $request->subcategory;
        $edit_subcategories->body = $request->body;
        $edit_subcategories->update();
        return redirect()->back()->with('success', 'You have created successfully');
    }

    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Root;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class RootController extends Controller
{
    
    public function addroots(){

        return view('dashboard.admin.addroots');
    }

    public function createroot(Request $request){
        $request->validate([
            'rootname' => ['required', 'string', 'max:255', 'unique:roots'],
        ]);
        $add_roots = new Root();
        $add_roots->slug = SlugService::createSlug(Root::class, 'slug', $request->rootname);
        $add_roots->rootname = $request->rootname;
        $add_roots->ref_no = substr(rand(0,time()),0, 9);

        $add_roots->save();
        return redirect()->route('admin.addcategory', ['ref_no' =>$add_roots->ref_no]); 
    }

    public function addcategory($ref_no){
        $view_roots = Root::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.addcategory', compact('view_roots'));
    }
    public function viewroots(){
        $view_roots = Root::all();
        return view('dashboard.admin.viewroots', compact('view_roots'));
    }

    public function editroot($slug){
        $edit_root = Root::where('slug', $slug)->first();
        return view('dashboard.admin.editroot', compact('edit_root'));
    }

    
    public function updatreroot(Request $request, $slug){
        $edit_root = Root::where('slug', $slug)->first();

        $request->validate([
            'rootname' => ['required', 'string', 'max:255'],
        ]);
        
        $edit_root->rootname = $request->rootname;
        $edit_root->update();
        return redirect()->back()->with('success', 'You have created successfully');
        
    }

    public function deleteroots($slug){
        $edit_root = Root::where('slug', $slug)->delete();
        return redirect()->back()->with('success', 'You have created successfully');
    }

}

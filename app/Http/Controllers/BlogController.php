<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class BlogController extends Controller
{
    public function addblog(){
        
        return view('dashboard.admin.addblog');
    }
    
    public function createblog(Request $request){
        $request->validate([
            'body' => ['required', 'string'],
            'title' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);

        }else{
            $path = 'noimage.jpg';
        }

        $add_blog = new Blog();
        $add_blog['images'] = $path;
        $add_blog->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $add_blog->title = $request->title;
        $add_blog->body = $request->body;
        $add_blog->ref_no = substr(rand(0,time()),0, 9);
        $add_blog->save();

        return redirect()->back()->with('success', 'You have successfully submitted');
        // dd($add_team);
    }

    public function ediblog($ref_no){
        $edit_blog = Blog::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.ediblog', compact('edit_blog'));
    }

    public function viewblog(){
        $view_blogs = Blog::all();
        return view('dashboard.admin.viewblog', compact('view_blogs'));
    }

    public function deleteblog($ref_no){
        $view_teams = Blog::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted team successfully');
    }

    
    public function updateblog(Request $request, $slug){
        $edit_blog = Blog::where('slug', $slug)->first();
        $request->validate([
            'body' => ['required', 'string'],
            'title' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_blog['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }

        $edit_blog->title = $request->title;
        $edit_blog->body = $request->body;

        $edit_blog->update();

        return redirect()->back()->with('success', 'You have successfully submitted team');
        // dd($add_team);
    }
    public function blogsuspend($ref_no){
        $suspend_blog = Blog::where('ref_no', $ref_no)->first();
        $suspend_blog->status = 'suspend';
        $suspend_blog->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function blogapprove ($ref_no){
        $approve_blog = Blog::where('ref_no', $ref_no)->first();
        $approve_blog->status = 'approved';
        $approve_blog->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
}

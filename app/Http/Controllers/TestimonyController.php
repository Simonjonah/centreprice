<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    //
    public function addtestimony(){
        
        return view('dashboard.admin.addtestimony');
    }
    
    public function createtestimony(Request $request){
        // dd($request);

        $request->validate([
            'name' => ['required', 'string'],
            'messages' => ['required', 'string'],
            'position' => ['required', 'string'],
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

        $add_testimony = new Testimony();
        $add_testimony['images'] = $path;
        $add_testimony->name = $request->name;
        $add_testimony->title = $request->title;
        $add_testimony->messages = $request->messages;
        $add_testimony->position = $request->position;
        
        $add_testimony->ref_no = substr(rand(0,time()),0, 9);

        $add_testimony->save();

        return redirect()->back()->with('success', 'You have successfully submitted');
        // dd($add_team);
    }

    public function editestimony($ref_no){
        $edit_testimony = Testimony::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editestimony', compact('edit_testimony'));
    }

    public function viewtestimony(){
        $view_testimonies = Testimony::all();
        return view('dashboard.admin.viewtestimony', compact('view_testimonies'));
    }

    public function deletetestimony($ref_no){
        $view_teams = Testimony::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted team successfully');
    }

    

    public function updatetestimony(Request $request, $ref_no){
        $edit_testimony = Testimony::where('ref_no', $ref_no)->first();
        $request->validate([
            'name' => ['required', 'string'],
            'messages' => ['required', 'string'],
            'position' => ['required', 'string'],
            'title' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_teams['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }

        $edit_testimony->name = $request->name;
        $edit_testimony->title = $request->title;
        $edit_testimony->messages = $request->messages;
        $edit_testimony->position = $request->position;

        $edit_testimony->update();

        return redirect()->back()->with('success', 'You have successfully submitted team');
        // dd($add_team);
    }
    public function testimonysuspend($ref_no){
        $suspend_testimony = Testimony::where('ref_no', $ref_no)->first();
        $suspend_testimony->status = 'suspend';
        $suspend_testimony->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function testimonyapprove ($ref_no){
        $approve_testimony = Testimony::where('ref_no', $ref_no)->first();
        $approve_testimony->status = 'approved';
        $approve_testimony->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
}

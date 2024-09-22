<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function addteam(){
        
        return view('dashboard.admin.addteam');
    }

    public function createteam(Request $request){
        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'body' => ['required', 'string'],
            'position' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'linkedin' => ['required', 'string'],
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

        $add_team = new Team();
        $add_team['images'] = $path;
        $add_team->fname = $request->fname;
        $add_team->lname = $request->lname;
        $add_team->body = $request->body;
        $add_team->facebook = $request->facebook;
        $add_team->position = $request->position;
        $add_team->linkedin = $request->linkedin;
        $add_team->twitter = $request->twitter;
        $add_team->ref_no = substr(rand(0,time()),0, 9);

        $add_team->save();

        return redirect()->back()->with('success', 'You have successfully submitted team');
        // dd($add_team);
    }

    public function editeam($ref_no){
        $edit_teams = Team::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editeam', compact('edit_teams'));
    }

    public function viewteam(){
        $view_teams = Team::all();
        return view('dashboard.admin.viewteam', compact('view_teams'));
    }

    public function deleteteam($ref_no){
        $view_teams = Team::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted testimony successfully');
    }

    

    public function updateteam (Request $request, $ref_no){
        $edit_teams = Team::where('ref_no', $ref_no)->first();
        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'body' => ['required', 'string'],
            'position' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'linkedin' => ['required', 'string'],
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

        $edit_teams->fname = $request->fname;
        $edit_teams->lname = $request->lname;
        $edit_teams->body = $request->body;
        $edit_teams->facebook = $request->facebook;
        $edit_teams->position = $request->position;
        $edit_teams->linkedin = $request->linkedin;
        $edit_teams->twitter = $request->twitter;

        $edit_teams->update();

        return redirect()->back()->with('success', 'You have successfully submitted team');
        // dd($add_team);
    }
    public function teamsuspend ($ref_no){
        $suspend_team = Team::where('ref_no', $ref_no)->first();
        $suspend_team->status = 'suspend';
        $suspend_team->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function teamapprove ($ref_no){
        $approve_team = Team::where('ref_no', $ref_no)->first();
        $approve_team->status = 'approved';
        $approve_team->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    
    
}

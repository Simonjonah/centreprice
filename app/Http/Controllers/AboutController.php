<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function addabout(){

        return view('dashboard.admin.addabout');
    }

    public function createabout(Request $request){
        $request->validate([
            'body' => ['required']
        ]);
        $add_about = new About();
        $add_about->body = $request->body;
        $add_about->save();
        return redirect()->back()->with('success', 'You have sucessfully added about');
    }

    
    public function viewabout(){
        $view_abouts = About::all();
        return view('dashboard.admin.viewabout', compact('view_abouts'));
    }

    public function editbouts($id){
        $edit_abouts = About::where('id', $id)->first();
        return view('dashboard.admin.editbouts', compact('edit_abouts'));
    }

    public function deletebouts($id){
        $edit_abouts = About::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have  sucessfully deleted about');
        
    }

    public function updateabout(Request $request, $id){
        $edit_abouts = About::where('id', $id)->first();
        $request->validate([
            'body' => ['required'],
        ]);
        $edit_abouts->body = $request->body;
        $edit_abouts->update();
        return redirect()->back()->with('success', 'You have  sucessfully updated about');

    }

    
    
}

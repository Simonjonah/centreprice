<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    //
    public function addmilestone(){

        return view('dashboard.admin.addmilestone');
    }


    public function createmilestone(Request $request){
        $request->validate([
            'amount' => ['required', 'string', 'max:255'],
            'milestone' => ['required', 'string', 'max:255'],
        ]);
        $add_milestone = new Milestone();
        $add_milestone->milestone = $request->milestone;
        $add_milestone->amount = $request->amount;
        $add_milestone->save();

        return redirect()->back()->with('success', 'you have created successfully');

    }

    public function viewmilestones(){
        $view_milestones = Milestone::all();
        return view('dashboard.admin.viewmilestones', compact('view_milestones'));
    }
    public function editmilstone($id){
        $edit_milstone = Milestone::find($id);
        return view('dashboard.admin.editmilstone', compact('edit_milstone'));
    }

    public function updatemilstone(Request $request, $id){
        $edit_milstone = Milestone::where('id', $id)->first();
        $request->validate([
            'amount' => ['required', 'string', 'max:255'],
            'milestone' => ['required', 'string', 'max:255'],
        ]);
        $edit_milstone->milestone = $request->milestone;
        $edit_milstone->amount = $request->amount;
        $edit_milstone->update();

        return redirect()->back()->with('success', 'you have created successfully');
    }

    public function deletemilestone($id){
        $edit_states = Milestone::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
}

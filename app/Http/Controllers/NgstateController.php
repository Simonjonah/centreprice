<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ngstate;
class NgstateController extends Controller
{
    //
    public function addstate(){

        return view('dashboard.admin.addstate');
    }
    public function createstate(Request $request){
        $request->validate([
            'state' => ['required', 'string', 'max:255', 'unique:ngstates'],
        ]);
        $addstate = new Ngstate();
        $addstate->state = $request->state;
        $addstate->save();
        return redirect()->back()->with('success', 'you have added successfully');
    }


    
    public function viewstates(){
        $view_states = Ngstate::orderby('state')->get();
        return view('dashboard.admin.viewstates', compact('view_states'));
    }

    
    public function editstate($id){
        $edit_states = Ngstate::find($id);
        return view('dashboard.admin.editstate', compact('edit_states'));
    }

    public function deletestate($id){
        $edit_states = Ngstate::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have updated successfully');
    }
    
    public function updateestate(Request $request, $id){
        $edit_states = Ngstate::where('id', $id)->first();
        $request->validate([
            'state' => ['required', 'string', 'max:255'],
        ]);
        $edit_states->state = $request->state;
        $edit_states->update();
        return redirect()->back()->with('success', 'you have updated successfully');
    }
    
    
}

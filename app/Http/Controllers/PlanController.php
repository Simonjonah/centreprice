<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //

    public function addplan(){

        return view('dashboard.admin.addplan');
    }

    public function deleteplans($id){
        $deletes = Plan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted the plan successfully');
    }
    public function createplan (Request $request){
        $request->validate([
            'user_type' => ['required'],
            'amount' => ['required']
        ]);
        $addscript = new Plan();
        $addscript->user_type = $request->user_type;
        $addscript->amount = $request->amount;
        $addscript->save();
        return redirect()->back()->with('success', 'You have successfully added subcription');
    
    }

    public function viewplan(){
        $viewplans = Plan::all();
        return view('dashboard.admin.viewplan', compact('viewplans'));
    }

    public function editplans($id){
        $edit_plan = Plan::find($id);
        return view('dashboard.admin.editplans', compact('edit_plan'));
    }
    
    
    public function updateplan(Request $request, $id){
        $edit_subscriptions = Plan::find($id);

        $request->validate([
            'user_type' => ['required'],
            'amount' => ['required']
        ]);
        
        $edit_subscriptions->user_type = $request->user_type;
        $edit_subscriptions->amount = $request->amount;
        $edit_subscriptions->update();
        return redirect()->back()->with('success', 'You have successfully updated subcription');
    }

    public function deleteplan($id){
        $edit_subscriptions = Plan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have successfully deleted subcription');
    }
    public function franchisesubscription(){
        $view_subscriptions = Plan::all();
        return view('dashboard.franchisesubscription', compact('view_subscriptions'));
    }
    
}

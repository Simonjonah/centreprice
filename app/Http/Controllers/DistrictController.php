<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ngstate;
use App\Models\District;
use App\Models\Lga;
class DistrictController extends Controller
{
    //
    public function addsenatarial (){
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        return view('dashboard.admin.addsenatarial', compact('view_lgas', 'view_states'));
    }

    public function createdistricts(Request $request){
        // dd($request->all());
        $request->validate([
            'ngstate_id' => ['required', 'string', 'max:255'],
            // 'lga' => ['required', 'string', 'max:255'],
            'districts' => ['required', 'string', 'max:255', 'unique:districts'],
        ]);
        $addstate = new District();
        $addstate->ngstate_id = $request->ngstate_id;
        $addstate->districts = $request->districts;
        // $addstate->lga = $request->lga;
        $addstate->save();
        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function viewsenatarials (){
        $view_dists = District::all();
        return view('dashboard.admin.viewsenatarials', compact('view_dists'));
    }

    public function editdistricts ($id){
        $edit_dists = District::find($id);
        $view_states = Ngstate::orderBy('state')->get();
        // $view_lgas = Lga::orderBy('lga')->get();

        return view('dashboard.admin.editdistricts', compact('view_states', 'edit_dists'));
    }

    public function updateedistricts(Request $request, $id){
        $edit_dists = District::find($id);

        $request->validate([
            'ngstate_id' => ['required', 'string', 'max:255'],
            'districts' => ['required', 'string', 'max:255'],
        ]);
        
        $edit_dists->ngstate_id = $request->ngstate_id;
        $edit_dists->districts = $request->districts;
        $edit_dists->update();
        return redirect()->back()->with('success', 'you have updated successfully');
    }

    public function deletedistricts($id){
        $edit_states = District::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lga;
use App\Models\Ngstate;
use App\Models\District;
class LgaController extends Controller
{
    //
    public function addlga(){
        $view_states = Ngstate::orderBy('state')->get();
        $view_dists = District::all();
        return view('dashboard.admin.addlga', compact('view_dists', 'view_states'));
    }

    public function createlga(Request $request){
        // dd($request->all());
        $request->validate([
            'state' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255', 'unique:lgas'],
            'districts' => ['nullable', 'string', 'max:255'],
            'district_id' => ['nullable', 'string', 'max:255'],
        ]);
        $addlga = new Lga();
        $addlga->state = $request->state;
        $addlga->lga = $request->lga;
        $addlga->district_id = $request->district_id;
        $addlga->districts = $request->districts;
        $addlga->save();
        return redirect()->back()->with('success', 'you have added successfully');
    }
    

    public function viewlga(){
        $view_lgas = Lga::orderby('lga')->get();
        return view('dashboard.admin.viewlga', compact('view_lgas'));
    }

    public function editlga($id){
        $edit_lga = Lga::find($id);
        $view_states = Ngstate::orderby('state')->get();

        return view('dashboard.admin.editlga', compact('view_states', 'edit_lga'));
    }
    public function deletelga($id){
        $edit_lga = Lga::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have added successfully');
    }
    
    public function updatetelga(Request $request, $id){
        $edit_lga = Lga::find($id);
        $request->validate([
            'state' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255'],
            'districts' => ['nullable', 'string', 'max:255'],
            'district_id' => ['nullable', 'string', 'max:255'],
        ]);
        
        $edit_lga->state = $request->state;
        $edit_lga->lga = $request->lga;
        $edit_lga->district_id = $request->district_id;
        $edit_lga->districts = $request->districts;
        $edit_lga->update();
        return redirect()->back()->with('success', 'you have updated successfully');
    }

}

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
            // 'ngstate_id' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255', 'unique:lgas'],
            'district_id' => ['nullable', 'string', 'max:255'],
        ]);
        $addlga = new Lga();
        $addlga->lga = $request->lga;
        $addlga->district_id = $request->district_id;
        $addlga->save();
        return redirect()->back()->with('success', 'you have added successfully');
    }
    

    public function viewlga(){
        $view_lgas = Lga::orderby('lga')->get();
        return view('dashboard.admin.viewlga', compact('view_lgas'));
    }

    public function editlga($id){
        $view_lgas = Lga::orderby('lga')->get();
        $edit_lga = Lga::find($id);
        $view_dists = District::all();

        return view('dashboard.admin.editlga', compact('view_lgas', 'view_dists', 'edit_lga'));
    }
    public function deletelga($id){
        $edit_lga = Lga::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have added successfully');
    }
    
    public function updatetelga(Request $request, $id){

        $edit_lga = Lga::find($id);
        // dd($request->all());
        $request->validate([
            // 'ngstate_id' => ['required', 'string', 'max:255'],
            'lga' => ['required', 'string', 'max:255', 'unique:lgas'],
            'district_id' => ['nullable', 'string', 'max:255'],
        ]);
        
        // $edit_lga->ngstate_id = $request->ngstate_id;
        $edit_lga->lga = $request->lga;
        $edit_lga->district_id = $request->district_id;
        $edit_lga->update();
        return redirect()->back()->with('success', 'you have updated successfully');
    }

}

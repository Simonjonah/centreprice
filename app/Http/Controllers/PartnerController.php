<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function addpartner(){

        return view('dashboard.admin.addpartner');
    }

    

    public function updatethepartners(Request $request, $id){
        $edit_partner = Partner::find($id);

        $request->validate([
            'name' => ['required', 'string'],
            'partner_url' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_partner['images'] = $path;

        }

        $edit_partner->name = $request->name;
        $edit_partner->partner_url = $request->partner_url;
        $edit_partner->update();

        return redirect()->back()->with('success', 'You have successfully submitted team');
    }


    
    public function createthepartners(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'partner_url' => ['required', 'string'],
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

        $add_partner = new Partner();
        $add_partner['images'] = $path;
        $add_partner->name = $request->name;
        $add_partner->partner_url = $request->partner_url;
        $add_partner->save();

        return redirect()->back()->with('success', 'You have successfully submitted team');
    }



    public function viewpartners(){
            $view_partners = Partner::all();
        return view('dashboard.admin.viewpartners', compact('view_partners'));
    }

    public function editpartner($id){
        $edit_partner = Partner::where('id', $id)->first();
    return view('dashboard.admin.editpartner', compact('edit_partner'));
    }

    public function deletepartner($id){
        $edit_partner = Partner::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have approved successfully');

    }

    
    public function approvepartner($id){
        $approve = Partner::where('id', $id)->first();
        $approve->status = 'approved';
        $approve->save();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }

    public function suspendpartner($id){
        $approve = Partner::where('id', $id)->first();
        $approve->status = 'suspend';
        $approve->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }


    
}

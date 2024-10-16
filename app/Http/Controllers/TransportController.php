<?php

namespace App\Http\Controllers;

use App\Models\Ngstate;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    //
    public function addtransport(){
        $view_states = Ngstate::orderBy('state')->get();
        return view('dashboard.admin.addtransport', compact('view_states'));
    }

    public function createtransport(Request $request){
        $request->validate([
            'zone' => ['required'],
            'state' => ['required', 'unique:transports'],
            'fee' => ['required'],
        ]);

        $add_transport = new Transport();
        $add_transport->zone = $request->zone;
        $add_transport->state = $request->state;
        $add_transport->fee = $request->fee;
        $add_transport->ref_no = substr(rand(0,time()),0, 9);
        $add_transport->save();

        return redirect()->back()->with('success', 'You have successfully added transports');
        
    }


    public function viewtransports (){
        $view_transports = Transport::orderBy('state')->get();
        return view('dashboard.admin.viewtransports ', compact('view_transports'));
    }

    public function edittransport ($ref_no){
        $edit_transport = Transport::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderBy('state')->get();

        return view('dashboard.admin.edittransport', compact('view_states', 'edit_transport'));
    }

    public function deletetrans ($ref_no){
        $edit_transport = Transport::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have successfully deleted transports');

    }

    

    public function updatetransport(Request $request, $ref_no){
        $edit_transport = Transport::where('ref_no', $ref_no)->first();
        $request->validate([
            'zone' => ['required'],
            'state' => ['required'],
            'fee' => ['required'],
        ]);

        $edit_transport->zone = $request->zone;
        $edit_transport->state = $request->state;
        $edit_transport->fee = $request->fee;
        $edit_transport->update();

        return redirect()->back()->with('success', 'You have successfully updtated transports');
        
    }
}

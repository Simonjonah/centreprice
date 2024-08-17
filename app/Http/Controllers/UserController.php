<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Ngstate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function createfranchise(Request $request){
        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:20|min:3',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
        ]);
        $add_franchise = new User();
        $add_franchise->name = $request->name;
        $add_franchise->role = 1;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->ngstate_id = $request->ngstate_id;
        $add_franchise->lga_id = $request->lga_id;
        $add_franchise->password = \Hash::make($request->password);
        $add_franchise->ref_no = substr(rand(0,time()),0, 9);
        $add_franchise->save();
 
        if ($add_franchise) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function home(){

        return view('dashboard.home');
    }


    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the users table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }
    }

    public function viewfranchise(){
        $view_franchise = User::where('role', '1')->latest()->get();
        return view('dashboard.admin.viewfranchise', compact('view_franchise'));
    }

    public function viewsinglefranchise($ref_no){
        $view_franchise = User::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.viewsinglefranchise', compact('view_lgas', 'view_states', 'view_franchise'));
    }

    public function editfranchise($ref_no){
        $edit_franchise = User::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.editfranchise', compact('view_lgas', 'view_states', 'edit_franchise'));
    }

    

    public function approvefranchise($ref_no){
        $approve_franchise = User::where('ref_no', $ref_no)->first();
        $approve_franchise->status = 'approved';
        $approve_franchise->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendfranchise($ref_no){
        $suspend_franchise = User::where('ref_no', $ref_no)->first();
        $suspend_franchise->status = 'suspend';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    
    public function updatefranchise(Request $request, $ref_no){
        $edit_franchise = User::where('ref_no', $ref_no)->first();


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
            'images' => 'required|mimes:jpg,png,jpeg'

        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $add_product['images'] = $path;

        }
        $edit_franchise->name = $request->name;
        $edit_franchise->email = $request->email;
        $edit_franchise->phone = $request->phone;
        $edit_franchise->ngstate_id = $request->ngstate_id;
        $edit_franchise->lga_id = $request->lga_id;
        $edit_franchise->update();
 
        if ($edit_franchise) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function deletefranchise($ref_no){
        $edit_product = User::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');


    }

    public function registervendor($lga, $state, $referral)
    {
        // Logic to handle the referral
        // You can use the $lga, $state, and $referral variables as needed

        return view('auth.register', [
            'lga' => $lga,
            'state' => $state,
            'referral' => $referral
        ]);
    }
}

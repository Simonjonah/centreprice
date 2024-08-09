<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function create(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|max:20|min:3',
            'lga' => 'required|string',
            'state' => 'required|string',
            'lga_id' => 'nullable|string',
            'ngstate_id' => 'nullable|string',
        ]);

        $add_franchise = new User();
        $add_franchise->name = $request->name;
       $add_franchise->role = 1;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->lga = $request->lga;
        $add_franchise->state = $request->state;
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

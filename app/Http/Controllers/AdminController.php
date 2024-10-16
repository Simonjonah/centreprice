<?php

namespace App\Http\Controllers;

use App\Http\Resources\Testimony;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Advert;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\District;
use App\Models\Event;
use App\Models\Lga;
use App\Models\Ngstate;
use App\Models\Order;
use App\Models\Root;
use App\Models\Sale;
use App\Models\Subcategory;
use App\Models\Subscription;
use App\Models\Team;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function create(Request $request){
        //create method
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],           
        ]);
        $registration = new Admin();
        $registration->name = $request->name;
        $registration->ref_no = substr(rand(0,time()),0, 9);

        $registration->email = $request->email;
        $registration->password = \Hash::make($request->password);
        $registration->save();
 
        if ($registration) {
            return redirect()->route('admin.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:admins'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('admin.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
       $countlga = Lga::count();
       $countstate = Ngstate::count();
       $countdistrict = District::count();
       $countroot = Root::count();
       $countcategory = Category::count();
       $countsubcategory = Subcategory::count();
       $countproduct = Subcategory::count();
       $countsub = Subscription::count();
       $countsales = Sale::count();
       $countvendor = User::where('user_type', 'Vendor')->count();
       $countdistributor = User::where('user_type', 'Distributor')->count();
       $countadvert = Advert::count();
       $countcontact = Contact::count();
       $countorder = Order::count();
       $countteam = Team::count();
       $countransport = Transport::count();
       $countblog = Blog::count();
       $display_distributors = User::where('user_type', 'Distributor')->take(10)->get();
       $display_vendors = User::where('user_type', 'Vendor')->take(10)->get();
       
        return view('dashboard.admin.home', compact('display_vendors', 'display_distributors', 'countblog', 'countransport', 'countteam', 'countorder', 'countcontact', 'countadvert', 'countdistributor', 'countvendor', 'countsales', 'countsub', 'countproduct', 'countsubcategory', 'countcategory', 'countroot', 'countdistrict', 'countstate', 'countlga'));
    }

    public function profile() {

        return view('dashboard.admin.profile');
    }

    public function settingsupdate(Request $request, $id){
        $edit_profiles = Admin::find($id);
        $edit_profiles = Admin::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'studycenter' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
       // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_profiles['images'] = $path;
        $edit_profiles->name = $request->name;
        $edit_profiles->email = $request->email;
        $edit_profiles->address = $request->address;
        $edit_profiles->phone = $request->phone;
        $edit_profiles->studycenter = $request->studycenter;
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }

    public function viewroles(){
        $view_roles = Admin::all();
        return view('dashboard.admin.viewroles', compact('view_roles'));
    }

    public function assignroles(Request $request, $ref_no){
        $assigned_roles = Admin::where('ref_no', $ref_no)->first();
        $view_admins = Admin::all();
        
        return view('dashboard.admin.assignroles', compact('view_admins', 'assigned_roles'));
    }

    public function updateroles(Request $request, $ref_no){
        $assigned_roles = Admin::where('ref_no', $ref_no)->first();
        $request->validate([
            'role' => ['required', 'string', 'max:255'],
        ]);
      
        $assigned_roles->role = $request->role;
        $assigned_roles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }

    public function roleapprove($ref_no){
        $approve_admin = Admin::where('ref_no', $ref_no)->first();
        $approve_admin->status = 'approved';
        $approve_admin->save();
        return redirect()->back()->with('success', 'you have approved the admin successfully');
    }

    public function rolesuspend($ref_no){
        $approve_admin = Admin::where('ref_no', $ref_no)->first();
        $approve_admin->status = 'suspend';
        $approve_admin->save();
        return redirect()->back()->with('success', 'you have suspended the admin successfully');
    }
    public function deleterole($ref_no){
        $approve_admin = Admin::where('ref_no', $ref_no)->delete();
        
        return redirect()->back()->with('success', 'you have delete the admin successfully');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    
}

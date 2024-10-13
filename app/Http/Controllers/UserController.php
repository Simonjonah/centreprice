<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Ngstate;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function createdistributor(Request $request){
        $request->validate([
            'lga_id' => ['required', 'max:233'],
            'ngstate_id' => ['required', 'max:233'],
            'fname' => ['required', 'max:233'],
            'lname' => ['required', 'max:233'],
            'lga_id' => ['required', 'max:233'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'user_id' => ['required', 'max:233'],
            'ref_no' => ['required', 'max:233'],
            'city' => ['required', 'max:233'],
            'gender' => ['required', 'max:233'],
            'address' => ['required', 'max:233'],
            'dob' => ['required', 'max:233'],
            'terms' => ['required', 'max:233'],
        ]);
        $add_franchise = new User();
        $add_franchise->lname = $request->lname;
        $add_franchise->fname = $request->fname;
        $add_franchise->dob = $request->dob;
        $add_franchise->gender = $request->gender;
        $add_franchise->address = $request->address;
        $add_franchise->fname = $request->fname;
        $add_franchise->role = 2;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->city = $request->city;
        $add_franchise->ngstate_id = $request->ngstate_id;
        $add_franchise->lga_id = $request->lga_id;
        $add_franchise->user_id = $request->user_id;
        $add_franchise->subscription_fee = $request->subscription_fee;
        $add_franchise->password = \Hash::make($request->password);
        $add_franchise->ref_no = $request->ref_no;
        $add_franchise->terms = $request->terms;
        $add_franchise->ref_no2 = substr(rand(0,time()),0, 9);
        $add_franchise->save();
 
        if ($add_franchise) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function createfranchise(Request $request){

        $request->validate([
            'lname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'ngstate_id' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
            'dob' => 'required|string',
            'lga_id' => 'required|string',
            'terms' => 'required|string',
            'password' => 'required|string|max:30|min:3',
            'confirm_password' => 'required|min:3|max:30|same:password'          

        ]);
        // dd($request->all());

        $add_franchise = new User();
        $add_franchise->fname = $request->fname;
        $add_franchise->lname = $request->lname;
        $add_franchise->terms = $request->terms;

        $add_franchise->role = 1;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->dob = $request->dob;
        $add_franchise->address = $request->address;
        $add_franchise->gender = $request->gender;
        $add_franchise->city = $request->city;
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

    public function resetmypassword(){

        return view('dashboard.resetmypassword');
    }
    public function changepassword(Request $request, $id){
        $changelogdetails = User::find($id);
        $request->validate([
            'password' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);

        $changelogdetails->email = $request->email;
        $changelogdetails->password = \Hash::make($request->password);
        $changelogdetails->update();

        return redirect()->back()->with('success', 'You have change your login details successfully');
        
    }

    public function home(){
        $countfrancesedistributors = User::where('user_id', auth::guard('web')->id())->count();
        $viewmyfrancesedistributors = User::where('user_id', auth::guard('web')->id())->take(10)->get();
        $view_orderedproducts = Order::where('distributor_id', auth::guard('web')->id())->take(10)->get();
        $count_orderedproducts = Order::where('distributor_id', auth::guard('web')->id())->sum('quantityordered');
        $view_latestproductssignup = Order::where('franchise_id', auth::guard('web')->id())->get();
        $approvedproducts = Order::where('franchise_id', auth::guard('web')->id())->where('status', 'delivered')->count();
        $countsales = Sale::where('vendor_id', auth::guard('web')->id())->where('status', 'success')->sum('quantity');
        $countsubvendors = User::where('subvendor_id', auth::guard('web')->id())->count();
        $viewsubvendors = User::where('subvendor_id', auth::guard('web')->id())->latest()->take(6)->get();
        $viewvendororders = Sale::where('vendor_id', auth::guard('web')->id())->latest()->take(10)->get();
        

        $view_distributorsales = Sale::where('distributor_id', auth::guard('web')->id())->where('status', 'success')->latest()->take(10)->get();
        $count_sales = Sale::where('distributor_id', auth::guard('web')->id())->where('status', 'success')->count();
        $count_quantitysales = Sale::where('distributor_id', auth::guard('web')->id())->where('status', 'success')->sum('quantity');
        $countdistributors_ommission = Sale::where('distributor_id', auth::guard('web')->id())->where('status', 'success')->sum('distributors_commission');

        $countvendorsommission = Sale::where('vendor_id', auth::guard('web')->id())
        ->where('status', 'success')->sum('vendors_commission');
        
        $franchise_earnings = Sale::where('franchise_id', auth::guard('web')->id())
        ->where('status', 'success')->sum('franchise_commission');
        $franchise_sales = Sale::where('franchise_id', auth::guard('web')->id())
        ->where('status', 'success')->count();
        
        $franchise_salesquantity = Sale::where('franchise_id', auth::guard('web')->id())
        ->where('status', 'success')->sum('quantity');
        $franchise_products = Sale::where('franchise_id', auth::guard('web')->id())
        ->where('status', 'success')->latest()->take(10)->get();


        $countgoodsbought = Sale::where('vendor_id', auth::guard('web')->id())->where('status', 'success')->sum('amount');

        
        return view('dashboard.home', compact('franchise_products', 'franchise_salesquantity', 'franchise_sales', 'franchise_earnings', 'view_distributorsales', 'countdistributors_ommission', 'count_quantitysales', 'count_sales', 'countvendorsommission', 'countsales', 'viewvendororders', 'viewsubvendors', 'countsubvendors', 'countgoodsbought', 'approvedproducts', 'view_latestproductssignup', 'count_orderedproducts', 'view_orderedproducts', 'viewmyfrancesedistributors', 'countfrancesedistributors'));
    }

    public function lockscreen(){
        return view('dashboard.lockscreen');
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
    public function registerdistributor($ref_no){
        $view_franchise = User::where('ref_no', $ref_no)->first();
        return view('dashboard.registerdistributor', compact('view_franchise'));
    }

    public function referregistervendor($ref_no1){
        $view_franchise = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.referregistervendor', compact('view_franchise'));
    }

    
    public function registervendor($ref_no){
        $view_distributor = User::where('ref_no', $ref_no)->first();
        $view_vendors = User::where('ref_no', $ref_no)->where('user_type', 'Vendor')->get();

        return view('dashboard.registervendor', compact('view_vendors', 'view_distributor'));
    }
    
    
    public function viewsinglefranchise($ref_no){
        $edit_franchise = User::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.viewsinglefranchise', compact('view_lgas', 'view_states', 'edit_franchise'));
    }

    public function editfranchise($ref_no){
        $edit_franchise = User::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.editfranchise', compact('view_lgas', 'view_states', 'edit_franchise'));
    }

    public function editdistributor($ref_no2){
        $edit_distributor = User::where('ref_no2', $ref_no2)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.editdistributor', compact('view_lgas', 'view_states', 'edit_distributor'));
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

    public function approvedistributor($ref_no2){
        $suspend_franchise = User::where('ref_no2', $ref_no2)->first();
        $suspend_franchise->status = 'approved';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspenddistributor($ref_no2){
        $suspend_franchise = User::where('ref_no2', $ref_no2)->first();
        $suspend_franchise->status = 'suspend';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    
    
    public function updatefranchise(Request $request, $id){
        $edit_franchise = User::where('id', $id)->first();
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'gender' => 'nullable|string',
            'dob' => 'nullable|string',
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_franchise['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }
        $edit_franchise->fname = $request->fname;
        $edit_franchise->lname = $request->lname;
        $edit_franchise->email = $request->email;
        $edit_franchise->phone = $request->phone;
        $edit_franchise->dob = $request->dob;
        $edit_franchise->city = $request->city;
        $edit_franchise->gender = $request->gender;
        $edit_franchise->ngstate_id = $request->ngstate_id;
        $edit_franchise->lga_id = $request->lga_id;
        $edit_franchise->address = $request->address;
        $edit_franchise->save();
        return redirect()->back()->with('success', 'you have added successfully');

        // return redirect()->back('success', 'You have successfully updated your profile'); 
        //return redirect()->route('admin.firstphoto', ['ref_no' =>$edit_profile->ref_no]); 

    }


    public function deletefranchise($ref_no){
        $edit_product = User::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }

    public function deletevendors($ref_no3){
        $edit_product = User::where('ref_no3', $ref_no3)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    

    public function deletedistributor($ref_no2){
        $edit_product = User::where('ref_no2', $ref_no2)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }

    

    public function profile(){
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        
        return view('dashboard.profile', compact('view_lgas', 'view_states'));
    }

    public function profile2(){
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        
        return view('dashboard.profile2', compact('view_lgas', 'view_states'));
    }

    public function profile3(){
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        $countsubvendor = User::where('subvendor_id', auth()->user()->id)->count();
        
        return view('dashboard.profile3', compact('countsubvendor', 'view_lgas', 'view_states'));
    }
    

    
    public function updateprofile(Request $request, $ref_no){
        $edit_profile = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            // 'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
            'address' => 'required|string',
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_profile['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }
        $edit_profile->fname = $request->fname;
        $edit_profile->lname = $request->lname;
        // $edit_profile->email = $request->email;
        $edit_profile->phone = $request->phone;
        $edit_profile->ngstate_id = $request->ngstate_id;
        $edit_profile->lga_id = $request->lga_id;
        $edit_profile->address = $request->address;
        $edit_profile->save();
        return redirect()->back()->with('success', 'you have added successfully');

        // return redirect()->back('success', 'You have successfully updated your profile'); 
        //return redirect()->route('admin.firstphoto', ['ref_no' =>$edit_profile->ref_no]); 

    }


    public function updateprofile2(Request $request, $id){
        $edit_profile = User::find($id);
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
            'address' => 'required|string',
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_profile['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }
        $edit_profile->fname = $request->fname;
        $edit_profile->lname = $request->lname;
        $edit_profile->phone = $request->phone;
        $edit_profile->ngstate_id = $request->ngstate_id;
        $edit_profile->lga_id = $request->lga_id;
        $edit_profile->address = $request->address;
        $edit_profile->update();
        return redirect()->back()->with('success', 'you have added successfully');

        // return redirect()->back('success', 'You have successfully updated your profile'); 
        //return redirect()->route('admin.firstphoto', ['ref_no' =>$edit_profile->ref_no]); 

    }


    public function mydistributors(){
        $view_distributors = User::where('user_id', auth::guard('web')->user()->id)->where('role', '2')->get();
        return view('dashboard.mydistributors', compact('view_distributors'));
    }

    

    

    public function viewdistributorsadmin(){
        $view_distributors = User::where('user_type', 'Distributor')->get();
        return view('dashboard.admin.viewdistributorsadmin', compact('view_distributors'));
    }

    

    public function viewsingledistributorbyfran($ref_no2){
        $view_singdistributor = User::where('ref_no2', $ref_no2)->first();

        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        return view('dashboard.viewsingledistributorbyfran', compact('view_lgas', 'view_states', 'view_singdistributor'));
    }

    public function viewsinglevendorfran($ref_no){
        $view_singdistributor = User::where('ref_no', $ref_no)->first();

        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        return view('dashboard.viewsinglevendorfran', compact('view_lgas', 'view_states', 'view_singdistributor'));
    }

    public function referedby($ref_no2){
        $view_singvenders = User::where('ref_no2', $ref_no2)->where('role', '3')->get();

        return view('dashboard.referedby', compact('view_singvenders'));
    }
    


    public function updatedistributor(Request $request, $ref_no2){
        $edit_distributor = User::where('ref_no2', $ref_no2)->first();
        // dd($request->all());

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ngstate_id' => 'required|string',
            'lga_id' => 'required|string',
            'address' => 'required|string',
            'subscription_fee' => 'required|string',
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_distributor['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }
        $edit_distributor->fname = $request->fname;
        $edit_distributor->lname = $request->lname;
        $edit_distributor->phone = $request->phone;
        $edit_distributor->ngstate_id = $request->ngstate_id;
        $edit_distributor->lga_id = $request->lga_id;
        $edit_distributor->address = $request->address;
        $edit_distributor->subscription_fee = $request->subscription_fee;
        
        $edit_distributor->update();
 
        return redirect()->back()->with('success', 'You have successfully updated your profile'); 

    }

    public function viewsingledistributor($ref_no){
        $view_distributors = User::where('ref_no', $ref_no)->first();
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        return view('dashboard.admin.viewsingledistributor', compact('view_states', 'view_lgas', 'view_distributors'));
    }
    
    public function viewsinglevendors($ref_no3){
        $view_vendors = User::where('ref_no3', $ref_no3)->first();
        $view_states = Ngstate::orderBy('state')->get();
        $view_lgas = Lga::orderBy('lga')->get();
        return view('dashboard.admin.viewsinglevendors', compact('view_states', 'view_lgas', 'view_vendors'));
    }

    

    public function createvendor(Request $request){
        $request->validate([
            'lga_id' => ['required', 'max:233'],
            'ngstate_id' => ['required', 'max:233'],
            'fname' => ['required', 'max:233'],
            'lname' => ['required', 'max:233'],
            'lga_id' => ['required', 'max:233'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'city' => ['required', 'max:233'],
            'dob' => ['required', 'max:233'],
            'gender' => ['required', 'max:233'],
            'password' => 'required|string|max:30|min:3',
            'confirm_password' => 'required|min:3|max:30|same:password',
            'terms' => ['required', 'max:233'],
        ]);
        $add_franchise = new User();
        $add_franchise->lname = $request->lname;
        $add_franchise->fname = $request->fname;
        $add_franchise->role = 3;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->gender = $request->gender;
        $add_franchise->ngstate_id = $request->ngstate_id;
        $add_franchise->lga_id = $request->lga_id;
        $add_franchise->city = $request->city;
        $add_franchise->dob = $request->dob;
        $add_franchise->password = \Hash::make($request->password);
        $add_franchise->ref_no3 = substr(rand(0,time()),0, 9);
        $add_franchise->terms = $request->terms;
        $add_franchise->save();
 
        if ($add_franchise) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    public function createsubvendor(Request $request){
        $request->validate([
            'lga_id' => ['required', 'max:233'],
            'ngstate_id' => ['required', 'max:233'],
            'fname' => ['required', 'max:233'],
            'lname' => ['required', 'max:233'],
            'lga_id' => ['required', 'max:233'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'city' => ['required', 'max:233'],
            'dob' => ['required', 'max:233'],
            'gender' => ['required', 'max:233'],
            'subvendor_id' => ['required', 'max:233'],
            'password' => 'required|string|max:30|min:3',
            'confirm_password' => 'required|min:3|max:30|same:password',
            'terms' => ['required', 'max:233'],
        ]);
        $add_franchise = new User();
        $add_franchise->subvendor_id = $request->subvendor_id;
        $add_franchise->lname = $request->lname;
        $add_franchise->fname = $request->fname;
        $add_franchise->role = 3;
        $add_franchise->email = $request->email;
        $add_franchise->phone = $request->phone;
        $add_franchise->gender = $request->gender;
        $add_franchise->ngstate_id = $request->ngstate_id;
        $add_franchise->lga_id = $request->lga_id;
        $add_franchise->city = $request->city;
        $add_franchise->dob = $request->dob;
        $add_franchise->password = \Hash::make($request->password);
        $add_franchise->ref_no3 = substr(rand(0,time()),0, 9);
        $add_franchise->terms = $request->terms;
        $add_franchise->save();
 
        if ($add_franchise) {
            return redirect()->route('web.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function myvendorsbydistributor(){
        $view_vendors = User::where('distributor_id', auth::guard('web')->user()->id)->where('role', '3')->get();
        return view('dashboard.myvendorsbydistributor', compact('view_vendors'));
    }

    public function myvendorsbyvendors(){
        $view_vendor_vendors = User::where('subvendor_id', auth::guard('web')->user()->id)->latest()->get();
        return view('dashboard.myvendorsbyvendors', compact('view_vendor_vendors'));
    }
    

    public function viewvendorsadmin(){
        $view_vendors = User::where('role', '3')->get();
        return view('dashboard.admin.viewvendorsadmin', compact('view_vendors'));
    }
    
    public function updatevendor(Request $request, $id){
        $edit_vendor = User::find($id);

        $request->validate([
            'lga_id' => ['required', 'max:233'],
            'ngstate_id' => ['required', 'max:233'],
            'fname' => ['required', 'max:233'],
            'lname' => ['required', 'max:233'],
            'lga_id' => ['required', 'max:233'],
            'phone' => ['required', 'string'],
            'subscription_fee' => ['required', 'max:233'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('productimages', $filename);
            $edit_vendor['images'] = $path;

        }else{
            $path = 'noimage.jpg';
        }
        $edit_vendor->lname = $request->lname;
        $edit_vendor->fname = $request->fname;
        $edit_vendor->email = $request->email;
        $edit_vendor->phone = $request->phone;
        $edit_vendor->ngstate_id = $request->ngstate_id;
        $edit_vendor->lga_id = $request->lga_id;
        $edit_vendor->subscription_fee = $request->subscription_fee;
        $edit_vendor->update();
        return redirect()->back()->with('success', 'you have have updated successfully');

    }


    public function approvevendors($ref_no3){
        $suspend_franchise = User::where('ref_no3', $ref_no3)->first();
        $suspend_franchise->status = 'approved';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendvendors($ref_no3){
        $suspend_franchise = User::where('ref_no3', $ref_no3)->first();
        $suspend_franchise->status = 'suspend';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function editvendors($ref_no3){
        $edit_vendor = User::where('ref_no3', $ref_no3)->first();
        $view_states = Ngstate::orderby('state')->get();
        $view_lgas = Lga::orderby('lga')->get();
        
        return view('dashboard.admin.editvendors', compact('view_lgas', 'view_states', 'edit_vendor'));
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }

    public function screenlogin(Request $request){
        $request->validate([
            // 'password' => ['required', 'string', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:3']
        ], [
            'password.exist'=>'This email does not exist in the users table'
        ]);
        $creds = $request->only('password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }
    }

    public function viewdistributors($ref_no){
        $view_distributors = User::where('ref_no', $ref_no)->get();
        return view('dashboard.admin.viewdistributors', compact('view_distributors'));
    }

    public function viewmyvendorsales($id){
        $view_purchases = User::where('id', $id)->first();
        $view_purchases = Sale::where('vendor_id', $id)->get();
        return view('dashboard.viewmyvendorsales', compact('view_purchases'));
    }

    

    // public function registervendor($lga, $state, $referral)
    // {
     

    //     return view('auth.register', [
    //         'lga' => $lga,
    //         'state' => $state,
    //         'referral' => $referral
    //     ]);
    // }
}

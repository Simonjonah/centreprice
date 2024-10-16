<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Cviebrock\Eloquentref_nogable\Services\ref_noService;

use Illuminate\Support\Str;
 
 
// The quick brown fox...
class ProductController extends Controller
{
    

    public function createproduct(Request $request){
        $request->validate([
            'subcategory_id' => ['required', 'string'],
            'root_id' => ['required', 'string'],
            'category_id' => ['required', 'string'],
            'subvendor_commission' => ['required', 'string'],
            'distributors_commission' => ['required', 'string'],
            'vendors_commission' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'package' => ['required', 'string'],
            'package_no' => ['required', 'string'],
            'percent' => ['nullable', 'string'],
            'quantity' => ['nullable', 'string'],
            
            'images1' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        $add_product = new Product();

        if ($request->hasFile('images1')){
            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('productimages', $filename);

        }else{
            $path = 'noimage.jpg';
        }
        $add_product['images1'] = $path;
        // $add_product->ref_no = ref_noService::createref_no(Product::class, 'ref_no', $request->productname);
        $add_product->subcategory_id = $request->subcategory_id;
        $add_product->category_id = $request->category_id;
        $add_product->root_id = $request->root_id;
        $add_product->subvendor_commission = $request->subvendor_commission;
        $add_product->vendors_commission = $request->vendors_commission;
        $add_product->distributors_commission = $request->distributors_commission;
        $add_product->percent = $request->percent;
        $add_product->package = $request->package;
        $add_product->package_no = $request->package_no;
        $add_product->amount = $request->amount;
        $add_product->quantity = $request->quantity;
        $add_product->ref_no = substr(rand(0,time()),0, 9);
        $add_product->save();
        return redirect()->route('admin.firstphoto', ['ref_no' =>$add_product->ref_no]); 

    }

    public function firstphoto($ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.firstphoto', compact('add_product'));
    }

    public function add2ndphoto(Request $request, $ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        $request->validate([
            'images2' => 'required|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());


        if ($request->hasFile('images2')){

            $file = $request['images2'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images2')->storeAs('productimages', $filename);
            $add_product['images2'] = $path;

        }
        
        $add_product->update();
        return redirect()->route('admin.thirdphoto', ['ref_no' =>$add_product->ref_no]); 

    }

    public function thirdphoto($ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.thirdphoto', compact('add_product'));
    }



    public function viewsingleproduct($ref_no){
        $view_product = Product::where('ref_no', $ref_no)->first();
        $view_subcategories = Subcategory::latest()->get();
        return view('dashboard.admin.viewsingleproduct', compact('view_subcategories', 'view_product'));
    }

    
    public function add3photo(Request $request, $ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        $request->validate([
            'images3' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images3')){

            $file = $request['images3'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images3')->storeAs('productimages', $filename);
            $add_product['images3'] = $path;

        }
        
        $add_product->update();
        return redirect()->route('admin.fourthphoto', ['ref_no' =>$add_product->ref_no]); 

    }

    public function fourthphoto($ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.fourthphoto', compact('add_product'));
    }

    
    public function add4photo(Request $request, $ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        $request->validate([
            'images4' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images4')){

            $file = $request['images4'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images4')->storeAs('productimages', $filename);
            $add_product['images4'] = $path;
        }
        
        $add_product->update();
        return redirect()->route('admin.fifthphoto', ['ref_no' =>$add_product->ref_no]); 

    }

    
    public function fifthphoto($ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.fifthphoto', compact('add_product'));
    }

     
    public function add5photo(Request $request, $ref_no){
        $add_product = Product::where('ref_no', $ref_no)->first();
        $request->validate([
            'images5' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images5')){

            $file = $request['images5'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images5')->storeAs('productimages', $filename);
            $add_product['images5'] = $path;
        }
        
        $add_product->update();
        return redirect()->route('admin.fifthphoto', ['ref_no' =>$add_product->ref_no]); 

    }

    public function viewproducts(){
        $view_products = Product::latest()->get();
        return view('dashboard.admin.viewproducts', compact('view_products'));
    }

    public function approveproduct($ref_no){
        $approve_product = Product::where('ref_no', $ref_no)->first();
        $approve_product->status = 'approved';
        $approve_product->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendproduct($ref_no){
        $approve_product = Product::where('ref_no', $ref_no)->first();
        $approve_product->status = 'suspend';
        $approve_product->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function editproduct($ref_no){
        $edit_product = Product::where('ref_no', $ref_no)->first();
        $view_subcategories = Subcategory::latest()->get();
        return view('dashboard.admin.editproduct', compact('view_subcategories', 'edit_product'));
    }


    public function updateproduct(Request $request, $ref_no){
        $edit_product = Product::where('ref_no', $ref_no)->first();

        $request->validate([
            'subcategory_id' => ['required', 'string'],
            'subvendor_commission' => ['required', 'string'],
            'distributors_commission' => ['required', 'string'],
            'vendors_commission' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'percent' => ['required', 'string'],
            'quantity' => ['required', 'string'],
            'package' => ['required', 'string'],
            'package_no' => ['required', 'string'],
            'images1' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        

        if ($request->hasFile('images1')){

            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('productimages', $filename);
            $edit_product['images1'] = $path;

        }
        $edit_product->subcategory_id = $request->subcategory_id;
        $edit_product->subvendor_commission = $request->subvendor_commission;
        $edit_product->distributors_commission = $request->distributors_commission;
        $edit_product->vendors_commission = $request->vendors_commission;
        $edit_product->quantity = $request->quantity;
        $edit_product->percent = $request->percent;
        $edit_product->amount = $request->amount;
        $edit_product->package = $request->package;
        $edit_product->package_no = $request->package_no;
        $edit_product->update();
        return redirect()->route('admin.firstphoto', ['ref_no' =>$edit_product->ref_no]); 

    }

    public function deleteproduct($ref_no){

        $edit_product = Product::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    public function myproducts(){
        $view_myprodocts = Product::latest()->get();
        $view_categories = Category::latest()->get();
        return view('dashboard.myproducts', compact('view_categories', 'view_myprodocts'));
    }
    public function myvendorproducts(){
        $franchise_products = Product::where('status', 'approved')->get();
      return view('dashboard.myvendorproducts', compact('franchise_products'));
    }
    public function viewproductsbyvendoronly($ref_no){
        $viewprodbyvendors = Product::where('ref_no', $ref_no)->first();
        $view_allprodocts = Product::where('status', 'approved')->get();
        
      return view('dashboard.viewproductsbyvendoronly', compact('view_allprodocts', 'viewprodbyvendors'));
    }

    public function viewproductsbyvendor($ref_no){
        $view_myprodocts = Product::where('ref_no', $ref_no)->first();

        $view_allprodocts = Product::latest()->take(6)->get();

        return view('dashboard.viewproductsbyvendor', compact('view_allprodocts', 'view_myprodocts'));
    }

    public function ordermyproducts($ref_no){
        $order_products = Product::where('ref_no', $ref_no)->first();
        $view_distributors = User::where('role', '2')->get();
        return view('dashboard.ordermyproducts', compact('view_distributors', 'order_products'));
    }
}

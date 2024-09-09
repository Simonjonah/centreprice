<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //
    public function createorders(Request $request){
        $request->validate([
            'user_id' => ['required', 'string'],
            'product_id' => ['required', 'string'],
            'subcategory_id' => ['required', 'string'],
            'root_id' => ['required', 'string'],
            'category_id' => ['required', 'string'],
            'franchise_commission' => ['required', 'string'],
            'distributors_commission' => ['required', 'string'],
            'vendors_commission' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'quantityordered' => ['nullable', 'string'],
            'images1' => ['nullable', 'string'],
            'images2' => ['nullable', 'string'],
            'images3' => ['nullable', 'string'],
            'images4' => ['nullable', 'string'],
            'images5' => ['nullable', 'string'],
        ]);
        // dd($request->all());

        $add_product = new Order();

        $add_product->user_id = $request->user_id;
        $add_product->product_id = $request->product_id;
        $add_product->subcategory_id = $request->subcategory_id;
        $add_product->category_id = $request->category_id;
        $add_product->root_id = $request->root_id;
        $add_product->franchise_commission = $request->franchise_commission;
        $add_product->vendors_commission = $request->vendors_commission;
        $add_product->distributors_commission = $request->distributors_commission;
        $add_product->quantityordered = $request->quantityordered;
        $add_product->amount = $request->amount;
        $add_product->amountordered = $request->quantityordered * $request->amount;

        $add_product->images1 = $request->images1;
        $add_product->images2 = $request->images2;
        $add_product->images3 = $request->images3;
        $add_product->images4 = $request->images4;
        $add_product->images5 = $request->images5;
        $add_product->ref_no = substr(rand(0,time()),0, 9);
        $add_product->save();
        $product = Product::find($request->input('product_id'));
        if ($product) {
            $product->orderedquantity += $request->quantityordered;  // Example: reducing stock after an order
            $product->save();
        }

        return redirect()->back()->with('success', 'you have ordered the product successfully');

    }

    public function myorderproducts (){
        $view_orders = Order::where('user_id', auth::user()->id)->get();
        return view('dashboard.myorderproducts', compact('view_orders'));
    }

    // public function deliverorder($ref_no){
    //     $approve_order = Order::where('ref_no', $ref_no)->first();
    //     $approve_order->status = 'delivered';
    //     $approve_order->save();
    //     return redirect()->back()->with('success', 'you have delivered the products successfully');
    // }

    public function suspendorder($ref_no){
        $approve_order = Order::where('ref_no', $ref_no)->first();
        $approve_order->status = 'suspend';
        $approve_order->save();
        return redirect()->back()->with('success', 'you have suspended the products successfully');
    }

    public function viewsingleorder($ref_no){
        $view_order = Order::where('ref_no', $ref_no)->first();
        return view('dashboard.viewsingleorder', compact('view_order'));
    }


    
    
}

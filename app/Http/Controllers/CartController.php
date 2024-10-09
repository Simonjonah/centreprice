<?php

namespace App\Http\Controllers;

use App\Models\Ngstate;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   // View Cart
   public function viewcarts()
   {
       $cart = session()->get('cart');
       $view_states = Ngstate::orderBy('state')->get();
       return view('dashboard.viewcarts', compact('view_states', 'cart'));
   }


   public function addtocart(Request $request, $id){
       $product = Order::find($id);
       if(!$product) {
           return redirect()->back()->with('error', 'Product not found.');
       }

       $cart = session()->get('cart', []);

       // If the product is already in the cart, just update the quantity
       if(isset($cart[$id])) {
           $cart[$id]['quantity']++;
       } else {
           // Add the product to the cart
           $cart[$id] = [
               'order_id' => $product->order_id,
               'product_id' => $product->product_id,
               'user_id' => $request->user_id,
               'franchise_id' => $product->franchise_id,
               'distributor_id' => $request->distributor_id,
               'vendor_id' => $request->vendor_id,
               
               'franchise_commission' => $product->franchise_commission,
               'distributors_commission' => $product->distributors_commission,
               'vendors_commission' => $product->vendors_commission,
               'productname' => $product->productname,
               'quantity' => $request->quantity,
               'amount' => $product->amount,
               'images1' => $product->images1,
               'images2' => $product->images2,
               'images3' => $product->images3,
               'images4' => $product->images4,
               'images5' => $product->images5,
           ];
       }

       session()->put('cart', $cart);
       return redirect()->back()->with('success', 'Product added to cart successfully.');
   }


    // Remove Item from Cart
    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}

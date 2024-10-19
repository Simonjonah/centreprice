<?php

namespace App\Http\Controllers;

use App\Models\Ngstate;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transport;

use Illuminate\Http\Request;

class CartController extends Controller
{
   // View Cart
   public function viewcarts()
   {
       $cart = session()->get('cart');
       $view_transports = Transport::orderBy('state')->get();
    //    $cartTotal = session()->getTotal();
       return view('dashboard.viewcarts', compact('view_transports', 'cart'));
   }


   public function addtocart(Request $request, $id){
       $product = Product::find($id);
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
               
               'product_id' => $request->product_id,
               'user_id' => $request->user_id,
               'distributor_id' => $request->distributor_id,
               'vendor_id' => $request->vendor_id,
               'subvendor_commission' => $request->subvendor_commission,
               'distributors_commission' => $product->distributors_commission,
               'vendors_commission' => $product->vendors_commission,
               'productname' => $request->productname,
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

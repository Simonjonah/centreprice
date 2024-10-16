<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use App\Models\Sale;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{

    public function showPaymentForm()
    {
        return view('payment.form');
    }

    // Process Payment and Split Money
    public function processPayment(Request $request) {
        $reference = substr(rand(0,time()),0, 9);
        try {
            // Initialize transaction on Paystack with split details
            $response = Http::withToken('sk_test_d320f1edcb2c172115da615043090c1580f9758f')
                ->post('https://api.paystack.co/transaction/initialize', [
                    'email' => $request->email, 
                    'amount' => $request->amount, 
                    'reference' => $reference,
                    // 'subvendor_id' => $request->subvendor_id,
                    // 'first_name' => $request->first_name,
                    // 'last_name' => $request->last_name,
                    // 'distributor_email' => $request->distributor_email,
                    // 'vendor_email' => $request->vendor_email,
                    // 'distributor_id' => $request->distributor_id,
                    // 'vendor_id' => $request->vendor_id,
                    // 'product_id' => $request->product_id,
                    // 'vendor_id' => $request->vendor_id,
                    // 'subvendor_commission' => $request->subvendor_commission,
                    // 'distributors_commission' => $request->distributors_commission,
                    // 'vendors_commission' => $request->vendors_commission,
                    // 'phone' => $request->phone,
                    // 'transport_id' => $request->transport_id,
                    // 'delivery_address' => $request->delivery_address,
                    // 'delivery_phone' => $request->delivery_phone,
                    'callback_url' => route('payment.callback'), 
                    // 'split' => [
                    //     'type' => 'percentage', 
                    //     'subaccounts' => [
                    //         [
                    //             'subaccount' => 'ACCT_ydm5cjexrm0d88c', 
                    //             'share' => 50  
                    //         ],
                    //         [
                    //             'subaccount' => 'ACCT_whkl6chr1tbvy8j',
                    //             'share' => 50  
                    //         ]
                    //     ]
                    // ]
                ]);

            //$result = $response->json();
            $result = json_decode($response->getBody()->getContents(), true);
            return response()->json([
                'payment' => $result
            ]);
            Sale::create([
                'quantity' => $request->quantity,
                'ref_no' => substr(rand(0,time()),0, 9),
                'amount' => $request->amount,
                'email' => $request->email,
                'phone' => $request->phone,
                'subvendor_id' => $request->subvendor_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'distributor_email' => $request->distributor_email,
                'vendor_email' => $request->vendor_email,
                'distributor_id' => $request->distributor_id,
                'vendor_id' => $request->vendor_id,
                'product_id' => $request->product_id,
                
                'subvendor_commission' => $request->subvendor_commission,
                'distributors_commission' => $request->distributors_commission,
                'vendors_commission' => $request->vendors_commission,
                'phone' => $request->phone,
                
                'reference' => $reference,
                'productname' => $request->productname,
                'currency' => $request->currency,
                'currency' => 'NGN',
                'channels' => $request->channels,
                'images1' => $request->images1,
                'images2' => $request->images2,
                'images3' => $request->images3,
                'images4' => $request->images4,
                'images5' => $request->images5,
                'status' => 'pending',
            ]);
            //$result = json_decode($response->getBody()->getContents(), true);
            // dd($result);

            // Check if the payment initialization was successful
            if ($result['status']) {
                // Redirect to Paystack payment page
                return redirect($result['data']['authorization_url']);
            } else {
                return back()->with('error', 'Failed to initialize payment. Please try again.');
            }
        } 
        catch (RequestException $e) {
            throw $e; // or handle the error as needed
            // return back()->with('error', 'An error occurred. Please try again.');
        }
   }

    // Paystack callback after successful payment
    public function paymentCallback(Request $request)
    {
        // Get the payment reference from the query string
        $reference = $request->query('reference');

        if (!$reference) {
            return back()->with('error', 'No payment reference provided.');
        }

        // Verify the payment using Paystack API
        try {
            $response = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")
                ->get('https://api.paystack.co/transaction/verify/' . $reference);
                // dd($response);
            $result = $response->json();
            // $result = json_decode($response->getBody()->getContents(), true);
            

            $reference = $request->query('reference');
            $product_id = $request->query('product_id');
            if ($result['status'] && $result['status'] == 'success') {
            $payment = Sale::where('reference', $reference)->first();
            $product = Product::where('id', $product_id)->first();
            $product->quantity =- $request->quantity;
            $product->update();  
               $payment->update([
                    'status' => 'success',
                    'domain' => $result['data']['domain'],
                    'requested_amount' => $result['data']['requested_amount'],
                    'paidAt' => $result['data']['paidAt'],
                    'gateway_response' => $result['data']['gateway_response'],
                    'channel' => $result['data']['channel'],
                    'ip_address' => $result['data']['ip_address'],
                    'channel' => $result['data']['channel'],
                    'ip_address' => $result['data']['ip_address'],
                    'split_id' => $result['data']['split']['id'],
                    'name' => $result['data']['split']['name'],
                    
                    
                    'authorization_code' => $result['data']['authorization']['authorization_code'],
                    'bin' => $result['data']['authorization']['bin'],
                    'last4' => $result['data']['authorization']['last4'],
                    'exp_month' => $result['data']['authorization']['exp_month'],
                    'channel' => $result['data']['authorization']['channel'],
                    'card_type' => $result['data']['authorization']['card_type'],
                    'bank' => $result['data']['authorization']['bank'],
                    'country_code' => $result['data']['authorization']['country_code'],
                    'brand' => $result['data']['authorization']['brand'],
                    'reusable' => $result['data']['authorization']['reusable'],
                    'signature' => $result['data']['authorization']['signature'],
                    

                    

                    'split_code' => $result['data']['split']['split_code'],
                    'type' => $result['data']['split']['formula']['type'],
                    'bearer_type' => $result['data']['split']['formula']['bearer_type'],
                    'bearer_subaccount' => $result['data']['split']['formula']['bearer_subaccount'],
                    
                    
                    
                    // 'original_share' => $result['data']['split']['formula']['subaccounts']['original_share'],
                    // 'split_fees' => $result['data']['split']['formula']['subaccounts']['fees'],
                // 'share' => ['split']['formula']['subaccounts']['share'],
                // 'original_share' => ['split']['formula']['subaccounts']['original_share'],
                // 'subaccount_code' => ['split']['formula']['subaccounts']['subaccount_code'],
                // 'subaccount_id' => ['split']['formula']['subaccounts']['id'],
                // 'subaccount_name' => ['split']['formula']['subaccounts']['name'],
                // 'integration' => ['split']['formula']['subaccounts']['integration'],
                

                // 'paystack' => ['split']['shares']['paystack'],
                // 'subaccount_amount' => ['split']['shares']['subaccounts']['amount'],
                // 'original_share' => ['split']['shares']['subaccounts']['original_share'],
                // 'shere_fees' => ['split']['shares']['subaccounts']['shere_fees'],
                // 'shere_subaccount_code' => ['split']['shares']['subaccounts']['subaccount_code'],
                // 'shere_id' => ['split']['shares']['subaccounts']['id'],
                // 'share_integration' => ['split']['shares']['subaccounts']['integration'],

                   
               ]);
               dd($result);
               return redirect()->route('thankyou')->with('success', 'Payment successful!');
            //    return redirect()->route('payment.success')->with('success', 'Payment successful!');
            } else {
                return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
            }
        } catch (RequestException $e) {
            
            return redirect()->route('payment.failed')->with('error', 'An error occurred. Please try again.');
        }

        throw $e; // or handle the error as needed

    }

    public function thankyou(){

        return view('dashboard.thankyou');
    }

    public function viewmypurchases(){
        $view_purchases = Sale::where('vendor_id', auth::guard('web')->id())->latest()->get();
        return view('dashboard.viewmypurchases', compact('view_purchases'));
    }
    public function viewmypurchasesdist(){
        $view_purchases = Sale::where('distributor_id', auth::guard('web')->id())->where('status', 'success')->latest()->get();
        return view('dashboard.viewmypurchasesdist', compact('view_purchases'));
    }
    
    public function myvendors(){
        $view_vendors = Sale::where('franchise_id', auth::guard('web')->user()->id)->where('status', 'success')->latest()->get();
        return view('dashboard.myvendors', compact('view_vendors'));
    }

    public function viewgoodsbyvendor($ref_no){
        $view_purchse = Sale::where('ref_no', $ref_no)->first();
        $view_allprodocts = Order::where('status', 'delivered')->latest()->get();

        return view('dashboard.viewgoodsbyvendor', compact('view_allprodocts', 'view_purchse'));
    }

    public function deletepurchse($ref_no){
        $view_purchse = Sale::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have successfully deleted your product');
    }
    
    

    public function productreceived($ref_no){
        $suspend_franchise = Sale::where('ref_no', $ref_no)->first();
        $suspend_franchise->productstatus = 'received';
        $suspend_franchise->save();
        return redirect()->back()->with('success', 'you have recieve successfully');
    }
    
}


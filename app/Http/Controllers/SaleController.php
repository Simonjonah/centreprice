<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
    public function processPayment(Request $request)
    {
      
       
        try {
            // Initialize transaction on Paystack with split details
            $response = Http::withToken('sk_test_2480c735552c0c451064507cb47a75d736c5c969')
                ->post('https://api.paystack.co/transaction/initialize', [
                    'email' => $request->email,  // Customer's email
                    'amount' => $request->amount,  // Amount to charge in kobo
                    'reference' => $request->reference,
                    'user_id' => $request->user_id,
                    'first_name' => $request->fname,
                    'last_name' => $request->lname,
                    'callback_url' => route('payment.callback'),  // URL to redirect after payment
                    'split' => [
                        'type' => 'percentage', // or 'flat' if you want a fixed amount
                        'subaccounts' => [
                            [
                                'subaccount' => 'ACCT_ydm5cjexrm0d88c', 
                                'share' => 50  
                            ],
                            [
                                'subaccount' => 'ACCT_whkl6chr1tbvy8j',
                                'share' => 50  
                            ]
                        ]
                    ]
                ]);

            $result = $response->json();
           //  dd($result);
            Sale::create([
                'quantity' => $request->quantity,
                'ref_no' => substr(rand(0,time()),0, 9),
                'amount' => $request->amount,
                'email' => $request->email,
                'phone' => $request->phone,
                'user_id' => $request->user_id,
                'franchise_id' => $request->franchise_id,
                'distributor_id' => $request->distributor_id,
                'vendor_id' => $request->vendor_id,
                'product_id' => $request->product_id,
                'order_id' => $request->order_id,
                // 'vendor_id' => $request->vendor_id,
                'franchise_commission' => $request->franchise_commission,
                'distributors_commission' => $request->distributors_commission,
                'vendors_commission' => $request->vendors_commission,
                'first_name' => $request->fname,
                'phone' => $request->phone,
                'last_name' => $request->lname,
                'reference' => $request->reference,
                'productname' => $request->productname,
                'currency' => $request->currency,
                'currency' => 'NGN',
                'channels' => $request->channels,
                'images1' => $request->images1,
                'images2' => $request->images2,
                'images3' => $request->images3,
                'images4' => $request->images4,
                'images5' => $request->images5,
                'callback_url' => 'http://127.0.0.1:8000/payment/process/',

                // 'domain' => ['data']['domain'],
                // 'requested_amount' => ['data']['requested_amount'],
                // 'paidAt' => ['data']['paidAt'],
                // 'gateway_response' => ['data']['gateway_response'],
                // 'channel' => ['data']['channel'],
                // 'ip_address' => ['data']['ip_address'],
                // 'fees' => ['data']['fees'],
                // 'first_name' => ['customer']['first_name'],
                // 'last_name' => ['customer']['last_name'],
                // 'email' => ['customer']['email'],
                // 'phone' => ['customer']['phone'],
                // 'risk_action' => ['customer']['risk_action'],
                // 'international_format_phone' => ['customer']['international_format_phone'],

                // //SPLIT SECTION
                // 'split_id' => ['split']['id'],
                // 'name' => ['split']['name'],
                // 'split_code' => ['split']['split_code'],
                // 'type' => ['split']['formula']['type'],
                // 'bearer_type' => ['split']['formula']['bearer_type'],
                // 'bearer_subaccount' => ['split']['formula']['bearer_subaccount'],
                // 'original_share' => ['split']['formula']['subaccounts']['original_share'],
                // 'split_fees' => ['split']['formula']['subaccounts']['fees'],
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

                
                // 'reference' => $request->reference,
                // 'currency' => 'NGN',
                // 'channels' => $request->channels,
                // // 'callback_url' => 'https://brixtonnschools.com.ng/',
                // 'user_id' => $user->id,
                // 'subscription_id' => $subscription->id,
                // 'amount' => $plan->amount,
                'status' => 'pending',
                
            ]);
            // dd($result);
            // $result = json_decode($response->getBody()->getContents(), true);

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
            $response = Http::withToken("sk_test_2480c735552c0c451064507cb47a75d736c5c969")
                ->get('https://api.paystack.co/transaction/verify/' . $reference);

            $result = $response->json();
            $reference = $request->query('reference');
            // dd($result);
            // Check if the payment was successful
            if ($result['status'] && $result['status'] == 'success') {
                // $result->status = 'success';
                // // $result->payment_date = now(); // Update payment date or other fields
                // $result->save();
                // Payment was successful, handle your post-payment logic here
                return redirect()->route('payment.success')->with('success', 'Payment successful!');
            } else {
                return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
            }
        } catch (RequestException $e) {
            
            return redirect()->route('payment.failed')->with('error', 'An error occurred. Please try again.');
        }

        throw $e; // or handle the error as needed

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


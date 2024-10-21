<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Plan;
use App\Models\Sale;
use App\Models\Subscription;
use App\Models\User;
// use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function registersubcription(){
     
        return view('dashboard.registersubcription');
    }

    // public function createusers(Request $request) {
    //     try {
    //         $response = Http::withToken('sk_test_d320f1edcb2c172115da615043090c1580f9758f')
    //             ->post('https://api.paystack.co/transaction/initialize', [
    //                 'email' => $request->email,  
    //                 'amount' => $request->amount, 
    //                 'reference' => $request->reference,
    //                 'phone' => $request->phone,
    //                 'fname' => $request->fname,
    //                 'lname' => $request->lname,
    //                 'callback_url' => route('transaction.callback'), 
    //             ]);

    //         $transaction = $response->json();
    //         // dd($transaction);
    //        $transaction = Transaction::create([
    //             'ref_no' => substr(rand(0,time()),0, 9),
    //             'amount' => $request->amount,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'user_type' => $request->user_type,
    //             'fname' => $request->fname,
    //             'lname' => $request->lname,
    //             'reference' => $request->reference,
    //             'currency' => 'NGN',
    //             'channels' => $request->channels,
    //             // 'callback_url' => 'http://127.0.0.1:8000/web/thankyou',
    //             'user_id' => $request->id,
    //             // 'subscription_id' => $subscription->id,
    //             'amount' => $request->amount,
    //             'status' => 'pending',

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
                // 'status' => 'pending',
                
            //]);
            // dd($result);
            // $result = json_decode($response->getBody()->getContents(), true);

            // Check if the payment initialization was successful
        //     if ($transaction['status']) {
        //         // Redirect to Paystack payment page
        //         return redirect($transaction['data']['authorization_url']);
        //     } else {
        //         return back()->with('error', 'Failed to initialize payment. Please try again.');
        //     }
        // } 
        // catch (RequestException $e) {
        //     throw $e; // or handle the error as needed
        //     // return back()->with('error', 'An error occurred. Please try again.');
        // }
   //}

    public function createusers(Request $request){
        $reference = substr(rand(0,time()),0, 9);
        try {
            $response = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/transaction/initialize', [
                'amount' => $request->amount,
                 'currency' => 'NGN',
                 'phone' => $request->phone,
                 'fname' => $request->fname,
                 'lname' => $request->lname,
                 'email' => $request->email,
                //  'user_id' => $request->user_id,
                 'user_type' => $request->user_type,
                 'callback_url' => route('transaction.callback'), 
                 'reference' => $reference,
                 'channels' => [
                     "card", "bank", "ussd", "qr", "mobile_money", "bank_transfer", "eft"
                 ]
             ]);
             $responseData = json_decode($response->getBody()->getContents(), true);
            // dd($responseData);
            $startDate = Carbon::now();
            $endDate = Carbon::now()->addDays(365);
                $request->validate([
                    'password' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:users'],
                    'phone' => ['required', 'string', 'unique:users'],
                ]);
                if ($request->user_type == 'Distributor') {
                    $user = User::create([
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'terms' => $request->terms,
                        'reference' => $reference,
                        // 'user_id' => $request->user_id,
                        'user_type' => $request->user_type,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'city' => $request->city,
                        'ngstate_id' => $request->ngstate_id,
                        'lga_id' => $request->lga_id,
                        'status' => 'pending',
                        'subvendor_id' => $request->subvendor_id,
                        'amount' => $request->amount,
                        'lga_id' => $request->lga_id,
                        // 'ref_no' => $request->ref_no,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'password' => \Hash::make($request->password),
                        'ref_no' => substr(rand(0,time()),0, 9),
                    ]);
                }elseif($request->vendor_id == null){
                    $user = User::create([
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'terms' => $request->terms,
                        'user_id' => $request->user_id,
                        'vendor_id' => '34',
                        'vendor_email' => 'simonjonah@gmail.com',
                        'reference' => $reference,
                        
                        'distributor_email' => $request->distributor_email,
                        'vendor_email' => $request->vendor_email,
                        'user_type' => $request->user_type,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'city' => $request->city,
                        'ngstate_id' => $request->ngstate_id,
                        'lga_id' => $request->lga_id,
                        'status' => 'pending',
                        'amount' => $request->amount,
                        'lga_id' => $request->lga_id,
                        'ref_no' => $request->ref_no,
                        'subvendor_id' => $request->subvendor_id,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'password' => \Hash::make($request->password),
                        'ref_no2' => substr(rand(0,time()),0, 9),
                        'ref_no3' => substr(rand(0,time()),0, 9),
                    ]);
                }else{

                    $user = User::create([
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'terms' => $request->terms,
                        'user_id' => $request->user_id,
                        'vendor_id' => $request->vendor_id,
                        'reference' => $reference,
                        'user_type' => $request->user_type,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'distributor_email' => $request->distributor_email,
                        'vendor_email' => $request->vendor_email,
                        'distributor_id' => $request->distributor_id,
                        'gender' => $request->gender,
                        'city' => $request->city,
                        'ngstate_id' => $request->ngstate_id,
                        'lga_id' => $request->lga_id,
                        'status' => 'pending',
                        'amount' => $request->amount,
                        'lga_id' => $request->lga_id,
                        'ref_no' => $request->ref_no,
                        'ref_no2' => $request->ref_no2,
                        'subvendor_id' => $request->subvendor_id,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'password' => \Hash::make($request->password),
                        'ref_no3' => substr(rand(0,time()),0, 9),
                        // 'ref_no3' => substr(rand(0,time()),0, 9),
                    ]);

                }
                

            $subscription = Subscription::create([
                'amount' => $request->amount,
                'reference' => $reference,
                'user_type' => $request->user_type,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 'pending',
            ]);

            $transaction = Transaction::create([
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'plan_id' =>$request->id,
            'user_type' => $request->user_type,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'reference' => $reference,
            'currency' => 'NGN',
            'channels' => $request->channels,
            // 'callback_url' => 'http://127.0.0.1:8000/web/thankyou',
            'user_id' => $request->id,
            'subscription_id' => $subscription->id,
            'amount' => $request->amount,
            'status' => 'pending',
            
        ]);
        if (isset($responseData['data']['authorization_url'])) {
        
            return redirect($responseData['data']['authorization_url']);
        }

        } catch (RequestException $e) {

            throw $e;
        }
    }

    
     public function transactionCallback(Request $request){
         $reference = $request->query('reference');
        //  dd($reference);
         if (!$reference) {
             return back()->with('error', 'No payment reference provided.');
         }
        
         // Verify the payment using Paystack API
         try {
             $response = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")
                 ->get('https://api.paystack.co/transaction/verify/' . $reference);
 
             $transaction = $response->json();
             $reference = $request->query('reference');
             
             if ($transaction['status'] && $transaction['data']['status'] == 'success') {
                 
                $transaction = Transaction::where('reference', $reference)->first();
                $user = User::where('reference', $reference)->first();
                $subscription = Subscription::where('reference', $reference)->first();
                $transaction->update([
                    'status' => 'success',
                    'user_id' =>$user->id,
                ]);
                $user->update([
                    'status' => 'success',
                    // 'user_id' =>$user->id,

                ]);

                $subscription->update([
                    'status' => 'success',
                    'user_id' =>$user->id,
                ]);
               
                 return redirect()->route('login')->with('success', 'Payment successful!');
             } else {
                 return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
             }
         } catch (RequestException $e) {
             
             return redirect()->route('payment.failed')->with('error', 'An error occurred. Please try again.');
         }
 
         throw $e; // or handle the error as needed
 
     }



    public function mytransctions(){
        $my_transactions = Transaction::where('user_id', auth()->user()->id)->get();
        return view('dashboard.mytransctions', compact('my_transactions'));
    }

    public function printspayment($id){
        $print_transactions = Transaction::find($id);
        return view('dashboard.printspayment', compact('print_transactions'));
    }

    public function renew(Request $request, $id){
        
        $subscription = Subscription::findOrFail($id);

        // Check if the subscription is still active or expired
        if ($subscription->status === 'expired') {
            return response()->json(['message' => 'Subscription expired.'], 400);
        }


        $plan = $subscription->plan;
        $newEndDate = Carbon::now()->addDays(365);

        // Update subscription end date
        $subscription->end_date = $newEndDate;
        $subscription->save();

       
        // Record a new payment for renewal
        Transaction::create([
            'user_id' => $subscription->user_id,
            // 'subscription_id' => $subscription->id,
            'amount' => $plan->amount,
            'subscription_id' => $request->id,

            'status' => 'pending',
        ]);
        

        return response()->json([
            'message' => 'Subscription renewed successfully.',
            'subscription' => $subscription,
        ], 200);
    }

    
}



<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Plan;
use App\Models\Subscription;
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

    public function subscribe(Request $request){
        // dd($request->all());
        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        // Calculate subscription dates
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(365);
        // Create subscription
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active',
        ]);

    }

    public function makeApiRequest(Request $request){
        $reference = substr(rand(0,time()),0, 9);
        $response = Http::withToken("sk_test_2480c735552c0c451064507cb47a75d736c5c969")->post('https://api.paystack.co/transaction/initialize', [
           'amount' => $request->amount,
            'currency' => 'NGN',
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'callback_url' => 'https://brixtonnschools.com.ng/',
            'reference' => $reference,
            'channels' => [
                "card", "bank", "ussd", "qr", "mobile_money", "bank_transfer", "eft"
            ]
        ]);

        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        // Calculate subscription dates
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(365);
        // Create subscription
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active',
        ]);

        $transaction = Transaction::create([
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'user_id' => $request->user_id,
            // 'plan_id' => $request->plan_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'reference' => $reference,
            'currency' => 'NGN',
            'channels' => $request->channels,
            'callback_url' => 'https://brixtonnschools.com.ng/',
            'user_id' => $user->id,
            'subscription_id' => $subscription->id,
            'amount' => $plan->amount,
            'status' => 'pending',
            
        ]);

        try {
               
            // $response->post($response['data']['authorization_url'], [
            //     'headers' => [
            //         'Authorization' => 'Bearer sk_test_2480c735552c0c451064507cb47a75d736c5c969',  // Correct header format
            //         'Accept'        => 'application/json',
            //     ],
            //     'json' => $response,
            // ]);
    
            $responseData = json_decode($response->getBody()->getContents(), true);
                
        
                // Update the transaction with the response data
                // $transaction->update([
                //     'amount' => $request->amount,
                //     'phone' => $request->phone,
                //     'reference' => $reference,
                //     'currency' => 'NGN',
                //     'channels' => $request->channels,
                //     'callback_url' => 'https://brixtonnschools.com.ng/',
                //     'status' => 'success',
                // ]);

            if (isset($responseData['data']['authorization_url'])) {
            // Pass the authorization URL and other data to the view

            return redirect($responseData['data']['authorization_url']);
            
            }
        
            } catch (RequestException $e) {
                // Log the error and update the transaction status
                $transaction->update([
                    'amount' => $request->amount,
                    'phone' => $e->getMessage(),
                    'user_id' => Auth::user()->id,
                    'reference' => $reference,
                    'currency' => 'NGN',
                    'channels' => $request->channels,
                    'callback_url' => 'https://brixtonnschools.com.ng/',
                    // 'response_data' => $e->getMessage(),
                    'status' => 'failed',
                ]);
        
                
            }catch (RequestException $e){

                 // Log the error and update the transaction status
                 $transaction->update([
                    'amount' => $request->amount,
                    'phone' => $e->getMessage(),
                    'user_id' => Auth::user()->id,
                    'reference' => $reference,
                    'currency' => 'NGN',
                    'channels' => $request->channels,
                    'callback_url' => 'https://brixtonnschools.com.ng/',
                    // 'response_data' => $e->getMessage(),
                    'status' => 'cancel',
                ]);
                throw $e; // or handle the error as needed
            }
        
            return redirect($responseData['data']['authorization_url']);

        // return response()->json([
        //     'endpoint' =>$transaction,
        // ]);

    }

    public function handlePaystackCallback(Request $request)
    {
        // Retrieve the payment reference from the query string
        $reference = $request->query('reference');

        // Make a request to Paystack to verify the transaction
        $response = Http::withToken(config('sk_test_2480c735552c0c451064507cb47a75d736c5c969'))
            ->get('https://api.paystack.co/transaction/verify/' . $reference);

        // Check if the API request was successful
        if ($response->successful()) {
            $data = $response->json();

            // Check if the transaction was successful or failed
            if ($data['data']['status'] === 'success') {
                // Update the payment status in the database to success
                $payment = Payment::where('reference', $reference)->first();

                if ($payment) {
                    $payment->status = 'success';
                    $payment->transaction_id = $data['data']['id'];
                    $payment->amount = $data['data']['amount'] / 100; // Paystack amount is in kobo
                    $payment->save();

                    return response()->json([
                        'message' => 'Payment was successful!',
                        'payment' => $payment,
                    ], 200);
                }
            } else {
                // Handle failed payment
                $payment = Payment::where('reference', $reference)->first();

                if ($payment) {
                    $payment->status = 'failed';
                    $payment->save();

                    return response()->json([
                        'message' => 'Payment failed!',
                        'payment' => $payment,
                    ], 400);
                }
            }
        }

        return response()->json(['message' => 'Payment verification failed.'], 500);
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



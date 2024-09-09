<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //

    public function addsubcription(){

        return view('dashboard.admin.addsubcription');
    }

    public function createsubcription(Request $request){
        $request->validate([
            'user_type' => ['required'],
            'amount' => ['required']
        ]);
        $addscript = new Subscription();
        $addscript->user_type = $request->user_type;
        $addscript->amount = $request->amount;
        $addscript->save();
        return redirect()->back()->with('success', 'You have successfully added subcription');
    
    }

    public function viewsubcription(){

        $viewsubscriptions = Subscription::latest()->get();
        return view('dashboard.admin.viewsubcription', compact('viewsubscriptions'));
    }

    public function distributorsubcription(){
        $viewsubscriptions = Subscription::latest()->get();
        return view('dashboard.admin.distributorsubcription', compact('viewsubscriptions'));
    }
    public function viewsubscriptionpayment($user_id){
        $view_transactions = Subscription::where('user_id', $user_id)->first();
        $view_transactions = Transaction::where('user_id', $user_id)->get();
        return view('dashboard.admin.viewsubscriptionpayment', compact('view_transactions'));
    }

    

    public function editsubscription($id){
        $edit_subscriptions = Subscription::find($id);
        return view('dashboard.admin.editsubscription', compact('edit_subscriptions'));
    }
  
    
    public function updatesubcription(Request $request, $id){
        $edit_subscriptions = Subscription::find($id);

        $request->validate([
            'user_type' => ['required'],
            'amount' => ['required']
        ]);
        
        $edit_subscriptions->user_type = $request->user_type;
        $edit_subscriptions->amount = $request->amount;
        $edit_subscriptions->update();
        return redirect()->back()->with('success', 'You have successfully updated subcription');
    
    }

    public function deletesubscription($id){
        $edit_subscriptions = Subscription::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have successfully deleted subcription');
 
    }

    public function makeApiRequest(Request $request){
    
        $response = Http::withToken("sk_test_2480c735552c0c451064507cb47a75d736c5c969")->post('https://api.paystack.co/transaction/initialize', [
           'amount' => $request->amount,
            'currency' => 'NGN',
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'callback_url' => 'https://account.godaddy.com/products',
            'reference' => substr(rand(0,time()),0, 9),
            'channels' => [
                "card", "bank", "ussd", "qr", "mobile_money", "bank_transfer", "eft"
            ]
        ]);
        // dd($request->all());
        $transaction = Transaction::create([
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'reference' => substr(rand(0,time()),0, 9),
            'currency' => 'NGN',
            'channels' => $request->channels,
            'callback_url' => 'https://account.godaddy.com/products',
            'status' => 'pending'
        ]);

        try {
               
           
            $responseData = json_decode($response->getBody()->getContents(), true);
        
                // Update the transaction with the response data
                $transaction->update([
                    'amount' => $request->amount,
                    'phone' => $request->phone,
                    'reference' => substr(rand(0,time()),0, 9),
                    'currency' => 'NGN',
                    'channels' => $request->channels,
                    'callback_url' => 'https://account.godaddy.com/products',
                    'status' => 'success',
                ]);
        
                // return $responseData;
                
            if (isset($responseData['data']['authorization_url'])) {

            return redirect($responseData['data']['authorization_url']);
            
            }
        
            } catch (RequestException $e) {
                // Log the error and update the transaction status
                $transaction->update([
                    'amount' => $request->amount,
                    'phone' => $e->getMessage(),
                    'user_id' => Auth::user()->id,
                    'reference' => rand(),
                    'currency' => 'NGN',
                    'channels' => $request->channels,
                    'callback_url' => 'https://account.godaddy.com/products',
                    // 'response_data' => $e->getMessage(),
                    'status' => 'failed',
                ]);
        
                throw $e; // or handle the error as needed
            }
        
            return redirect($responseData['data']['authorization_url']);

        // return response()->json([
        //     'endpoint' =>$transaction,
        // ]);

    }

    public function mysubscriptions(){
        $view_mysubs = Subscription::where('user_id', auth()->user()->id)->get();
        return view('dashboard.mysubscriptions', compact('view_mysubs'));
    }

    
    public function cancelSubscription($id){
        $approve_product = Subscription::where('id', $id)->first();
        $approve_product->status = 'canceled';
        $approve_product->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    
}

<?php

namespace App\Http\Controllers;
use App\Models\Subaccount;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
class SubaccountController extends Controller
{
    public function addsubaccount(){
        
        return view('dashboard.addsubaccount');
    }




    public function createWallet(Request $request)
    {
        $secretKey = getenv('PAYSTACK_SECRET_KEY'); // Your Paystack secret key
        $client = new Client();

       

        try {
            
                $customerResponse = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/customer', [

                    'email' => $request->input('email'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                    'preferred_bank' => $request->input('preferred_bank'),
                    'user_id' => $request->input('user_id'),
                    
                    'metadata' => [
                        'custom_fields' => [
                            [
                                'distributor_email' => $request->distributor_email,
                                'vendor_email' => $request->vendor_email,
                            ],
                            
                        ],
                    ],
                    

            ]);

            $customerData = json_decode($customerResponse->getBody(), true);
      
            // Get the customer code from Paystack
            $customerCode = $customerData['data']['customer_code'];
            $request->validate([
                'phone' => ['required', 'unique:subaccounts'],
                'email' => ['required', 'email', 'unique:subaccounts'],
            ]);
    
            // dd($customerCode);
            // Step 2: Create Virtual Account for the Customer
            $virtualAccountResponse = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/dedicated_account', [
                'customer' => $customerCode, 
                'preferred_bank' => $request->input('preferred_bank'),
            ]);

            $virtualAccountData = json_decode($virtualAccountResponse->getBody(), true);
            // dd($virtualAccountData);
           
            
            if (!$virtualAccountData['status']) {
                return response()->json([
                    'success' => false,
                    'message' => $virtualAccountData['message'],
                ], 400);
            }

           // Return the virtual account details as the "wallet"
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Wallet created successfully',
            //     'data' => [
            //         'customer' => $customerData['data'],
            //         'virtual_account' => $virtualAccountData['data'],
            //     ],
            // ], 200);


            $subaccount = Subaccount::create([
                'user_id' => $request->user_id,
                'distributor_id' => $request->distributor_id,
                'vendor_id' => $request->vendor_id,
                'distributor_email' => $request->distributor_email,
                'vendor_email' => $request->vendor_email,
                // 'vendor_email' => $request->vendor_email,
                'first_name' => $virtualAccountData['data']['customer']['first_name'],
                'last_name' => $virtualAccountData['data']['customer']['last_name'],
                'email' => $virtualAccountData['data']['customer']['email'],
                'phone' => $virtualAccountData['data']['customer']['phone'],
                // 'domain' => $virtualAccountData['data']['customer']['domain'],
                'customer_code' => $virtualAccountData['data']['customer']['customer_code'],
                'risk_action' => $virtualAccountData['data']['customer']['risk_action'],
                'customer_id' => $virtualAccountData['data']['customer']['id'],
                
                'name' => $virtualAccountData['data']['bank']['name'],
                'bank_id' => $virtualAccountData['data']['bank']['id'],
                'slug' => $virtualAccountData['data']['bank']['slug'],

                'account_name' => $virtualAccountData['data']['account_name'],
                'account_number' => $virtualAccountData['data']['account_number'],
                'assigned' => $virtualAccountData['data']['assigned'],
                'currency' => $virtualAccountData['data']['currency'],
                'active' => $virtualAccountData['data']['active'],
                'virtual_account_id' => $virtualAccountData['data']['id'],

                'assignee_id' => $virtualAccountData['data']['assignment']['assignee_id'],
                'assignee_type' => $virtualAccountData['data']['assignment']['assignee_type'],
                'assigned_at' => $virtualAccountData['data']['assignment']['assigned_at'],
                'expired' => $virtualAccountData['data']['assignment']['expired'],
                'expired_at' => $virtualAccountData['data']['assignment']['expired_at'],
                'account_type' => $virtualAccountData['data']['assignment']['account_type'],
                
            ]);
            // dd($virtualAccountData);
            return redirect()->back()->with('success', 'You have created wallet successfully');
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Wallet created successfully',
            //     'data' => [
            //         'customer' => $customerData['data'],
            //         'virtual_account' => $virtualAccountData['data'],
            //         // 'balance' => $virtualAccountData['data']['balance'],

            //     ],
            // ], 200);

        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());

            // return response()->json([
            //     'success' => false,
            //     'message' => $e->getMessage(),
            // ], 500);
        }
    }
}


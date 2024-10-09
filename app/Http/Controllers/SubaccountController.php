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

//public function createSubaccount(Request $request){
    // Validate request
    // $request->validate([
    //     'business_name' => 'required|string',
    //     'settlement_bank' => 'required|string',
    //     'account_number' => 'required|string',
    //     'percentage_charge' => 'required|numeric|min:0|max:100',
    // ]);
    // Prepare data for the subaccount
    // $data = [
    //     'business_name' => $request->input('business_name'),
    //     'settlement_bank' => $request->input('settlement_bank'),
    //     'account_number' => $request->input('account_number'),
    //     'percentage_charge' => $request->input('percentage_charge'), // The split percentage
    // ];

    // $client = new Client();

//     try {
//        // Make the request to Paystack's API
//         // $response = $client->request('POST', 'https://api.paystack.co/subaccount', [
//         //     'headers' => [
//         //         'Authorization' => 'Bearer sk_test_d320f1edcb2c172115da615043090c1580f9758f',
//         //         'Content-Type' => 'application/json',
//         //         'Accept' => 'application/json',
//         //     ],
//         //     'json' => $data,
//         // ]);

//         $response = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/subaccount', [
//             'business_name' => $request->business_name,
//             'settlement_bank' => $request->settlement_bank,
//             'account_number' => $request->account_number,
//             'percentage_charge' => $request->percentage_charge,
//          ]);
//         //  dd($response);
//          $request->validate([
//             'business_name' => 'required|string',
//             'settlement_bank' => 'required|string',
//             'account_number' => 'required|string',
//             'percentage_charge' => 'required|numeric|min:0|max:100',
//         ]);
//         // Decode the JSON response
//         $responseData = json_decode($response->getBody(), true);
//         dd($responseData);
//         if ($responseData['status']) {
//             // Store subaccount in the database
//             Subaccount::create([
//                 'subaccount_code' => $responseData['data']['subaccount_code'],
//                 'business_name' => $responseData['data']['business_name'],
//                 'settlement_bank' => $responseData['data']['settlement_bank'],
//                 'account_number' => $responseData['data']['account_number'],
//                 'percentage_charge' => $responseData['data']['percentage_charge'],
//                 'user_id' => Auth::user()->id,
//             ]);

//             return response()->json(['message' => 'Subaccount created and saved successfully!', 'data' => $responseData['data']]);
//         } else {
//             return response()->json(['message' => 'Failed to create subaccount.', 'error' => $responseData['message']], 400);
//         }
//     } catch (\Exception $e) {
//         return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
//     }
// }



    public function createWallet(Request $request)
    {
        $secretKey = getenv('PAYSTACK_SECRET_KEY'); // Your Paystack secret key
        $client = new Client();

        $request->validate([
            'phone' => 'required'
        ]);

        try {
            // Step 1: Create Customer in Paystack
            // $customerResponse = $client->post('https://api.paystack.co/customer', [
                // 'headers' => [
                //     'Authorization' => 'Bearer ' . $secretKey,
                //     'Content-Type' => 'application/json',
                // ],
                // 'json' => [
                //     'email' => $request->input('email'),
                //     'first_name' => $request->input('first_name'),
                //     'last_name' => $request->input('last_name'),
                //     'phone' => $request->input('phone'),
                // ],
                $customerResponse = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/customer', [

                    'email' => $request->input('email'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                    'preferred_bank' => $request->input('preferred_bank'),
                    'user_id' => $request->input('user_id'),
                    

            ]);

            $customerData = json_decode($customerResponse->getBody(), true);
            // dd($customerData);
            // Check if customer creation was successful
            // if (!$customerData['status']) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => $customerData['message'],
            //     ], 400);
            // }

            // Get the customer code from Paystack
            $customerCode = $customerData['data']['customer_code'];
            // dd($customerCode);
            // Step 2: Create Virtual Account for the Customer
            $virtualAccountResponse = Http::withToken("sk_test_d320f1edcb2c172115da615043090c1580f9758f")->post('https://api.paystack.co/dedicated_account', [
                'customer' => $customerCode, // Customer code from Paystack
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
           
            return response()->json([
                'success' => true,
                'message' => 'Wallet created successfully',
                'data' => [
                    'customer' => $customerData['data'],
                    'virtual_account' => $virtualAccountData['data'],
                    // 'balance' => $virtualAccountData['data']['balance'],

                ],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}


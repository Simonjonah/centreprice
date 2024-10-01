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
//         //         'Authorization' => 'Bearer sk_test_2480c735552c0c451064507cb47a75d736c5c969',
//         //         'Content-Type' => 'application/json',
//         //         'Accept' => 'application/json',
//         //     ],
//         //     'json' => $data,
//         // ]);

//         $response = Http::withToken("sk_test_2480c735552c0c451064507cb47a75d736c5c969")->post('https://api.paystack.co/subaccount', [
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
        $secretKey = env('PAYSTACK_SECRET_KEY'); // Your Paystack secret key
        $client = new Client();

        try {
            // Step 1: Create Customer in Paystack
            $customerResponse = $client->post('https://api.paystack.co/customer', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $secretKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'email' => $request->input('email'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'phone' => $request->input('phone'),
                ],
            ]);

            $customerData = json_decode($customerResponse->getBody(), true);

            // Check if customer creation was successful
            if (!$customerData['status']) {
                return response()->json([
                    'success' => false,
                    'message' => $customerData['message'],
                ], 400);
            }

            // Get the customer code from Paystack
            $customerCode = $customerData['data']['customer_code'];

            // Step 2: Create Virtual Account for the Customer
            $virtualAccountResponse = $client->post('https://api.paystack.co/dedicated_account', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $secretKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'customer' => $customerCode, // Customer code from Paystack
                    'preferred_bank' => $request->input('preferred_bank'), // Optional: Preferred bank
                ],
            ]);

            $virtualAccountData = json_decode($virtualAccountResponse->getBody(), true);

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


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Transfer;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class TransferController extends Controller
{
   
    public function createTransferRecipient(Request $request)
    {
        // $client = new Client();
        // $response = $client->post('https://api.paystack.co/transferrecipient', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         'type' => 'nuban', 
        //         'name' => $request->name, 
        //         'account_number' => $request->account_number,
        //         'bank_code' => $request->bank_code, 
        //         'currency' => 'NGN',
        //     ],
        // ]);

        // $response = Http::withToken('sk_test_d320f1edcb2c172115da615043090c1580f9758f')->get('');
        $response = Http::withToken('sk_test_d320f1edcb2c172115da615043090c1580f9758f')->get('https://api.paystack.co/transferrecipient', [
            // 'currency' => 'NGN'
            'type' => 'nuban', 
            'name' => $request->name, 
            'account_number' => $request->account_number,
            'bank_code' => $request->bank_code, 
            'currency' => 'NGN',
        ]);
        if ($response->successful() && !empty($response->json()['data'])) {
            $recipients = $response->json()['data'];

            foreach ($recipients as $recipient) {
                Transfer::updateOrCreate(
                    ['recipient_code' => $recipient['recipient_code']],
                    [
                        'name' => $recipient['name'],
                        'email' => $recipient['email'] ?? null,
                        'bank_name' => $recipient['details']['bank_name'],
                        'account_number' => $recipient['details']['account_number']
                    ]
                );
            }

            return response()->json(['message' => 'Recipients stored successfully.']);
        }

        return response()->json(['message' => 'No recipients found or failed to retrieve recipients.']);
    }

    
    //         $responseBody = json_decode($response->getBody(), true);
    //         if ($responseBody['status'] && !empty($response->json()['data'])) {
    //             $recipients = $response->json()['data'];
    //                 foreach ($recipients as $recipient) {
    //                 $transfer = Transfer::updateOrCreate(
    //                     ['recipient_code' => $responseBody['recipient_code']],
    //                     [
    //                         'name' => $responseBody['name'],
    //                         'email' => $responseBody['email'] ?? null,
    //                         'bank_name' => $responseBody['details']['bank_name'],
    //                         'account_number' => $responseBody['details']['account_number']
    //                     ]);
            
    //         return response()->json(['recipient_code' => $responseBody['data']['recipient_code']]);
    //     }
    
    //     return response()->json(['error' => $responseBody['message']], 400);
    // }
    

    
    public function initiateTransfer(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.paystack.co/transfer', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'source' => 'balance',
                'amount' => $request->amount * 100, // Amount in kobo (convert to kobo by multiplying NGN by 100)
                'recipient' => $request->recipient_code, // The recipient code from the previous step
                'reason' => $request->reason, // Reason for transfer
            ],
        ]);
    
        $responseBody = json_decode($response->getBody(), true);
        
        if($responseBody['status']) {
            return response()->json(['message' => 'Transfer initiated successfully']);
        }
    
        return response()->json(['error' => $responseBody['message']], 400);
    }
    
    
    
    // Route::post('/create-transfer-recipient', 'YourController@createTransferRecipient');
    // Route::post('/initiate-transfer', 'YourController@initiateTransfer');
    
    }
    

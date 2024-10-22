<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Http;
class BankController extends Controller
{
    public function viewbank(){
        $view_contacts = Bank::all();
        return view('dashboard.admin.viewbank', compact('view_contacts'));
    }


    public function fetchBanks(Request $request){   
        $request->validate([
            'simon' => 'nullable',
        ]);
        $response = Http::withToken('sk_test_d320f1edcb2c172115da615043090c1580f9758f')->get('https://api.paystack.co/bank', [
            'currency' => 'NGN'
        ]);

        if ($response->successful()) {
            $banks = $response->json()['data'];

            foreach ($banks as $bank) {
                Bank::updateOrCreate(
                    ['code' => $bank['code']],
                    [
                        'name' => $bank['name'],
                        'slug' => $bank['slug'],
                        'country' => $bank['country'],
                        'type' => $bank['type'],
                        'is_deleted' => $bank['is_deleted'],
                        'currency' => $bank['currency'],
                        'createdAt' => $bank['createdAt'],
                        'longcode' => $bank['longcode'],
                        'gateway' => $bank['gateway'],
                        'createdAt' => $bank['createdAt'],
                        'pay_with_bank' => $bank['pay_with_bank'],
                        'updatedAt' => $bank['updatedAt'],
                        
                    ]
                );
            }
            return redirect()->back()->with('success', 'Banks stored successfully.');
            // return response()->json(['message' => 'Banks stored successfully.']);
        }
        return redirect()->back()->with('fail', 'Failed to fetch banks.');

        // return response()->json(['error' => 'Failed to fetch banks'], 500);
    }

}

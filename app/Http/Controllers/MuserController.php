<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muser;
class MuserController extends Controller
{
    public function get_all_users(){
        $users = Muser::all();
        return response()->json($users);
    }

    public function creat_user(Request $request){
        $createuser = Muser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'come and see'
        ], 200);
    }

    public function delete_user(Request $request, $id){
        $deletesingle_user = Muser::where('id', $id)->delete();
        return response()->json($deletesingle_user);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function createcontact(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);
        $addcontact = new Contact();
        $addcontact->name = $request->name;
        $addcontact->phone = $request->phone;
        $addcontact->email = $request->email;
        $addcontact->message = $request->message;
        $addcontact->save();
        
        return redirect()->back()->with('success', 'You hav submitted your information successfully');
    }

    public function viewcontact(){
        $view_contacts = Contact::latest()->get();
        return view('dashboard.admin.viewcontact', compact('view_contacts'));
    }

    public function deletecontact($id){
        $delete = Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted the contact successfully');
    }
}

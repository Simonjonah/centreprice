<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    //
    public function addadverts(){

        return view('dashboard.admin.addadverts');
    }

    public function createadverts(Request $request){
        $request->validate([
            'company_name' => ['required', 'max:255', 'string'],
            'title' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'body' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'linkedin' => ['required', 'string'],
            'event_date' => ['nullable', 'string'],
            
            'images1' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images1')){
            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('productimages', $filename);

        }else{
            $path = 'noimage.jpg';
        }

        $add_advert = new Advert();
        $add_advert['images1'] = $path;
        $add_advert->company_name = $request->company_name;
        $add_advert->title = $request->title;
        $add_advert->email = $request->email;
        $add_advert->phone = $request->phone;
        $add_advert->address = $request->address;
        $add_advert->body = $request->body;
        $add_advert->facebook = $request->facebook;
        $add_advert->twitter = $request->twitter;
        $add_advert->linkedin = $request->linkedin;
        $add_advert->event_date = $request->event_date;
        $add_advert->slug = SlugService::createSlug(Advert::class, 'slug', $request->title);
        $add_advert->ref_no = substr(rand(0,time()),0, 9);
        $add_advert->whatsapp = $request->whatsapp;
        $add_advert->save();
        return redirect()->route('admin.firstadvertphoto', ['ref_no' =>$add_advert->ref_no]); 

        // return redirect()->back()->with('success', 'You have successfully submitted adverts');
    }

    public function firstadvertphoto($ref_no){
        $add_photo = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.firstadvertphoto', compact('add_photo'));
    }
    public function updateaddphoto(Request $request, $ref_no){
        $addsecondphoto = Advert::where('ref_no', $ref_no)->first();
        $request->validate([
            'images2' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images2')){

            $file = $request['images2'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images2')->storeAs('productimages', $filename);
            $addsecondphoto['images2'] = $path;

        }
        
        $addsecondphoto->update();
        return redirect()->route('admin.addsecondphoto2', ['ref_no' =>$addsecondphoto->ref_no]); 

    }


    public function addsecondphoto2($ref_no){
        $add_photo = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.addsecondphoto2', compact('add_photo'));
    }


    public function updateaddphoto2(Request $request, $ref_no){
        $addsecondphoto = Advert::where('ref_no', $ref_no)->first();
        $request->validate([
            'images3' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images3')){

            $file = $request['images3'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images3')->storeAs('productimages', $filename);
            $addsecondphoto['images3'] = $path;

        }
        
        $addsecondphoto->update();
        return redirect()->route('admin.addfouthphoto4', ['ref_no' =>$addsecondphoto->ref_no]); 

    }
    
    public function addfouthphoto4($ref_no){
        $add_photo = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.addfouthphoto4', compact('add_photo'));
    }


    public function updateaddphoto4(Request $request, $ref_no){
        $addsecondphoto = Advert::where('ref_no', $ref_no)->first();
        $request->validate([
            'images4' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images4')){

            $file = $request['images4'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images4')->storeAs('productimages', $filename);
            $addsecondphoto['images4'] = $path;

        }
        
        $addsecondphoto->update();
        return redirect()->route('admin.addfouthphoto5', ['ref_no' =>$addsecondphoto->ref_no]); 

    }


    public function addfouthphoto5($ref_no){
        $add_photo = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.addfouthphoto5', compact('add_photo'));
    }

     
    public function updateaddphoto5(Request $request, $ref_no){
        $addsecondphoto = Advert::where('ref_no', $ref_no)->first();
        $request->validate([
            'images5' => 'required|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images5')){

            $file = $request['images5'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images5')->storeAs('productimages', $filename);
            $addsecondphoto['images5'] = $path;

        }
        
        $addsecondphoto->update();
        return redirect()->back()->with('success', 'You have finished adding the advertisement pictures');
    }

    public function viewadvertments(){
        $view_advertisements = Advert::latest()->get();
        return view('dashboard.admin.viewadvertments', compact('view_advertisements'));
    }

    public function approveadverts($ref_no){
        $add_advert = Advert::where('ref_no', $ref_no)->first();
        $add_advert->status = 'approved';
        $add_advert->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function suspendadverts($ref_no){
        $add_advert = Advert::where('ref_no', $ref_no)->first();
        $add_advert->status = 'suspend';
        $add_advert->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    
    public function viewsingleadverts($ref_no){
        $view_advertsingleads = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewsingleadverts', compact('view_advertsingleads'));
    }

    public function editadverts($ref_no){
        $edit_advert = Advert::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editadverts', compact('edit_advert'));
    }

    public function updateadverts(Request $request, $ref_no){
        $edit_advert = Advert::where('ref_no', $ref_no)->first();
        $request->validate([
            'company_name' => ['required', 'max:255', 'string'],
            'title' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'body' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'linkedin' => ['required', 'string'],
            'event_date' => ['nullable', 'string'],
            
            'images1' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        if ($request->hasFile('images1')){
            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('productimages', $filename);
            $edit_advert['images1'] = $path;

        }else{
            $path = 'noimage.jpg';
        }

        $edit_advert->company_name = $request->company_name;
        $edit_advert->title = $request->title;
        $edit_advert->email = $request->email;
        $edit_advert->phone = $request->phone;
        $edit_advert->address = $request->address;
        $edit_advert->body = $request->body;
        $edit_advert->facebook = $request->facebook;
        $edit_advert->twitter = $request->twitter;
        $edit_advert->linkedin = $request->linkedin;
        $edit_advert->event_date = $request->event_date;
      
        $edit_advert->whatsapp = $request->whatsapp;
        $edit_advert->update();
        return redirect()->route('admin.firstadvertphoto', ['ref_no' =>$edit_advert->ref_no]); 

        // return redirect()->back()->with('success', 'You have successfully submitted adverts');
    }

    public function deleteadverts($ref_no){
        $delete_advert = Advert::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted the adverts successfully');
    }
    
    
}

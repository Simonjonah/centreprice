<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class RootController extends Controller
{
    
    public function addroots(){

        return view('dashboard.admin.addroots');
    }
}

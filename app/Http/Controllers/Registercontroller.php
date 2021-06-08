<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registercontroller extends Controller
{
    public function index(){
    	
    	return view('register.v_register');
    }
}

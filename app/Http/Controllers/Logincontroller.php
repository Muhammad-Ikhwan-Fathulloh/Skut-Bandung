<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengelolamodel;

class Logincontroller extends Controller
{
	public function __construct(){
		$this->Pengelolamodel = new Pengelolamodel();
	}

    public function index(){
    	$data = [
    		'pengelola' => $this->Pengelolamodel->allData(),
    	];
    	
    	return view('login.v_login');
    }

    public function postlogin(Request $request){
    	
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return redirect()->route('dashboard');
    	}
    	return redirect()->back();
    	
    }

    public function getlogin(){

    	return view('login.v_login');
    }
}

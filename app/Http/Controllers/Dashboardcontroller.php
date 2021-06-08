<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelolamodel;
use App\Penggunamodel;
use App\Wisatamodel;
use App\Transaksimodel;

class Dashboardcontroller extends Controller
{
	public function __construct(){
		$this->Pengelolamodel = new Pengelolamodel();
		$this->Penggunamodel = new Penggunamodel();
		$this->Wisatamodel = new Wisatamodel();
		$this->Transaksimodel = new Transaksimodel();
		$this->middleware('auth');
	}

    public function index(){
    	$data = [
    		'jumlah_pengelola' => $this->Pengelolamodel->allDatas()->count(),
    		'jumlah_pengguna' => $this->Penggunamodel->allDatas()->count(),
    		'jumlah_wisata' => $this->Wisatamodel->allDatas()->count(),
    		'jumlah_transaksi' => $this->Transaksimodel->allDatas()->count(),
    	];

    	return view('dashboard.v_dashboard', $data);
    }
}

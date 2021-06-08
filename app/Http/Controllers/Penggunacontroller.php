<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggunamodel;
use Illuminate\Support\Facades\DB;

class Penggunacontroller extends Controller
{
	public function __construct(){
		$this->Penggunamodel = new Penggunamodel();
        $this->middleware('auth');
	}

    public function index(){
        $data = [
            'pengguna' => $this->Penggunamodel->allData()
        ];
    	
    	return view('pengguna.v_pengguna', $data);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $pengguna = $this->Penggunamodel->Search($cari);
        
        return view('pengguna.v_pengguna', ['pengguna' => $pengguna]);
    }

    public function detail($id_pengguna){
    	if (!$this->Penggunamodel->detailData($id_pengguna)) {
    		abort(404);
    	}
    	$data = [
    		'detail' => $this->Penggunamodel->detailData($id_pengguna),
    	];
    	return view('pengguna.v_detailpengguna', $data);
    }

    public function add(){
    	return view('pengguna.v_addpengguna');
    }

    public function insert(){
    	Request()->validate([
            'id_pengguna' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'saldo' => 'required',
            'password' => 'required'
        ], [
            'id_pengguna.required' => 'Wajib diisi !!',
            'fullname.required' => 'Wajib diisi !!',
            'username.required' => 'Wajib diisi !!',
            'email.required' => 'Wajib diisi !!',
            'nohp.required' => 'Wajib diisi !!',
            'alamat.required' => 'Wajib diisi !!',
            'saldo.required' => 'Wajib diisi !!',
            'password.required' => 'Wajib diisi !!'
        ]);

        $data = [
            'id_pengguna' => Request()->id_pengguna,
            'fullname' => Request()->fullname,
            'username' => Request()->username,
            'email' => Request()->email,
            'nohp' => Request()->nohp,
            'alamat' => Request()->alamat,
            'saldo' => Request()->saldo,
            'password' => Request()->password
        ];
    	$this->Penggunamodel->addData($data);

    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_pengguna){
    	if (!$this->Penggunamodel->detailData($id_pengguna)) {
    		abort(404);
    	}
    	$data = [
    		'edit' => $this->Penggunamodel->detailData($id_pengguna),
    	];
    	return view('pengguna.v_editpengguna', $data);
    }

    public function update($id_pengguna){
    	Request()->validate([
            'id_pengguna' => 'required',
    		'fullname' => 'required',
    		'username' => 'required',
    		'email' => 'required',
    		'nohp' => 'required',
    		'alamat' => 'required',
            'saldo' => 'required',
    		'password' => 'required'
    	], [
            'id_pengguna.required' => 'Wajib diisi !!',
    		'fullname.required' => 'Wajib diisi !!',
    		'username.required' => 'Wajib diisi !!',
    		'email.required' => 'Wajib diisi !!',
    		'nohp.required' => 'Wajib diisi !!',
    		'alamat.required' => 'Wajib diisi !!',
            'saldo.required' => 'Wajib diisi !!',
    		'password.required' => 'Wajib diisi !!'
    	]);

    	$data = [
            'id_pengguna' => Request()->id_pengguna,
    		'fullname' => Request()->fullname,
            'username' => Request()->username,
            'email' => Request()->email,
            'nohp' => Request()->nohp,
            'alamat' => Request()->alamat,
            'saldo' => Request()->saldo,
            'password' => Request()->password
    	];

    	$this->Penggunamodel->editData($id_pengguna, $data);

    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id_pengguna){
    	$this->Penggunamodel->deleteData($id_pengguna);
    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggunamodel;

class PenggunaApicontroller extends Controller
{
	public function __construct(){
		$this->Penggunamodel = new Penggunamodel();
	}

    public function index(){
    	$data = [
    		'pengguna' => $this->Penggunamodel->allDatas(),
    	];

        return response()->json($data);
    	
    	return view('pengguna.v_pengguna', $data);
    }

    public function indexk($id_pengguna){
        $data = [
            'pengguna' => $this->Penggunamodel->allDatak($id_pengguna),
        ];

        return response()->json($data);
        
        return view('pengguna.v_pengguna', $data);
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

    public function insert(Request $request){
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
            'id_pengguna' => $request->id_pengguna,
    		'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'saldo' => $request->saldo,
            'password' => $request->password
    	];

    	$this->Penggunamodel->addData($data);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);

    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_pengguna, Request $request){
    	if (!$this->Penggunamodel->detailData($id_pengguna)) {
    		abort(404);
    	}
    	$data = [
    		'edit' => $this->Penggunamodel->detailData($id_pengguna),
    	];
    	return view('pengguna.v_editpengguna', $data);
    }

    public function update($id_pengguna, Request $request){
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
            'id_pengguna' => $request->id_pengguna,
    		'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'saldo' => $request->saldo,
            'password' => $request->password
    	];

    	$this->Penggunamodel->editData($id_pengguna, $data);

        return response()->json([
            "message" => "Sukses ubah data".$id_pengguna
        ]);

    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id_pengguna){
    	$this->Penggunamodel->deleteData($id_pengguna);

        return response()->json([
            "message" => "Sukses hapus data".$id_pengguna
        ]);
        
    	return redirect()->route('pengguna')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

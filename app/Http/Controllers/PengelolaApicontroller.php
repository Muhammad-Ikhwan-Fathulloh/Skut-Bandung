<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelolamodel;

class PengelolaApicontroller extends Controller
{
	public function __construct(){
		$this->Pengelolamodel = new Pengelolamodel();
	}

    public function index(){
    	$data = [
    		'pengelola' => $this->Pengelolamodel->allDatas(),
    	];

        return response()->json($data);

    	return view('pengelola.v_pengelola', $data);
        
    }

    public function detail($id){
    	if (!$this->Pengelolamodel->detailData($id)) {
    		abort(404);
    	}
    	$data = [
    		'detail' => $this->Pengelolamodel->detailData($id),
    	];
    	return view('pengelola.v_detailpengelola', $data);
    }

    public function add(){
    	return view('pengelola.v_addpengelola');
    }

    public function insert(Request $request){
    	Request()->validate([
    		'fullname' => 'required',
    		'username' => 'required',
    		'email' => 'required',
    		'nohp' => 'required',
    		'alamat' => 'required',
    		'password' => 'required'
    	], [
    		'fullname.required' => 'Wajib diisi !!',
    		'username.required' => 'Wajib diisi !!',
    		'email.required' => 'Wajib diisi !!',
    		'nohp.required' => 'Wajib diisi !!',
    		'alamat.required' => 'Wajib diisi !!',
    		'password.required' => 'Wajib diisi !!',
    	]);

    	$data = [
    		'fullname' => $request->fullname,
    		'username' => $request->username,
    		'email' => $request->email,
    		'nohp' => $request->nohp,
    		'alamat' => $request->alamat,
    		'password' => $request->password
    	];

    	$this->Pengelolamodel->addData($data);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);

    	return redirect()->route('pengelola')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id, Request $request){
    	if (!$this->Pengelolamodel->detailData($id)) {
    		abort(404);
    	}
    	$data = [
    		'edit' => $this->Pengelolamodel->detailData($id),
    	];
    	return view('pengelola.v_editpengelola', $data);
    }

    public function update($id, Request $request){
    	Request()->validate([
    		'fullname' => 'required',
    		'username' => 'required',
    		'email' => 'required',
    		'nohp' => 'required',
    		'alamat' => 'required',
    		'password' => 'required'
    	], [
    		'fullname.required' => 'Wajib diisi !!',
    		'username.required' => 'Wajib diisi !!',
    		'email.required' => 'Wajib diisi !!',
    		'nohp.required' => 'Wajib diisi !!',
    		'alamat.required' => 'Wajib diisi !!',
    		'password.required' => 'Wajib diisi !!',
    	]);

    	$data = [
    		'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'password' => $request->password
    	];

    	$this->Pengelolamodel->editData($id, $data);

        return response()->json([
            "message" => "Sukses ubah data".$id
        ]);

    	return redirect()->route('pengelola')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id){
    	$this->Pengelolamodel->deleteData($id);

        return response()->json([
            "message" => "Sukses hapus data".$id
        ]);

    	return redirect()->route('pengelola')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengelolamodel;

class Pengelolacontroller extends Controller
{
	public function __construct(){
		$this->Pengelolamodel = new Pengelolamodel();
        $this->middleware('auth');
	}

    public function index(){
    	$data = [
    		'pengelola' => $this->Pengelolamodel->allData(),
    	];

    	return view('pengelola.v_pengelola', $data);
        
    }

    public function search(Request $request){
        $cari = $request->cari;
        $pengelola = $this->Pengelolamodel->Search($cari);
        
        return view('pengelola.v_pengelola', ['pengelola' => $pengelola]);
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

    	return redirect()->route('pengelola')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id){
    	$this->Pengelolamodel->deleteData($id);

    	return redirect()->route('pengelola')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

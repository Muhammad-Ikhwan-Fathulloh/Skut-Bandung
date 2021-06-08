<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksimodel;
use App\Penggunamodel;
use App\Wisatamodel;
use App\Aksesmodel;

class TransaksiApicontroller extends Controller
{
	public function __construct(){
		$this->Transaksimodel = new Transaksimodel();
		$this->Penggunamodel = new Penggunamodel();
		$this->Wisatamodel = new Wisatamodel();
        $this->Aksesmodel = new Aksesmodel();
	}

    public function index(){

    	$data = [
    		'transaksi' => $this->Transaksimodel->allDatas(),
    	];

        return response()->json($data);

    	return view('transaksi.v_transaksi', $data);
    }

    public function akses($id){

        $data = [
            'akses' => $this->Aksesmodel->allData($id),
        ];

        return response()->json($data);

        return view('transaksi.v_transaksi', $data);
    }

    public function aksesk($id, Request $request){

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_destinasi' => $request->id_destinasi
        ];

        $this->Aksesmodel->editData($id, $data);

        return response()->json($data);

        return view('transaksi.v_transaksi', $data);
    }

    public function indexk($id_transaksi){

        $data = [
            'transaksi' => $this->Transaksimodel->allDatak($id_transaksi),
        ];

        return response()->json($data);

        return view('transaksi.v_transaksi', $data);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $transaksi = $this->Transaksimodel->Search($cari);
        
        return view('transaksi.v_transaksi', ['transaksi' => $transaksi]);
    }

    public function detail($id_transaksi){
        if (!$this->Transaksimodel->detailData($id_transaksi)) {
            abort(404);
        }
        $data = [
            'detail' => $this->Transaksimodel->detailData($id_transaksi)
        ];
        return view('transaksi.v_detailtransaksi', $data);
    }

    public function add(){
    	$data = [
    		'pengguna' => $this->Penggunamodel->allData(),
    		'wisata' => $this->Wisatamodel->allData()
    	];

        return view('transaksi.v_addtransaksi', $data);
    }

    public function insert(Request $request){
    	Request()->validate([
    		'id_transaksi' => 'required',
    		'id_code' => 'required',
            'id_pengguna' => 'required',
            'status' => 'required'
        ], [
            'id_transaksi.required' => 'Wajib diisi !!',
            'id_code.required' => 'Wajib diisi !!',
            'id_pengguna.required' => 'Wajib diisi !!',
            'status.required' => 'Wajib diisi !!',
        ]);

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_code' => $request->id_code,
            'id_pengguna' => $request->id_pengguna,
            'status' => $request->status,
        ];
    	$this->Transaksimodel->addData($data);

    	return redirect()->route('transaksi')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function update($id_transaksi, Request $request){
        Request()->validate([
            'id_transaksi' => 'required',
            'id_code' => 'required',
            'id_pengguna' => 'required',
            'status' => 'required'
        ], [
            'id_transaksi.required' => 'Wajib diisi !!',
            'id_code.required' => 'Wajib diisi !!',
            'id_pengguna.required' => 'Wajib diisi !!',
            'status.required' => 'Wajib diisi !!'
        ]);

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'id_code' => $request->id_code,
            'id_pengguna' => $request->id_pengguna,
            'status' => $request->status
        ];
        $this->Transaksimodel->editData($id_transaksi, $data);

        return response()->json($data);

        return redirect()->route('transaksi')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id_transaksi){
    	$this->Transaksimodel->deleteData($id_transaksi);
    	return redirect()->route('transaksi')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

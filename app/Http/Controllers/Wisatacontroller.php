<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisatamodel;

class Wisatacontroller extends Controller
{
	public function __construct(){
		$this->Wisatamodel = new Wisatamodel();
        $this->middleware('auth');
	}

    public function index(){
    	$data = [
    		'wisata' => $this->Wisatamodel->allData(),
    	];
    	
    	return view('wisata.v_wisata', $data);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $wisata = $this->Wisatamodel->Search($cari);
        
        return view('wisata.v_wisata', ['wisata' => $wisata]);
    }

    public function detail($id_code){
        if (!$this->Wisatamodel->detailData($id_code)) {
            abort(404);
        }
        $data = [
            'detail' => $this->Wisatamodel->detailData($id_code),
        ];
        return view('wisata.v_detailwisata', $data);
    }

    public function add(){
        return view('wisata.v_addwisata');
    }

    public function insert(){
        Request()->validate([
            'id_code' => 'required',
            'gambar_wisata' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            'nama_wisata' => 'required',
            'alamat_wisata' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'harga_wisata' => 'required',
            'keterangan_destinasi' => 'required'
        ], [
            'id_code.required' => 'Wajib diisi !!',
            'gambar_wisata.required' => 'Wajib diisi !!',
            'nama_wisata.required' => 'Wajib diisi !!',
            'alamat_wisata.required' => 'Wajib diisi !!',
            'latitude.required' => 'Wajib diisi !!',
            'longitude.required' => 'Wajib diisi !!',
            'harga_wisata.required' => 'Wajib diisi !!',
            'keterangan_destinasi.required' => 'Wajib diisi !!'
        ]);

        $file = Request()->gambar_wisata;
        $fileName = Request()->id_code.'.'.$file->extension();
        $file->move(public_path('g_destinasi'), $fileName);

        $data = [
            'id_code' => Request()->id_code,
            'gambar_wisata' => $fileName,
            'nama_wisata' => Request()->nama_wisata,
            'alamat_wisata' => Request()->alamat_wisata,
            'latitude' => Request()->latitude,
            'longitude' => Request()->longitude,
            'harga_wisata' => Request()->harga_wisata,
            'keterangan_destinasi' => Request()->keterangan_destinasi
        ];

        $this->Wisatamodel->addData($data);

        return redirect()->route('wisata')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_code){
        if (!$this->Wisatamodel->detailData($id_code)) {
            abort(404);
        }
        $data = [
            'edit' => $this->Wisatamodel->detailData($id_code),
        ];
        return view('wisata.v_editwisata', $data);
    }

    public function update($id_code){
        Request()->validate([
            'id_code' => 'required',
            'gambar_wisata' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            'nama_wisata' => 'required',
            'alamat_wisata' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'harga_wisata' => 'required',
            'keterangan_destinasi' => 'required'
        ], [
            'id_code.required' => 'Wajib diisi !!',
            'gambar_wisata.required' => 'Wajib diisi !!',
            'nama_wisata.required' => 'Wajib diisi !!',
            'alamat_wisata.required' => 'Wajib diisi !!',
            'latitude.required' => 'Wajib diisi !!',
            'longitude.required' => 'Wajib diisi !!',
            'harga_wisata.required' => 'Wajib diisi !!',
            'keterangan_destinasi.required' => 'Wajib diisi !!'
        ]);
        if (Request()->gambar_wisata <> "") {
            $file = Request()->gambar_wisata;
            $fileName = Request()->id_code.'.'.$file->extension();
            $file->move(public_path('g_destinasi'), $fileName);

            $data = [
                'id_code' => Request()->id_code,
                'gambar_wisata' => $fileName,
                'nama_wisata' => Request()->nama_wisata,
                'alamat_wisata' => Request()->alamat_wisata,
                'latitude' => Request()->latitude,
                'longitude' => Request()->longitude,
                'harga_wisata' => Request()->harga_wisata,
                'keterangan_destinasi' => Request()->keterangan_destinasi
            ];

            $this->Wisatamodel->editData($id_code, $data);
        }else{
            $data = [
                'id_code' => Request()->id_code,
                'gambar_wisata' => $fileName,
                'nama_wisata' => Request()->nama_wisata,
                'alamat_wisata' => Request()->alamat_wisata,
                'latitude' => Request()->latitude,
                'longitude' => Request()->longitude,
                'harga_wisata' => Request()->harga_wisata,
                'keterangan_destinasi' => Request()->keterangan_destinasi
            ];

            $this->Wisatamodel->editData($id_code, $data);
        }

        return redirect()->route('wisata')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id_code){
        $wisata = $this->Wisatamodel->detailData($id_code);
        if ($wisata->gambar_wisata <> "") {
            unlink(public_path('g_destinasi').'/'.$wisata->gambar_wisata);
        }
        $this->Wisatamodel->deleteData($id_code);
        return redirect()->route('wisata')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

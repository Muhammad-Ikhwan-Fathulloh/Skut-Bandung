<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisatamodel;

class WisataApicontroller extends Controller
{
	public function __construct(){
		$this->Wisatamodel = new Wisatamodel();
	}

    public function index(){
    	$data = [
    		'wisata' => $this->Wisatamodel->allDatas(),
    	];

        return response()->json($data);
    	
    	return view('wisata.v_wisata', $data);
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

    public function insert(Request $request){
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
            'id_code' => $request->id_code,
            'gambar_wisata' => $fileName,
            'nama_wisata' => $request->nama_wisata,
            'alamat_wisata' => $request->alamat_wisata,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'harga_wisata' => $request->harga_wisata,
            'keterangan_destinasi' => $request->harga_wisata
        ];

        $this->Wisatamodel->addData($data);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);


        return redirect()->route('wisata')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_code, Request $request){
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
                'id_code' => $request->id_code,
                'gambar_wisata' => $fileName,
                'nama_wisata' => $request->nama_wisata,
                'alamat_wisata' => $request->alamat_wisata,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'harga_wisata' => $request->harga_wisata,
                'keterangan_destinasi' => $request->harga_wisata,
            ];

            $this->Wisatamodel->editData($id_code, $data);
        }else{
            $data = [
                'id_code' => $request->id_code,
                'gambar_wisata' => $fileName,
                'nama_wisata' => $request->nama_wisata,
                'alamat_wisata' => $request->alamat_wisata,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'harga_wisata' => $request->harga_wisata,
                'keterangan_destinasi' => $request->harga_wisata,
            ];

            $this->Wisatamodel->editData($id_code, $data);
        }

        return response()->json([
            "message" => "Sukses ubah data".$id_code
        ]);    
        
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

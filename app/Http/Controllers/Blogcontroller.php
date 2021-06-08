<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisatamodel;
use App\Fiturmodel;

class Blogcontroller extends Controller
{
	public function __construct(){
		$this->Wisatamodel = new Wisatamodel();
		$this->Fiturmodel = new Fiturmodel();
	}

    public function indexs(){
    	$data = [
    		'wisata' => $this->Wisatamodel->allDataw(),
    		'blog' => $this->Fiturmodel->allDatas(),
    	];
    	
    	return view('blog.v_blog', $data);
    }

    public function index(){
    	$data = [
    		'blog' => $this->Fiturmodel->allData(),
    	];
    	
    	return view('fitur.v_fitur', $data);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $blog = $this->Fiturmodel->Search($cari);
        
        return view('fitur.v_fitur', ['blog' => $blog]);
    }

    public function searchk(Request $request){
        $cari = $request->cari;
        $wisata = $this->Wisatamodel->Search($cari);
        
        return view('blog.v_blog', ['wisata' => $wisata]);
    }

    public function detail($id){
        if (!$this->Fiturmodel->detailData($id)) {
            abort(404);
        }
        $data = [
            'blog' => $this->Fiturmodel->detailData($id),
        ];
        return view('fitur.v_detailfitur', $data);
    }

    public function add(){
        return view('fitur.v_addfitur');
    }

    public function insert(){
        Request()->validate([
            'gambar_fitur' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            'judul' => 'required',
            'keterangan' => 'required'
        ], [
            'gambar_fitur.required' => 'Wajib diisi !!',
            'judul.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!'
        ]);

        $file = Request()->gambar_fitur;
        $fileName = Request()->judul.'.'.$file->extension();
        $file->move(public_path('g_blog'), $fileName);

        $data = [
            'gambar_fitur' => $fileName,
            'judul' => Request()->judul,
            'keterangan' => Request()->keterangan
        ];

        $this->Fiturmodel->addData($data);

        return redirect()->route('fitur')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id){
    	if (!$this->Fiturmodel->detailData($id)) {
    		abort(404);
    	}
    	$data = [
    		'edit' => $this->Fiturmodel->detailData($id),
    	];
    	return view('fitur.v_editfitur', $data);
    }

    public function update($id){
        Request()->validate([
            'gambar_fitur' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            'judul' => 'required',
            'keterangan' => 'required'           
        ], [
            'gambar_fitur.required' => 'Wajib diisi !!',
            'judul.required' => 'Wajib diisi !!',
            'keterangan.required' => 'Wajib diisi !!'           
        ]);
        if (Request()->gambar_fitur <> "") {
            $file = Request()->gambar_fitur;
            $fileName = Request()->judul.'.'.$file->extension();
            $file->move(public_path('g_blog'), $fileName);

            $data = [
                'gambar_fitur' => $fileName,
                'judul' => Request()->judul,
                'keterangan' => Request()->keterangan
            ];

            $this->Wisatamodel->editData($id, $data);
        }else{
            $data = [
                'gambar_fitur' => $fileName,
                'judul' => Request()->judul,
                'keterangan' => Request()->keterangan
            ];

            $this->Fiturmodel->editData($id, $data);
        }

        return redirect()->route('fitur')->with('pesan','Data Berhasil Di Ubah !!!');
    }

    public function delete($id){
        $fitur = $this->Fiturmodel->detailData($id);
        if ($fitur->gambar_fitur <> "") {
            unlink(public_path('g_blog').'/'.$fitur->gambar_fitur);
        }
        $this->Fiturmodel->deleteData($id);
        return redirect()->route('fitur')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}

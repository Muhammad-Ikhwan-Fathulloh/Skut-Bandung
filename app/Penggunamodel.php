<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penggunamodel extends Model
{
    public function allData(){
    	return DB::table('pengguna')->paginate(5);
    }

    public function allDatas(){
        return DB::table('pengguna')->get();
    }

    public function allDatak($id_pengguna){
        return DB::table('pengguna')->where('id_pengguna', $id_pengguna)->get();
    }

    public function Search($cari){
        return DB::table('pengguna')
        ->where('fullname','LIKE',"%".$cari."%")
        ->paginate();
    }

    public function detailData($id_pengguna){
    	return DB::table('pengguna')->where('id_pengguna', $id_pengguna)->first();
    }

    public function addData($data){
    	DB::table('pengguna')->insert($data);
    }

    public function editData($id_pengguna, $data){
    	DB::table('pengguna')
    	->where('id_pengguna', $id_pengguna)
    	->update($data);
    }

    public function deleteData($id_pengguna){
    	DB::table('pengguna')
    	->where('id_pengguna', $id_pengguna)
    	->delete();
    }

}

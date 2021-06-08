<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wisatamodel extends Model
{
    public function allData(){
    	return DB::table('wisata')->paginate(5);
    }

    public function allDataw(){
        return DB::table('wisata')->paginate(3);
    }

    public function allDatas(){
        return DB::table('wisata')->get();
    }

    public function Search($cari){
        return DB::table('wisata')
        ->where('nama_wisata','LIKE',"%".$cari."%")
        ->paginate();
    }

    public function detailData($id_code){
    	return DB::table('wisata')->where('id_code', $id_code)->first();
    }

    public function addData($data){
    	DB::table('wisata')->insert($data);
    }

    public function editData($id_code, $data){
    	DB::table('wisata')
    	->where('id_code', $id_code)
    	->update($data);
    }

    public function deleteData($id_code){
    	DB::table('wisata')
    	->where('id_code', $id_code)
    	->delete();
    }

}

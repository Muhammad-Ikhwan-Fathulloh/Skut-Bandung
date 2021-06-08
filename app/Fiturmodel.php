<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fiturmodel extends Model
{
    public function allData(){
    	return DB::table('fitur')->paginate(5);
    }

    public function allDatas(){
        return DB::table('fitur')->get();
    }

    public function Search($cari){
        return DB::table('fitur')
        ->where('judul','LIKE',"%".$cari."%")
        ->paginate();
    }

    public function detailData($id){
    	return DB::table('fitur')->where('id', $id)->first();
    }

    public function addData($data){
    	DB::table('fitur')->insert($data);
    }

    public function editData($id, $data){
    	DB::table('fitur')
    	->where('id', $id)
    	->update($data);
    }

    public function deleteData($id){
    	DB::table('pengelola')
    	->where('id', $id)
    	->delete();
    }

}

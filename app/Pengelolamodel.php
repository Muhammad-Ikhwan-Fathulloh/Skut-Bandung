<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengelolamodel extends Model
{
    public function allData(){
    	return DB::table('pengelola')->paginate(5);
    }

    public function allDatas(){
        return DB::table('pengelola')->get();
    }

    public function Search($cari){
        return DB::table('pengelola')
        ->where('fullname','LIKE',"%".$cari."%")
        ->paginate();
    }

    public function detailData($id){
    	return DB::table('pengelola')->where('id', $id)->first();
    }

    public function loginData($email){
        return DB::table('pengelola')->where('email', $email)->first();
    }

    public function login($email){
        return DB::table('pengelola')->where('email', $email)->first();
    }

    public function addData($data){
    	DB::table('pengelola')->insert($data);
    }

    public function editData($id, $data){
    	DB::table('pengelola')
    	->where('id', $id)
    	->update($data);
    }

    public function deleteData($id){
    	DB::table('pengelola')
    	->where('id', $id)
    	->delete();
    }

}

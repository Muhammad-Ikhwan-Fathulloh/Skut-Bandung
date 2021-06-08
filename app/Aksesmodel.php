<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aksesmodel extends Model
{
    public function allData($id){
    	return DB::table('akses')->where('id',$id)->get();
    }

    public function addData($data){
    	DB::table('akses')->insert($data);
    }

    public function editData($id, $data){
    	DB::table('akses')
    	->where('id', $id)
    	->update($data);
    }

}

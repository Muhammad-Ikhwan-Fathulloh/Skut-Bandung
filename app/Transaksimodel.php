<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksimodel extends Model
{
    public function allData(){
    	return DB::table('transaksi')
            ->leftJoin('pengguna','pengguna.id_pengguna','=','transaksi.id_pengguna')
            ->leftJoin('wisata','wisata.id_code','=','transaksi.id_code')
            ->paginate(5);
    }

    public function allDatas(){
        return DB::table('transaksi')->get();
    }

    public function allDatak($id_transaksi){
        return DB::table('transaksi')->where('id_transaksi', $id_transaksi)->get();
    }

    public function Search($cari){
        return DB::table('transaksi')
        ->where('id_transaksi','LIKE',"%".$cari."%")
        ->paginate();
    }

    public function detailData($id_transaksi){
    	return DB::table('transaksi')
            ->leftJoin('pengguna','pengguna.id_pengguna','=','transaksi.id_pengguna')
            ->leftJoin('wisata','wisata.id_code','=','transaksi.id_code')
            ->where('id_transaksi', $id_transaksi)->first();
    }

    public function addData($data){
    	DB::table('transaksi')
            ->leftJoin('pengguna','pengguna.id_pengguna','=','transaksi.id_pengguna')
            ->leftJoin('wisata','wisata.id_code','=','transaksi.id_code')
            ->insert($data);
    }

    public function editData($id_transaksi, $data){
    	DB::table('transaksi')
    	->where('id_transaksi', $id_transaksi)
    	->update($data);
    }

    public function editDatas($id_transaksi, $data){
        DB::table('transaksi')
        ->leftJoin('pengguna','pengguna.id_pengguna','=','transaksi.id_pengguna')
        ->leftJoin('wisata','wisata.id_code','=','transaksi.id_code')
        ->where('id_transaksi', $id_transaksi)
        ->update($data);
    }

    public function deleteData($id_transaksi){
    	DB::table('transaksi')
    	->where('id_transaksi', $id_transaksi)
    	->delete();
    }

}

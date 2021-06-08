<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboardmodel extends Model
{
    public function allData(){
    	return [
    		[
    			'npm' => '19552011024',
    			'nama' => 'Muhammad Ikhwan Fathulloh',
    			'jurusan' => 'Teknik Informatika'
    		],
    		[
    			'npm' => '19552011024',
    			'nama' => 'Muhammad Ikhwan Fathulloh',
    			'jurusan' => 'Teknik Industri'
    		]
    	];
    }
}

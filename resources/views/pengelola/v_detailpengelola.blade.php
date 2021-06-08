@extends('layout.v_template')

@section('title','Lihat Pengelola')
@section('halaman','Lihat Pengelola')

@section('content')
	<table class="table">
	<tr>
		<th><width="30px">Nama Lengkap</th>
		<th>:</th>
		<th>{{$detail->fullname}}</th>
	</tr>
	<tr>
		<th><width="30px">Nama Panggilan</th>
		<th>:</th>
		<th>{{$detail->username}}</th>
	</tr>
	<tr>
		<th><width="30px">Email</th>
		<th>:</th>
		<th>{{$detail->email}}</th>
	</tr>
	<tr>
		<th><width="30px">No HP</th>
		<th>:</th>
		<th>{{$detail->nohp}}</th>
	</tr>
	<tr>
		<th><width="30px">Alamat</th>
		<th>:</th>
		<th>{{$detail->alamat}}</th>
	</tr>
	<tr>
		<th><width="30px">Password</th>
		<th>:</th>
		<th>{{$detail->password}}</th>
	</tr>
	<tr>
		<th><width="30px">Tanggal</th>
		<th>:</th>
		<th>{{$detail->tanggal}}</th>
	</tr>
@endsection
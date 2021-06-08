@extends('layout.v_template')

@section('title','Pengguna')
@section('halaman','Pengguna')

@section('content')
	<table class="table">
	<tr>
		<th><width="30px">ID</th>
		<th>:</th>
		<th>{{$detail->id_pengguna}}</th>
	</tr>
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
		<th><width="30px">Saldo</th>
		<th>:</th>
		<th>Rp.{{$detail->saldo}},-</th>
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
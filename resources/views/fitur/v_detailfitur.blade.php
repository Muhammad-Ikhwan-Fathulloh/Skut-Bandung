@extends('layout.v_template')

@section('title','Lihat Fitur')
@section('halaman','Lihat Fitur')

@section('content')
	<table class="table">
	<tr>
		<th><width="30px">Gambar Fitur</th>
		<th>:</th>
		<th>
			<div class="visible-print text-center">
				<img src="{{ url('g_blog/'.$detail->gambar_fitur) }}" width="200px">
				<p>{{$detail->gambar_fitur}}</p>
			</div>
		</th>
	</tr>
	<tr>
		<th><width="30px">Judul Fitur</th>
		<th>:</th>
		<th>{{$detail->judul}}</th>
	</tr>
	<tr>
		<th><width="30px">Keterangan Fitur</th>
		<th>:</th>
		<th>{{$detail->keterangan}}</th>
	</tr>
	<tr>
		<th><width="30px">Tanggal</th>
		<th>:</th>
		<th>{{$detail->tanggal}}</th>
	</tr>
@endsection
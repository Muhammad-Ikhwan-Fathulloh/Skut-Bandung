@extends('layout.v_template')

@section('title','Lihat Destinasi')
@section('halaman','Lihat Destinasi')

@section('content')
	<table class="table">
	<tr>
		<th><width="30px">ID Kode</th>
		<th>:</th>
		<th>{{$detail->id_code}}</th>
	</tr>
	<tr>
		<th><width="30px">QR Code</th>
		<th>:</th>
		<td>
			<div class="visible-print text-center">
			    {!! QrCode::size(150)->generate($detail->id_code); !!}
			    <p>Destinasi {{$detail->nama_wisata}}</p>
			</div>
		</td>
	</tr>
	<tr>
		<th><width="30px">Gambar Destinasi</th>
		<th>:</th>
		<th>
			<div class="visible-print text-center">
				<img src="{{ url('g_destinasi/'.$detail->gambar_wisata) }}" width="200px">
				<p>{{$detail->gambar_wisata}}</p>
			</div>
		</th>
	</tr>
	<tr>
		<th><width="30px">Nama Destinasi</th>
		<th>:</th>
		<th>{{$detail->nama_wisata}}</th>
	</tr>
	<tr>
		<th><width="30px">Alamat Destinasi</th>
		<th>:</th>
		<th>{{$detail->alamat_wisata}}</th>
	</tr>
	<tr>
		<th><width="30px">Latitude Destinasi</th>
		<th>:</th>
		<th>{{$detail->latitude}}</th>
	</tr>
	<tr>
		<th><width="30px">Longitude Destinasi</th>
		<th>:</th>
		<th>{{$detail->longitude}}</th>
	</tr>
	<tr>
		<th><width="30px">Harga Destinasi</th>
		<th>:</th>
		<th>Rp.{{$detail->harga_wisata}},-</th>
	</tr>
	<tr>
		<th><width="30px">Keterangan Destinasi</th>
		<th>:</th>
		<th>Rp.{{$detail->keterangan_destinasi}},-</th>
	</tr>
	<tr>
		<th><width="30px">Tanggal</th>
		<th>:</th>
		<th>{{$detail->tanggal}}</th>
	</tr>
@endsection
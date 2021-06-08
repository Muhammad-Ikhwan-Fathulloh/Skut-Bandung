@extends('layout.v_template')

@section('title','Lihat Transaksi')
@section('halaman','Lihat Transaksi')

@section('content')
	<table class="table">
	<tr>
		<th><width="30px">ID Transaksi</th>
		<th>:</th>
		<th>{{$detail->id_transaksi}}</th>
	</tr>

	<!-- Pengguna -->
	<tr>
		<th><width="30px"><h4><i class="fas fa-fw fa-user"></i> Data Pengguna</h4></th>
		<th><h4>:</h4></th>
	</tr>
	<tr>
		<th><width="30px">ID Pengguna</th>
		<th>:</th>
		<th>{{$detail->id_pengguna}}</th>
	</tr>

	<tr>
		<th><width="30px">Nama Lengkap</th>
		<th>:</th>
		<th>{{$detail->fullname}}</th>
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

	<!-- Destinasi -->
	<tr>
		<th><width="30px"><h4><i class="fas fa-fw fa-list"></i> Data Destinasi</h4></th>
		<th><h4>:</h4></th>
	</tr>
	<tr>
		<th><width="30px">ID Destinasi</th>
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
		<th><width="30px">Harga Destinasi</th>
		<th>:</th>
		<th>Rp.{{$detail->harga_wisata}},-</th>
	</tr>

	<tr>
		<th><width="30px">Status</th>
		<th>:</th>
		<th>{{$detail->status}}</th>
	</tr>
	
	<tr>
		<th><width="30px">Tanggal Transaksi</th>
		<th>:</th>
		<th>{{$detail->tanggal_transaksi}}</th>
	</tr>
@endsection
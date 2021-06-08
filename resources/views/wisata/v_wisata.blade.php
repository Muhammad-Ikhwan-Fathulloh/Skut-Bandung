@extends('layout.v_template')

@section('title','Destinasi')
@section('halaman','Destinasi')

@section('content')
	<div class="card border-primary mb-3">
	  <div class="card-body">
	  	<a href="/wisata/add" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus-circle"></i> Tambah Data</a>
	<br>
	  	<br>
	  	<form class="d-flex" action="/wisata/search" method="GET">
	      <input class="form-control me-2" type="text" name="cari" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
	      <button class="btn btn-outline-primary" type="submit" value="cari"><i class="fas fa-fw fa-search"></i></button>
	    </form>
	<br>

	@if(session('pesan'))
		<div class="alert alert-success" role="alert">
	{{session('pesan')}}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	@endif
	  	<div class="table-responsive">
	<table class="table">
		<thead class="table-light">
			<tr>
				<th>No</th>
				<th>ID Destinasi</th>
				<th>QR Code</th>
				<th>Gambar Destinasi</th>
				<th>Nama Destinasi</th>
				<th>Alamat Destinasi</th>
				<th>Latitude Destinasi</th>
				<th>Longitude Destinasi</th>
				<th>Harga Destinasi</th>
				<th>Keterangan</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($wisata as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_code }}</td>
					<td>
						<div class="visible-print text-center">
						    {!! QrCode::size(100)->generate($datas->id_code); !!}
						    <!-- <p>Destinasi {{$datas->nama_wisata}}</p> -->
						</div>
					</td>
					<td><img src="{{ url('g_destinasi/'.$datas->gambar_wisata) }}" width="100px"></td>
					<td>{{ $datas->nama_wisata }}</td>
					<td>{{ $datas->alamat_wisata }}</td>
					<td>{{ $datas->latitude }}</td>
					<td>{{ $datas->longitude }}</td>
					<td>Rp.{{ $datas->harga_wisata }},-</td>
					<td>{{ $datas->keterangan_destinasi }}</td>
					<td>{{ $datas->tanggal }}</td>
					<td>
						<a href="/wisata/detail/{{$datas->id_code}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
						<br>
						<br>
						<a href="/wisata/edit/{{$datas->id_code}}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-pen"></i> Ubah</a>
						<br>
						<br>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$datas->id_code}}"><i class="fas fa-fw fa-trash"></i> Hapus</button>
						<!-- <a href="" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a> -->
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>

	<!-- Modal -->
@foreach($wisata as $datas)
<div class="modal modal-danger fade" id="delete{{$datas->id_code}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $datas->nama_wisata }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="/wisata/delete/{{$datas->id_code}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
@endforeach

	</div>
	<br>
	{{ $wisata->links() }}
	</div>
	</div>
@endsection
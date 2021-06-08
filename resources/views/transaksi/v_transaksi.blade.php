@extends('layout.v_template')

@section('title','Transaksi')
@section('halaman','Riwayat Transaksi')

@section('content')
	<div class="card border-primary mb-3">
	  <div class="card-body">
	  	<a href="/transaksi/add" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus-circle"></i> Tambah Data</a>
	<br>
	  	<br>
	  	<form class="d-flex" action="/transaksi/search" method="GET">
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
				<th>ID Transaksi</th>
				<th>Nama Lengkap</th>
				<th>Email</th>
				<th>No HP</th>
				<th>Saldo</th>
				<th>Nama Destinasi</th>
				<th>Alamat Destinasi</th>
				<th>Harga Destinasi</th>
				<th>Status</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($transaksi as $datas)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $datas->id_transaksi }}</td>
					<td>{{ $datas->fullname }}</td>
					<td>{{ $datas->email }}</td>
					<td>{{ $datas->nohp }}</td>
					<td>Rp.{{ $datas->saldo }},-</td>
					<td>{{ $datas->nama_wisata }}</td>
					<td>{{ $datas->alamat_wisata }}</td>
					<td>Rp.{{ $datas->harga_wisata }},-</td>
					<td>{{ $datas->status }}</td>
					<td>{{ $datas->tanggal_transaksi }}</td>
					<td>
						<a href="/transaksi/detail/{{$datas->id_transaksi}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i> Lihat</a>
						<br>
						<br>
						<!-- <a href="/transaksi/edit/{{$datas->id_transaksi}}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-pen"></i> Ubah</a>
						<br>
						<br> -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$datas->id_transaksi}}"><i class="fas fa-fw fa-trash"></i> Batal</button>
						<!-- <a href="" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a> -->
					</td>
				</tr>
			@endforeach


		</tbody>
	</table>

	<!-- Modal -->
@foreach($transaksi as $datas)
<div class="modal modal-danger fade" id="delete{{$datas->id_transaksi}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $datas->id_transaksi }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="/transaksi/delete/{{$datas->id_transaksi}}" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
@endforeach

	</div>
	<br>
	{{ $transaksi->links() }}
	</div>
	</div>
@endsection
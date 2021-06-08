@extends('layout.v_template')

@section('title','Tambah Destinasi')
@section('halaman','Tambah Destinasi')

@section('content')
	<form action="/wisata/insert" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>ID Kode</label>
						<input type="text" name="id_code" class="form-control" value="{{old('id_code')}}">
						<div class="text-danger">
						    @error('id_code') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Gambar Destinasi</label>
						<input type="file" name="gambar_wisata" class="form-control" value="{{old('gambar_wisata')}}">
						<div class="text-danger">
						    @error('gambar_wisata') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Nama Destinasi</label>
						<input type="text" name="nama_wisata" class="form-control" value="{{old('nama_wisata')}}">
						<div class="text-danger">
						    @error('nama_wisata') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Alamat Destinasi</label>
						<input type="text" name="alamat_wisata" class="form-control" value="{{old('alamat_wisata')}}">
						<div class="text-danger">
						    @error('alamat_wisata') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Latitude Destinasi</label>
						<input type="text" name="latitude" class="form-control" value="{{old('latitude')}}">
						<div class="text-danger">
						    @error('latitude') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Longitude Destinasi</label>
						<input type="text" name="longitude" class="form-control" value="{{old('longitude')}}">
						<div class="text-danger">
						    @error('longitude') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Harga Destinasi</label>
						<input type="text" name="harga_wisata" class="form-control" value="{{old('harga_wisata')}}">
						<div class="text-danger">
						    @error('harga_wisata') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Keterangan Destinasi</label>
						<input type="text" name="keterangan_destinasi" class="form-control" value="{{old('keterangan_destinasi')}}">
						<div class="text-danger">
						    @error('keterangan_destinasi') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<button class="btn btn-primary btn-sm">Simpan</button>
					</div>

				</div>
			</div>
		</div>
	</form>
@endsection
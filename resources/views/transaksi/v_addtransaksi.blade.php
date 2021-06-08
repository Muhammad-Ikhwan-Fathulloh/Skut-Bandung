@extends('layout.v_template')

@section('title','Tambah Destinasi')
@section('halaman','Tambah Destinasi')

@section('content')
	<form action="/transaksi/insert" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>ID Transaksi</label>
						<input type="text" name="id_transaksi" class="form-control" value="{{old('id_transaksi')}}">
						<div class="text-danger">
						    @error('id_transaksi') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>ID Pengguna</label>
						<select name="id_pengguna" class="form-control">
						  <option selected>-- Pilih --</option>
						  @foreach ($pengguna as $datas)
						  	<option value="{{ $datas->id_pengguna }}">{{ $datas->id_pengguna }}</option>
						  @endforeach
						</select>
						<div class="text-danger">
						    @error('id_pengguna') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>ID Destinasi</label>
						<select name="id_code" class="form-control">
						  <option selected>-- Pilih --</option>
						  @foreach ($wisata as $datas)
						  	<option value="{{ $datas->id_code }}">{{ $datas->id_code }}</option>
						  @endforeach
						</select>
						<div class="text-danger">
						    @error('id_code') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Status</label>
						<input type="text" name="status" class="form-control" value="0" readonly="">
						<div class="text-danger">
						    @error('status') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<!-- <div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
						  <option selected>-- Status --</option>
						  <option value="1">1</option>
						  <option value="0">0</option>
						</select>
						<div class="text-danger">
						    @error('status') 
						    	{{$message}}
						    @enderror
						</div>
					</div>
 -->
					<div class="form-group">
						<button class="btn btn-primary btn-sm">Simpan</button>
					</div>

				</div>
			</div>
		</div>
	</form>
@endsection
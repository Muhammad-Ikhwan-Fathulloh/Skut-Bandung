@extends('layout.v_template')

@section('title','Tambah Fitur')
@section('halaman','Tambah Fitur')

@section('content')
	<form action="/fitur/insert" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
	
					<div class="form-group">
						<label>Gambar Fitur</label>
						<input type="file" name="gambar_fitur" class="form-control" value="{{old('gambar_fitur')}}">
						<div class="text-danger">
						    @error('gambar_fitur') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Judul Fitur</label>
						<input type="text" name="judul" class="form-control" value="{{old('judul')}}">
						<div class="text-danger">
						    @error('judul') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Keterangan Fitur</label>
						<input type="text" name="keterangan" class="form-control" value="{{old('keterangan')}}">
						<div class="text-danger">
						    @error('keterangan') 
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
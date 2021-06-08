@extends('layout.v_template')

@section('title','Tambah Pengguna')
@section('halaman','Tambah Pengguna')

@section('content')
	<form action="/pengguna/insert" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>ID</label>
						<input type="text" name="id_pengguna" class="form-control" value="{{old('id_pengguna')}}">
						<div class="text-danger">
						    @error('id_pengguna') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="fullname" class="form-control" value="{{old('fullname')}}">
						<div class="text-danger">
						    @error('fullname') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Nama Panggilan</label>
						<input type="text" name="username" class="form-control" value="{{old('username')}}">
						<div class="text-danger">
						    @error('username') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="{{old('email')}}">
						<div class="text-danger">
						    @error('email') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>No HP</label>
						<input type="text" name="nohp" class="form-control" value="{{old('nohp')}}">
						<div class="text-danger">
						    @error('nohp') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="{{old('alamat')}}">
						<div class="text-danger">
						    @error('alamat') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Saldo</label>
						<input type="text" name="saldo" class="form-control" value="{{old('saldo')}}">
						<div class="text-danger">
						    @error('saldo') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" value="{{old('password')}}">
						<div class="text-danger">
						    @error('password') 
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
@extends('layout.v_template')

@section('title','Ubah Pengelola')
@section('halaman','Ubah Pengelola')

@section('content')
	<form action="/pengelola/update/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="fullname" class="form-control" value="{{$edit->fullname}}">
						<div class="text-danger">
						    @error('fullname') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Nama Panggilan</label>
						<input type="text" name="username" class="form-control" value="{{$edit->username}}">
						<div class="text-danger">
						    @error('username') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="{{$edit->email}}">
						<div class="text-danger">
						    @error('email') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>No HP</label>
						<input type="text" name="nohp" class="form-control" value="{{$edit->nohp}}">
						<div class="text-danger">
						    @error('nohp') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" value="{{$edit->alamat}}">
						<div class="text-danger">
						    @error('alamat') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" value="{{$edit->password}}">
						<div class="text-danger">
						    @error('password') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<button class="btn btn-primary btn-sm">Ubah</button>
					</div>

				</div>
			</div>
		</div>
	</form>
@endsection
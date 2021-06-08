@extends('layout.v_template')

@section('title','Ubah Fitur')
@section('halaman','Ubah Fitur')

@section('content')
	<form action="/fitur/update/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="content">
			<div class="row">
				<div class="col-6">
	
					<div class="col-sm 12">
						<div class="col-sm-4">
							<div class="visible-print text-center">
								<img src="{{ url('g_blog/'.$edit->gambar_fitur) }}" width="200px">
								<p>{{$edit->gambar_fitur}}</p>
							</div>						
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label>Gambar Destinasi</label>
								<input type="file" name="gambar_fitur" class="form-control" value="{{$edit->gambar_fitur}}">
								<div class="text-danger">
								    @error('gambar_fitur') 
								    	{{$message}}
								    @enderror
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Judul Fitur</label>
						<input type="text" name="judul" class="form-control" value="{{$edit->judul}}">
						<div class="text-danger">
						    @error('judul') 
						    	{{$message}}
						    @enderror
						</div>
					</div>

					<div class="form-group">
						<label>Keterangan Fitur</label>
						<input type="text" name="keterangan" class="form-control" value="{{$edit->keterangan}}">
						<div class="text-danger">
						    @error('keterangan') 
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
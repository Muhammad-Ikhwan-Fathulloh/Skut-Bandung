@extends('layout_blog.v_templateblog')

@section('title','Profile')
@section('halaman','Dashboard')

@section('content1')
<br>
<h4 class="text-white"><i class="fas fa-fw fa-tasks"></i> Fitur Skut Bandung</h4>
<hr>
<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($blog as $datas)
<div class="col">
	<div class="card bg-b">
      <img src="{{ url('g_blog/'.$datas->gambar_fitur) }}" class="card-img-top rounded-circle" width="200px">
      <div class="card-body">
        <h5 class="card-title text-white">{{ $datas->judul }}</h5>
        <hr class="text-white">
        <div class="text-white">
       	<tr>
	      <th>{{ $datas->keterangan }}</th>
	    </tr>
        </div>
        
      </div>
      <!-- <div class="card-footer">
        <small class="text-muted text-white">{{ $datas->tanggal }}</small>
      </div> -->
    </div>
</div>
@endforeach
</div>
@endsection
@section('content2')

<h4 class="text-white"><i class="fas fa-fw fa-map"></i> Destinasi Wisata Bandung</h4>
	  	
<hr>
<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($wisata as $datas)
  <div class="col">
    <div class="card">
      <img src="{{ url('g_destinasi/'.$datas->gambar_wisata) }}" class="card-img-top" width="200px">
      <div class="card-body">
        <h5 class="card-title">{{ $datas->nama_wisata }}</h5>
        
         <tr>
			<th><width="30px">Keterangan</th>
			<th>:</th>
			<th>{{ $datas->keterangan_destinasi }}</th>
		</tr>
		<br>
        <tr>
			<th><width="30px">Alamat</th>
			<th>:</th>
			<th>{{ $datas->alamat_wisata }}</th>
		</tr>
		<br>
		<tr>
			<th><width="30px">Harga</th>
			<th>:</th>
			<th>Rp.{{ $datas->harga_wisata }},-</th>
		</tr>
		<br>
		<br>
		<div class="visible-print text-center">
			{!! QrCode::size(200)->generate($datas->id_code); !!}
			<p>Scan Destinasi</p>
		</div>
      </div>
      <div class="card-footer">
        <small class="text-muted">{{ $datas->tanggal }}</small>
      </div>
    </div>
  </div> 
@endforeach
</div>
<br>
<br>
{{ $wisata->links() }}
@endsection
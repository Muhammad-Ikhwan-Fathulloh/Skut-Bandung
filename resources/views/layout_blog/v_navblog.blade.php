<div class="card">
      <img src="{{ url('g_blog/'.$datas->gambar_fitur) }}" class="card-img-top" width="200px">
      <div class="card-body">
        <h5 class="card-title">{{ $datas->judul }}</h5>
        <tr>
      <th><width="30px">Keterangan</th>
      <th>:</th>
      <th>{{ $datas->keterangan }}</th>
    </tr>
      </div>
      <div class="card-footer">
        <small class="text-muted">{{ $datas->tanggal }}</small>
      </div>
    </div>
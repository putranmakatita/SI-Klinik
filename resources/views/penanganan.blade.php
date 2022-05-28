@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('penanganan_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('penanganan_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Penanganan</h1>
</div>

<div class="table-responsive">
  <a href="/penanganan/create" class="btn btn-success">+Add Penanganan</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Pasien</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Tindakan</th>
          <th scope="col">Obat</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($penanganans as $penanganan)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$penanganan->pasien->user->nama}}</td>
          <td>{{$penanganan->pasien->user->tanggal_lahir}}</td>
          <td>{{$penanganan->tindakan->tindakan}}</td>
          <td>{{$penanganan->obat->nama_obat}}</td>
          <td>{{$penanganan->keterangan}}</td>
          <td>
              <a href="/penanganan/{{$penanganan->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/penanganan/{{$penanganan->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin menghapus User ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

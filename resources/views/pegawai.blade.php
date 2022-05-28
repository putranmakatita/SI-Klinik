@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('pegawai_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('pegawai_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Pegawai</h1>
</div>

<div class="table-responsive">
  <a href="/pegawai/create" class="btn btn-success">+Add Pegawai</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Alamat</th>
          <th scope="col">No. Telepon</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pegawais as $pegawai)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$pegawai->user->nama}}</td>
          <td>{{$pegawai->alamat}}</td>
          <td>{{$pegawai->no_telp}}</td>
          <td>{{$pegawai->jabatan}}</td>
          <td>
              <a href="/pegawai/{{$pegawai->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/pegawai/{{$pegawai->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin menghapus Pegawai ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

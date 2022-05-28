@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('pasien_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('pasien_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Pasien</h1>
</div>

<div class="table-responsive">
  <a href="/pasien/create" class="btn btn-success">+Pendaftaran Pasien</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No. Rekmed</th>
          <th scope="col">Nama</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Usia</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pasiens as $pasien)
      <tr>
          <td>{{$pasien->no_rekmed}}</td>
          <td>{{$pasien->user->nama}}</td>
          <td>{{$pasien->user->tempat_lahir}}</td>
          <td>{{$pasien->user->tanggal_lahir}}</td>
          <td>{{$pasien->jenis_kelamin}}</td>
          <td>{{$pasien->usia}}</td>
          <td>
              <a href="/pasien/{{$pasien->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/pasien/{{$pasien->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin menghapus pasien ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

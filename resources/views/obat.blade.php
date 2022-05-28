@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('obat_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('obat_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Obat</h1>
</div>

<div class="table-responsive">
  <a href="/obat/create" class="btn btn-success">+Add Obat</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Obat</th>
          <th scope="col">Jenis</th>
          <th scope="col">Usia</th>
          <th scope="col">Tgl. Kadaluarsa</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($obats as $obat)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$obat->nama_obat}}</td>
          <td>{{$obat->jenis}}</td>
          <td>{{$obat->usia}}</td>
          <td>{{$obat->tanggal_kadaluarsa}}</td>
          <td>
              <a href="/obat/{{$obat->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/obat/{{$obat->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin menghapus obat ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

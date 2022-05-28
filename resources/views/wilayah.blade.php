@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('wilayah_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('wilayah_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Wilayah</h1>
</div>

<div class="table-responsive">
  <a href="/wilayah/create" class="btn btn-success">+Add Wilayah</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Kota/Kabupaten</th>
          <th scope="col">Provinsi</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($wilayahs as $wilayah)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$wilayah->kota_kab}}</td>
          <td>{{$wilayah->provinsi}}</td>
          <td>
              <a href="/wilayah/{{$wilayah->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/wilayah/{{$wilayah->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apa anda yakin menghapus data wilayah ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

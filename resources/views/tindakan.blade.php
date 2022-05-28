@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('tindakan_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('tindakan_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master Tindakan</h1>
</div>

<div class="table-responsive">
  <a href="/tindakan/create" class="btn btn-success">+Add Tindakan</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Tindakan</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tindakans as $tindakan)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$tindakan->tindakan}}</td>
          <td>
              <a href="/tindakan/{{$tindakan->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/tindakan/{{$tindakan->id}}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin mau menhapus tindakan ini?')"><i class="bi bi-trash"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

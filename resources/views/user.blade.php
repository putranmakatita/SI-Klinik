@extends('dashboard_layouts.main')
@section('container')

@if(session()->has('user_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('user_success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Master User</h1>
</div>

<div class="table-responsive">
  <a href="/user/create" class="btn btn-success">+Add User</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$user->nama}}</td>
          <td>{{$user->tempat_lahir}}</td>
          <td>{{$user->tanggal_lahir}}</td>
          <td>
              <a href="/user/{{$user->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="/user/{{$user->id}}" method="post">
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

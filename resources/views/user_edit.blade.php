@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit User</h1>
</div>
<a href="/user" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/user/{{$user->id}}">
    @method('put')
    @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama' , $user->nama)}}" required autofocus>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir' , $user->tempat_lahir)}}" required autofocus>
        @error('tempat_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir' , $user->tanggal_lahir)}}" required autofocus>
        @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username' , $user->username)}}" required autofocus>
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">

            <label for="role" class="form-label">Role</label>
            <select id="role" class="form-select @error('role_id') is-invalid @enderror" name="role_id">

                @foreach($roles as $role)
                @if (old('role_id', $user->role_id) == $role->id)
                <option value="{{$role->id}}" selected>{{$role->role}}</option>
                @else
                <option value="{{$role->id}}">{{$role->role}}</option>
                @endif
                @endforeach
            </select>

        @error('role_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection

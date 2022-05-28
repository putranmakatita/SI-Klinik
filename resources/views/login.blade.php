@extends('layout.main')
@section('container')
@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
 {{session('loginError')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <main class="form-signin">
    <form action="/login" method="post" class="mt-4 d-flex flex-column justify-content-center align-items-center">
      @csrf

      <img src="/images/inovaMedika.png" alt="" width=250>
      <h1 class="h3 mb-3 fw-small text-success">Sistem Informasi Klinik</h1>
      <h1 class="h3 my-3 fw-normal text-success">Silahkan Login</h1>

      <div class="form-floating w-50">
        <input name="username" type="text" id="username" class="form-control @error('username') is-invalid @enderror"  placeholder="username" value="{{old('username')}}" autofocus required>
        <label for="username">Username</label>
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-floating w-50">
        <input name="password" type="password" class="form-control" placeholder="Password" id="password" required>
        <label for="password">Password</label>
      </div>


      <button class="w-50 btn btn-lg btn-success" type="submit">Log in</button>
    </form>
  </main>
@endsection

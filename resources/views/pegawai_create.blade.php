@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add Pegawai</h1>
</div>
<a href="/pegawai" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/pegawai">
        @csrf

        <div class="mb-3">

            <label for="nama" class="form-label">Nama Lengkap</label>
            <select id="nama" class="form-select @error('user_id') is-invalid @enderror" name="user_id">

                @foreach($users as $user)
                @if(old('user_id') == $user->id)
                <option value="{{$user->id}}" selected>{{$user->nama}}</option>
                @else
                <option value="{{$user->id}}">{{$user->nama}}</option>
                @endif
                @endforeach
            </select>

        @error('user_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" required autofocus>
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No.Telepon</label>
            <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required autofocus>
        @error('no_telp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required autofocus>
        @error('jabatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>



        <button type="submit" class="btn btn-primary">Tambahkan Pegawai</button>
    </form>
</div>

@endsection

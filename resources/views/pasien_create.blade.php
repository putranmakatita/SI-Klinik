@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pendaftaraan Pasien</h1>
</div>
<a href="/pasien" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/pasien">
        @csrf

        <div class="mb-3">

            <label for="nama" class="form-label">Nama</label>
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

            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="usia" class="form-label">Usia</label>
            <input type="number" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{ old('usia') }}" required autofocus>
        @error('usia')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="no_rekmed" class="form-label">No. Rekam Medis</label>
            <input type="number" class="form-control @error('no_rekmed') is-invalid @enderror" id="no_rekmed" name="no_rekmed" value="{{ old('no_rekmed') }}" required autofocus>
        @error('no_rekmed')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>



        <button type="submit" class="btn btn-primary">Tambahkan Pasien</button>
    </form>
</div>

@endsection

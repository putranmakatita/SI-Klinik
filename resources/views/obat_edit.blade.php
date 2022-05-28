@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Obat</h1>
</div>
<a href="/obat" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/obat/{{$obat->id}}">
    @method('put')
    @csrf
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required autofocus>
        @error('nama_obat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" value="{{ old('jenis', $obat->jenis) }}" required autofocus>
        @error('jenis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="usia" class="form-label">Usia</label>
            <input type="text" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{ old('usia', $obat->usia) }}" required autofocus>
        @error('usia')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
            <input type="date" class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}" required autofocus>
        @error('tanggal_kadaluarsa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <button type="submit" class="btn btn-primary">Update Obat</button>
    </form>
</div>

@endsection

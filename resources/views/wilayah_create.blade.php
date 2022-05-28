@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add Wilayah</h1>
</div>
<a href="/wilayah" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/wilayah">
    @csrf
        <div class="mb-3">
            <label for="kota_kab" class="form-label">Kota/Kabupaten</label>
            <input type="text" class="form-control @error('kota_kab') is-invalid @enderror" id="kota_kab" name="kota_kab" value="{{ old('kota_kab') }}" required autofocus>
        @error('kota_kab')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" value="{{ old('provinsi') }}" required autofocus>
        @error('provinsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <button type="submit" class="btn btn-primary">Tambahkan Wilayah</button>
    </form>
</div>

@endsection

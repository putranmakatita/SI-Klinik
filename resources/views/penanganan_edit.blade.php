@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Penanganan</h1>
</div>
<a href="/penanganan" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/penanganan/{{$penanganan->id}}">
        @method('put')
        @csrf

        <div class="mb-3">

            <label for="nama" class="form-label">Nama</label>
            <select id="nama" class="form-select @error('pasien_id') is-invalid @enderror" name="pasien_id">

                @foreach($pasiens as $pasien)
                @if(old('pasien_id', $penanganan->pasien_id) == $pasien->id)
                <option value="{{$pasien->id}}" selected>{{$pasien->user->nama}}</option>
                @else
                <option value="{{$pasien->id}}">{{$pasien->user->nama}}</option>
                @endif
                @endforeach
            </select>

        @error('pasien_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        </div>

        <div class="mb-3">

            <label for="tindakan" class="form-label">Tindakan</label>
            <select id="tindakan" class="form-select @error('tindakan_id') is-invalid @enderror" name="tindakan_id">

                @foreach($tindakans as $tindakan)
                @if(old('tindakan_id', $penanganan->tindakan_id) == $tindakan->id)
                <option value="{{$tindakan->id}}" selected>{{$tindakan->tindakan}}</option>
                @else
                <option value="{{$tindakan->id}}">{{$tindakan->tindakan}}</option>
                @endif
                @endforeach
            </select>

        @error('tindakan_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        </div>

        <div class="mb-3">

            <label for="obat" class="form-label">Obat</label>
            <select id="obat" class="form-select @error('obat_id') is-invalid @enderror" name="obat_id">

                @foreach($obats as $obat)
                @if(old('obat_id', $penanganan->obat_id) == $obat->id)
                <option value="{{$obat->id}}" selected>{{$obat->nama_obat}}</option>
                @else
                <option value="{{$obat->id}}">{{$obat->nama_obat}}</option>
                @endif
                @endforeach
            </select>

        @error('obat_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="textarea" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $penanganan->keterangan) }}">
        @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>



        <button type="submit" class="btn btn-primary">Update Penanganan</button>
    </form>
</div>

@endsection

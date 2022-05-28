@extends('dashboard_layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Tindakan</h1>
</div>
<a href="/tindakan" class="btn btn-warning">←Kembali</a>
<div class="col-lg-10">
    <form method="post" action="/tindakan/{{$tindakan->id}}">
    @method('put')
    @csrf
        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <input type="text" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" value="{{ old('tindakan', $tindakan->tindakan) }}" required autofocus>
        @error('tindakan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </div>

        <button type="submit" class="btn btn-primary">Update Tindakan</button>
    </form>
</div>

@endsection

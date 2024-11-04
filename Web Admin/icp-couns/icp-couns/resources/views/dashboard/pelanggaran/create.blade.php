@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Pelanggaran</h1>
</div>

<div class="col-lg-6">
<form method="post" action="/dashboard/pelanggaran">
    @csrf
  <div class="mb-1">
    <label for="pelanggaran" class="form-label">Jenis Pelanggaran</label>
    <input type="text" class="form-control form-control-sm @error('namapelanggaran') is-invalid @enderror" id="namapelanggaran" name="namapelanggaran" required autofocus value="{{ old('namapelanggaran') }}">
    @error('namapelanggaran')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>

  <div class="mb-1">
    <label for="poin" class="form-label">Poin Pelanggaran</label>
    <input type="text" class="form-control form-control-sm @error('poin') is-invalid @enderror" id="poin" name="poin" value="{{ old('poin') }}">
    @error('poin')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>


  <div class="mb-3">
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </div>

</div>

@endsection
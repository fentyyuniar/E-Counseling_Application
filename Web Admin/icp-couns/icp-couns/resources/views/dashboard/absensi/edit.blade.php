@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Absen</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/absensi/{{ $absensi->id }}">
      @method('put')
      @csrf
      <div class="mb-1">
        <label for="id_siswa" class="form-label">NIS</label>
        <input type="text" class="form-control form-control-sm @error('id_siswa') is-invalid @enderror" id="id_siswa" name="id_siswa" style="background-color: rgba(110, 109, 109, 0.133)" readonly value="{{ old('id_siswa', $absensi->id_siswa) }}">
        @error('id_siswa')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="namasiswa" class="form-label">NIS</label>
        <input type="text" class="form-control form-control-sm @error('namasiswa') is-invalid @enderror" id="namasiswa" name="namasiswa" style="background-color: rgba(110, 109, 109, 0.133)" readonly value="{{ old('namasiswa', $absensi->namasiswa) }}">
        @error('namasiswa')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="kelas" class="form-label">Kelas Siswa</label>
        <input type="text" class="form-control form-control-sm @error('kelas') is-invalid @enderror" id="kelas" name="kelas" style="background-color: rgba(110, 109, 109, 0.133)" readonly value="{{ old('kelas', $absensi->kelas) }}">
        @error('kelas')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="hadir" class="form-label">Jumlah Kehadiran</label>
        <input type="text" class="form-control form-control-sm @error('hadir') is-invalid @enderror" id="hadir" name="hadir" autofocus value="{{ old('hadir', $absensi->hadir) }}">
        @error('hadir')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="alfa" class="form-label">Jumlah Alpha</label>
        <input type="text" class="form-control form-control-sm @error('alfa') is-invalid @enderror" id="alfa" name="alfa"  value="{{ old('alfa', $absensi->alfa) }}">
        @error('alfa')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="izin" class="form-label">Jumlah Izin</label>
        <input type="text" class="form-control form-control-sm @error('izin') is-invalid @enderror" id="izin" name="izin"  value="{{ old('izin', $absensi->izin) }}">
        @error('izin')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="sakit" class="form-label">Jumlah Sakit</label>
        <input type="text" class="form-control form-control-sm @error('sakit') is-invalid @enderror" id="sakit" name="sakit" value="{{ old('sakit', $absensi->sakit) }}">
        @error('sakit')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </div>


      @endsection
@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Konsultasi</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/konsultasi/{{ $konsultasi->id }}">
      @method('put')
      @csrf
      <div class="mb-1">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" style="background-color: rgba(110, 109, 109, 0.133)" id="nama" name="nama" required readonly value="{{ old('nama', $konsultasi->nama) }}">
        @error('nama')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
    
      <div class="mb-1">
        <label for="kelas" class="form-label">Kelas Siswa</label>
        <input type="text" class="form-control form-control-sm @error('kelas') is-invalid @enderror" id="kelas" name="kelas" style="background-color: rgba(110, 109, 109, 0.133)" readonly value="{{ old('kelas', $konsultasi->kelas) }}">
        @error('kelas')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="nohp" class="form-label">Nomor Telepon Siswa</label>
        <input type="text" class="form-control form-control-sm @error('nohp') is-invalid @enderror" id="nohp" name="nohp" style="background-color: rgba(110, 109, 109, 0.133)" readonly value="{{ old('nohp', $konsultasi->nohp) }}">
        @error('nohp')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="mb-1">
        <label for="tanggal" class="form-label">Tanggal Konsultasi</label>
        <input type="date" class="form-control form-control-sm @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"  value="{{ old('tanggal', $konsultasi->tanggal) }}">
        @error('tanggal')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <div class="form-group mb-3">
      <label for="jam" class="form-label">Jam Konsultasi</label>
      <select name="jam" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam"  value="{{ old('jam', $konsultasi->jam) }}" >
        <option value="{{ old('jam', $konsultasi->jam) }}">{{ old('jam', $konsultasi->jam) }}</option>
          <option> 09.00 WIB </option>
          <option> 10.00 WIB </option>
          <option> 11.00 WIB </option>
          <option> 12.00 WIB </option>
          <option> 13.00 WIB </option>
          <option> 14.00 WIB </option>
          <option> 15.00 WIB </option>
      </select>
    @error('jam')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>


      <div class="mb-3">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </div>


      @endsection
@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Konsultasi</h1>
</div>

<div class="col-lg-6">
<form method="post" action="/dashboard/konsultasi">
    @csrf
    <div class="form-group">
      <label for="id_siswa" class="form-label">Siswa</label>
        <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror">
        <option value="">- Pilih Siswa -</option>
          @foreach ($siswas as $item)
          <option value="{{ $item->id }}"> {{ $item->nama }} </option>
        @endforeach
      </select>
      @error('id_siswa')
        <div class="invalid-feedback"> {{ $message }} </div>
      @enderror
    </div>

    <div class="mb-1">
    <label for="kelas" class="form-label">Kelas</label>
    <select name="kelas" id="kelas" class="form-control  @error('kelas') is-invalid @enderror" required value="{{ old('kelas') }}">
      <option hidden value="">Pilih Kelas</option>
      <optgroup label="Kelas TKJ" style="color: #a3a3a3;">
      </optgroup>
        <option>X TKJ - 2</option>
        <option >X TKJ - 3</option>
        <option >XI TKJ - 1 AXIOO</option>
      <optgroup label="Kelas TKR" style="color: #a3a3a3;">
      </optgroup>
        <option>TKRO - 4</option>
      <optgroup label="Kelas TITL" style="color: #a3a3a3;">
      </optgroup>
        <option>X TITL - 1</option>
        <option>XII TITL - 1</option>
      <optgroup label="Kelas DPIB" style="color: #a3a3a3;">
      </optgroup>
        <option>XII - DPIB 1</option>
      <optgroup label="Kelas TAV" style="color: #a3a3a3;">
      </optgroup>
        <option>X - TAV</option>
        <option>XI - TAV</option>
    </select>
    @error('kelas')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="nohp" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control form-control-sm @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp') }}">
    @error('nohp')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="tanggal" class="form-label">Tanggal Konsultasi</label>
    <input type="date" class="form-control form-control-sm @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
    @error('tanggal')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group mb-3">
      <label for="jam" class="form-label">Jam Konsultasi</label>
      <select name="jam" class="form-control @error('jam') is-invalid @enderror" >
        <option value="">-Pilih Jam Konsultasi-</option>
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

</div>

@endsection
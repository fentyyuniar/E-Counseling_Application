@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Siswa</h1>
</div>

<div class="col-lg-6">
<form method="post" action="/dashboard/siswa">
    @csrf
  <div class="mb-1">
    <label for="nis" class="form-label">NIS (Nomor Induk Siswa)</label>
    <input type="text" class="form-control form-control-sm @error('nis') is-invalid @enderror" minlength="5" maxlength="5" id="nis" name="nis" required autofocus value="{{ old('nis') }}">
    @error('nis')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>

  <div class="mb-1">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror"  id="nama" name="nama" required value="{{ old('nama') }}">
    @error('nama')
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
  <div class="mb-1 mt-2">
    <label for="ttl" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control form-control-sm @error('tempatlahir') is-invalid @enderror" id="tempatlahir" name="tempatlahir" required value="{{ old('tempatlahir') }}">
    @error('ttl')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1 mt-2">
    <label for="ttl" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control form-control-sm @error('tanggallahir') is-invalid @enderror" id="tanggallahir" name="tanggallahir" required value="{{ old('tanggallahir') }}">
    @error('tanggallahir')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
    @error('email')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="no_hp" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required value="{{ old('no_hp') }}">
    @error('no_hp')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="alamat" class="form-label">Alamat Lengkap</label>
    <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat') }}">
    @error('alamat')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class=" form-control form-control-sm @error('jenis_kelamin') is-invalid @enderror" style="color: darkgray" required value="{{ old('jenis_kelamin') }}">
        <option value=""> -- Pilih Jenis Kelamin -- </option>
        <option style="color: black"> L (Laki-laki)</option>
        <option style="color: black"> P (Perempuan)</option>
    </select>
    @error('jenis_kelamin')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="prestasi" class="form-label">Prestasi</label>
    <textarea  class="form-control form-control-sm @error('prestasi') is-invalid @enderror" id="prestasi" name="prestasi"  value="{{ old('prestasi') }}"></textarea>
    @error('prestasi')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="pelanggaran" class="form-label">Pelanggaran</label>
    <select name="pelanggaran" class="form-control @error('pelanggaran') is-invalid @enderror">
      <option value="">- Pilih Jenis Pelanggaran -</option>
      @foreach ($optionPelanggaran as $item)
        <option value="{{ $item->namapelanggaran }}"> {{ $item->namapelanggaran }} </option>
      @endforeach
    </select>
    @error('pelanggaran')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>



  <div class="mb-3">
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </div>

</div>

@endsection
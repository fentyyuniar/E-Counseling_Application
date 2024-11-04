@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Siswa</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/siswa/{{ $siswa->id }}">
  @method('put')
  @csrf
  <div class="mb-1">
    <label for="nis" class="form-label">NIS (Nomor Induk Siswa)</label>
    <input type="text" class="form-control form-control-sm @error('nis') is-invalid @enderror" id="nis" name="nis" required autofocus value="{{ old('nis', $siswa->nis) }}">
    @error('nis')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>

  <div class="mb-1">
    <label for="nama" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" name="nama"  value="{{ old('nama', $siswa->nama) }}">
    @error('nama')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
    <div class="mb-1">
    <label for="kelas" class="form-label">Kelas</label>
    <select name="kelas" id="kelas" class="form-control  @error('id_lapangan') is-invalid @enderror" required value="{{ old('kelas', $siswa->kelas) }}">
      <option hidden value="{{ old('kelas', $siswa->kelas) }}"> {{ old('kelas', $siswa->kelas) }} </option>
      <optgroup label="Kelas TKJ" style="color: #a3a3a3;">
      </optgroup>
        <option>TKJ - 1</option>
        <option >TKJ - 2</option>
      <optgroup label="Kelas TKR" style="color: #a3a3a3;">
      </optgroup>
        <option>TKR - 1</option>
        <option>TKR - 2</option>
      <optgroup label="Kelas TSM" style="color: #a3a3a3;">
      </optgroup>
        <option>TSM - 1</option>
        <option>TSM - 2</option>
    </select>
    @error('kelas')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1 mt-2">
    <label for="tempatlahir" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control form-control-sm @error('tempatlahir') is-invalid @enderror" id="tempatlahir" name="tempatlahir" value="{{ old('tempatlahir', $siswa->tempatlahir) }}">
    @error('tempatlahir')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1 mt-2">
    <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control form-control-sm @error('tanggallahir') is-invalid @enderror" id="tanggallahir" name="tanggallahir" value="{{ old('tanggallahir', $siswa->tanggallahir) }}">
    @error('tanggallahir')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email', $siswa->email) }}">
    @error('email')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="no_hp" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $siswa->no_hp) }}">
    @error('no_hp')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="alamat" class="form-label">Alamat Lengkap</label>
    <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  value="{{ old('alamat', $siswa->alamat) }}">
    @error('alamat')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class=" form-control form-control-sm @error('jenis_kelamin') is-invalid @enderror"   >
        <option value="{{ old('jenis_kelamin', $siswa->jenis_kelamin) }}"> {{ old('jenis_kelamin', $siswa->jenis_kelamin) }} </option>
        <option style="color: black"> L (Laki-laki)</option>
        <option style="color: black"> P (Perempuan)</option>
    </select>
    @error('jenis_kelamin')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="prestasi" class="form-label">Prestasi</label>
    <textarea  class="form-control form-control-sm @error('prestasi') is-invalid @enderror" id="prestasi" name="prestasi"  value="{{ old('prestasi', $siswa->prestasi) }}"> {{ old('prestasi', $siswa->prestasi) }}</textarea>
    @error('prestasi')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="pelanggaran" class="form-label">Lapangan</label>
    <select name="pelanggaran" class="form-control @error('pelanggaran') is-invalid @enderror">
      <option  value="">- Pilih Pelanggaran-</option>
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


@endsection


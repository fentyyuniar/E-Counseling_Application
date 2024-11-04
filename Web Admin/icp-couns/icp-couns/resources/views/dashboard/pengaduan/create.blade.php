@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Pengaduan</h1>
</div>

<div class="col-lg-6">
    <form method="post" action="/dashboard/pengaduan">
        @csrf
        <div class="form-group">
            <label for="id_siswa" class="form-label">Siswa</label>
            <select name="id_siswa" id="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror">
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
            <input class="form-control form-control-sm @error('kelas') is-invalid @enderror" id="kelas" name="kelas" readonly>
            @error('kelas')
            <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-1">
            <label for="nohp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control form-control-sm @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp') }}" readonly>
            @error('nohp')
            <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-1">
            <label for="keluhansiswa" class="form-label">Keluhan Siswa</label>
            <textarea type="text" class="form-control form-control-sm @error('keluhansiswa') is-invalid @enderror" id="keluhansiswa" name="keluhansiswa">{{ old('keluhansiswa') }}</textarea>
            @error('keluhansiswa')
            <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>

    </form>
</div>

<script>
    document.getElementById('id_siswa').addEventListener('change', function() {
        var selectedSiswa = this.value;
        var kelasInput = document.getElementById('kelas');
        var nohpInput = document.getElementById('nohp');

        // Clear existing values
        kelasInput.value = '';
        nohpInput.value = '';

        // Find the selected siswa's class and nohp from siswas data
        @foreach ($siswas as $item)
            if ('{{ $item->id }}' === selectedSiswa) {
                kelasInput.value = '{{ $item->kelas }}';
                nohpInput.value = '{{ $item->no_hp }}';
            }
        @endforeach
    });
</script>

@endsection

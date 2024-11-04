@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Absensi</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="mb-3">
  <select id="filterKelas" class="form-select">
    <option value="">Semua Kelas</option>
    <option value="X TKJ - 2">X TKJ - 2</option>
    <option value="X TKJ - 3">X TKJ - 3</option>
    <option value="XI TKJ - 1 AXIOO">X TKJ - 1 AXIOO</option>
    <option value="X TKRO - 4">X TKRO - 4</option>
    <option value="X TITL - 1">X TITL - 1</option>
    <option value="XII TITL - 1">XII TITL - 1</option>
    <option value="XII DPIB - 1">XII DPIB</option>
    <option value="X TAV">X TAV</option>
    <option value="X TAV">XI TAV</option>
  </select>
</div>
<div class="table-responsive col-lg-12">
  <!-- <a href="/dashboard/siswa/create" class="btn btn-primary mb-3">Tambah Data Absensi</a> -->
  <table id="absensiTable" class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIS</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col" style="text-align: center;">Hadir</th>
        <th scope="col" style="text-align: center;">Alpha</th>
        <th scope="col" style="text-align: center;">Izin</th>
        <th scope="col" style="text-align: center;">Sakit</th>
        <th scope="col" style="text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($absensis as $absensi)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $absensi->id_siswa }}</td>
        <td>{{ $absensi->namasiswa }}</td>
        <td>{{ $absensi->kelas }}</td>
        <td style="text-align: center;">{{ $absensi->hadir }}</td>
        <td style="text-align: center;">{{ $absensi->alfa }}</td>
        <td style="text-align: center;">{{ $absensi->izin }}</td>
        <td style="text-align: center;">{{ $absensi->sakit }}</td>
        <td>
          <a style="text-decoration: none; font-size: 80%; margin-left: 35%;" href="/dashboard/absensi/{{ $absensi->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span> Kelola Absensi Siswa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  const filterKelasSelect = document.getElementById('filterKelas');
  const absensiRows = document.querySelectorAll('#absensiTable tbody tr');

  filterKelasSelect.addEventListener('change', function() {
    const selectedKelas = this.value;

    absensiRows.forEach(function(row) {
      const kelasCell = row.querySelector('td:nth-child(3)');

      if (selectedKelas === '') {
        row.style.display = ''; // Tampilkan semua baris jika filter kelas kosong
      } else {
        if (kelasCell.textContent === selectedKelas) {
          row.style.display = ''; // Tampilkan baris jika kelas cocok
        } else {
          row.style.display = 'none'; // Sembunyikan baris jika kelas tidak cocok
        }
      }
    });
  });
</script>

@endsection

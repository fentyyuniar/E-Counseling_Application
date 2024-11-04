@extends ('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Laporan</h1>
</div>

<div class="mb-3">
  <select id="filterKelas" class="form-select">
    <option value="">Semua Kelas</option>
    <option value="TKJ - 1">TKJ - 1</option>
    <option value="TKJ - 2">TKJ - 2</option>
    <option value="TKR - 1">TKR - 1</option>
    <option value="TKR - 2">TKR - 2</option>
    <option value="TSM - 1">TSM - 1</option>
    <option value="TSM - 2">TSM - 2</option>
  </select>
</div>

<div class="table-responsive col-lg-12">
  <table id="absensiTable" class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col" style="text-align: center;">Hadir</th>
        <th scope="col" style="text-align: center;">Alpha</th>
        <th scope="col" style="text-align: center;">Izin</th>
        <th scope="col" style="text-align: center;">Sakit</th>
        <th scope="col">Prestasi</th>
        <th scope="col">Pelanggaran</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($absensis as $index => $absensi)
    @php
        // Mengakses data siswa yang sesuai dengan indeks loop
        $siswa = $siswas[$index];
    @endphp

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $absensi->namasiswa }}</td>
        <td>{{ $absensi->kelas }}</td>
        <td style="text-align: center;">{{ $absensi->hadir }}</td>
        <td style="text-align: center;">{{ $absensi->alfa }}</td>
        <td style="text-align: center;">{{ $absensi->izin }}</td>
        <td style="text-align: center;">{{ $absensi->sakit }}</td>
        <td>{{ $siswa->prestasi }}</td>
        <td>{{ $siswa->pelanggaran }}</td>

    </tr>
@endforeach
    </tbody>
  </table>
</div>

      <!-- <a onclick="return window.print()" style="width: 200px; height: 40px; margin-left: 80%;" class="btn btn btn-dark mb-3"><span data-feather="printer"></span> Print </a> -->


      <button class="badge bg-primary border-0" style="width: 200px; height: 30px; margin-left: 80%;" onclick="return window.print()"><span data-feather="printer"></span> Print</button>
      <!-- <script>
        window.print();
      </script> -->

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
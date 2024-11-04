@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Siswa</h1>
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
  <a href="/dashboard/siswa/create" class="btn btn-primary mb-3">Tambah Data Siswa</a>

  <table id="siswaTable" class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">NIS</th>
        <th scope="col">Kelas</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswas as $siswa)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->kelas }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td>
          <a href="/dashboard/siswa/{{ $siswa->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
          <a href="/dashboard/siswa/{{ $siswa->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/siswa/{{ $siswa->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure for delete data?')"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  const filterKelasSelect = document.getElementById('filterKelas');
  const siswaRows = document.querySelectorAll('#siswaTable tbody tr');

  filterKelasSelect.addEventListener('change', function() {
    const selectedKelas = this.value;

    siswaRows.forEach(function(row) {
      const kelasCell = row.querySelector('td:nth-child(4)');

      if (selectedKelas === '') {
        row.style.display = ''; // Tampilkan semua baris jika filter kosong
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

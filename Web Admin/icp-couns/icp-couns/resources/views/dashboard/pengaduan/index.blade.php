@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Pengaduan</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/pengaduan/create" class="btn btn-primary mb-3" >Tambah Data Pengaduan</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Kelas</th>
              <th scope="col">Nomor Hp</th>
              <th scope="col"> Aksi </th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

          @foreach ($pengaduans as $pengaduan)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $pengaduan->siswa->nama }} </td>
              <td> {{ $pengaduan->kelas }} </td>
              <td> {{ $pengaduan->nohp }} </td>
              <td>  
                <a href="/dashboard/pengaduan/{{ $pengaduan->id }} " class="badge bg-info"><span data-feather="eye"></span></a>
                <form action="/dashboard/pengaduan/{{ $pengaduan->id }} " method="post" class="d-inline">
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
@endsection
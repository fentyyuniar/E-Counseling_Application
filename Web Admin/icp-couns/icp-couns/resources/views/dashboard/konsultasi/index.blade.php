@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Konsultasi</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/konsultasi/create" class="btn btn-primary mb-3">Tambah Data Konsultasi</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Kelas</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($konsultasis as $konsultasi)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $konsultasi->siswa->nama }} </td>
              <td> {{ $konsultasi->kelas }} </td>
              <td> {{ $konsultasi->nohp }} </td>
              <td> {{ $konsultasi->tanggal }} </td>
              <td> {{ $konsultasi->jam }} </td>
              <td>  
                <!-- <a href="/dashboard/konsultasi/{{ $konsultasi->id }} " class="badge bg-info"><span data-feather="eye"></span></a> -->
                <a href="/dashboard/konsultasi/{{ $konsultasi->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/konsultasi/{{ $konsultasi->id }} " method="post" class="d-inline">
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
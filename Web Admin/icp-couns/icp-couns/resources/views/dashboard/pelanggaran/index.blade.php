@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Pelanggaran</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/pelanggaran/create" class="btn btn-primary mb-3">Tambah Data pelanggaran</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pelanggaran</th>
              <th scope="col">Poin</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($pelanggarans as $pelanggaran)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $pelanggaran->namapelanggaran }} </td>
              <td> {{ $pelanggaran->poin }} </td>
              <td>  
                <a href="/dashboard/pelanggaran/{{ $pelanggaran->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/pelanggaran/{{ $pelanggaran->id }} " method="post" class="d-inline">
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
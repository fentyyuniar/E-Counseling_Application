@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pengaduan Siswa</h1>
</div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">Nama</th>
            <td> {{ $pengaduan->nama }} </td>
            </tr>
            <tr>
            <th scope="col">Kelas</th> 
            <td> {{ $pengaduan->kelas }} </td>
            </tr>
            <tr>
            <th scope="col">Keluhan</th>
            <td> {{ $pengaduan->keluhansiswa }} </td>
            </tr>
        </thead>
    </table>

    <a href="/dashboard/pengaduan" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar Keluhan</a>
    <form action="/dashboard/pengaduan/{{ $pengaduan->id }} " method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="x-circle"></span>Delete</button>
    </form>


        </div>
    </div>
</div>


@endsection
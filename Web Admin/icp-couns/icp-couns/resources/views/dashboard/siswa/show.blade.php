@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Siswa</h1>
</div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">NIS</th>
            <td> {{ $siswa->nis }} </td>
            </tr>
            <tr>
            <th scope="col">Nama</th> 
            <td> {{ $siswa->nama }} </td>
            </tr>
            <tr>
            <th scope="col">Kelas</th>
            <td> {{ $siswa->kelas }} </td>
            </tr>
            <tr>
            <th scope="col">Tempat Tanggal Lahir</th>
            <td> {{ $siswa->tempatlahir }}, {{ $siswa->tanggallahir }} </td>
            </tr>
            <tr>
            <th scope="col">Email</th>
            <td> {{ $siswa->email }} </td>
            </tr>
            <tr>
            <th scope="col">Alamat Lengkap</th>
            <td> {{ $siswa->alamat }} </td>
            </tr>
            <tr>
            <th scope="col">Jenis Kelamin</th>
            <td> {{ $siswa->jenis_kelamin }} </td>
            </tr>
            <tr>
            <th scope="col">Prestasi</th>
            <td> {{ $siswa->prestasi }} </td>
            </tr>
            <tr>
            <th scope="col">Pelanggaran</th>
            <td> {{ $siswa->pelanggaran }} </td>
            </tr>
        </thead>
    </table>

    <a href="/dashboard/siswa" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar siswa</a>
    <a href="/dashboard/siswa/{{ $siswa->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/siswa/{{ $siswa->id }} " method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="x-circle"></span>Delete</button>
    </form>


        </div>
    </div>
</div>


@endsection
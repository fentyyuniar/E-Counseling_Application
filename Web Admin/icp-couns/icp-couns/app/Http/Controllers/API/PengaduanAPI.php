<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class PengaduanAPI extends Controller
{
    public function store(Request $request)
    {
        $id = $request->user()->id;
        $data = $request->validate([
            'keluhansiswa' => 'required|string',
        ]);
        $user = User::find($id);
        $pengaduan = Pengaduan::create([
            'nama' =>  $user->nama_lengkap,
            'kelas' =>  $user->kelas,
            'nohp' => $user->no_hp,
            'keluhansiswa' => $data['keluhansiswa'],
            'id_user' => $user->id
        ]);

        $response = [
            'message' => 'Data Berhasil ditambah',
            'data_pengaduan' => $pengaduan
        ];

        return response($response, 201);
    }
}

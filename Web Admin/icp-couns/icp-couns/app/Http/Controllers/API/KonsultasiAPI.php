<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonsultasiAPI extends Controller
{
    public function store(Request $request)
    {
        $id = $request->user()->id;
        $data = $request->validate([
            'tanggal' => 'required|string',
            'jam' => 'required|string',
        ]);
        $user = User::find($id);
        $konsultasi = Konsultasi::create([
            'nama' =>  $user->nama_lengkap,
            'kelas' =>  $user->kelas,
            'nohp' => $user->no_hp,
            'tanggal' => $data['tanggal'],
            'jam' => $data['jam'],
            'id_user' => $user->id
        ]);

        $response = [
            'message' => 'Data Berhasil ditambah',
            'data_konsultasi' => $konsultasi
        ];

        return response($response, 201);
    }
}

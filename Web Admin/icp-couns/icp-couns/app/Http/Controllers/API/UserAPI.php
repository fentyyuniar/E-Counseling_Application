<?php

namespace App\Http\Controllers\API;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAPI extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();

        // Mengambil data siswa berdasarkan id_pengguna
        $siswa = Siswa::where('nis', $user->id_pengguna)->first();

        // Jika ditemukan siswa dengan nis yang sesuai, kembalikan data siswa
        if($siswa) {
            return $siswa;
        } else {
            // Jika tidak ditemukan, kembalikan pesan atau response yang sesuai
            return response()->json(['message' => 'Data siswa tidak ditemukan'], 404);
        }
    }
}

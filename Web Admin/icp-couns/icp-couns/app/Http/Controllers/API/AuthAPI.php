<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthAPI extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);

        // check email
        $user = User::where('email', $data['email'])->first();

        // check password
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Opppss... Login Gagal'
            ], 401);
        }

        $token = $user->createToken('Myapp')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function register(Request $request) {
        $data = $request->validate([
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8|string',
            'nama_lengkap' => 'required|string',
            'kelas' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',

        ]);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama_lengkap' => $data['nama_lengkap'],
            'kelas' => $data['kelas'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            // 'role' => "orang tua"
        ]);

        // $token = $user->createToken('Myapp')->plainTextToken;

        $response =[
            'user' => $user,
            // 'token' => $token
        ];

        return response($response, 201);
    }
}

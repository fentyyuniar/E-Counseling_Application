<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }else

        return back()->with('loginError', 'Wrong email or password! Login failed.');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }


    // public function login(Request $request)
    // {
    //     $database = User::all()
    //     ->where('email','=',$request->email)
    //     ->first();

    //     if($database){
    //         if(password_verify($request->password,$database->password)){
    //             return response()->json([
    //                 'Success' => 1,
    //                 'id' => $database->id,
    //                 'name' => $database->nama_lengkap,
    //                 'Message'=>'Login Berhasil'
    //             ]);
    //         }
    //     }
    // }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // check email
        $user = User::where('email', $data['email'])->first();

        // check password
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Opppss... Login Gagal'
            ], 401);
        }
        if (!$user->role != 'siswa'){
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
    
    public function daftar(Request $request)
    {
       User::insert([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(["Success Registrasi"]);
    }
}
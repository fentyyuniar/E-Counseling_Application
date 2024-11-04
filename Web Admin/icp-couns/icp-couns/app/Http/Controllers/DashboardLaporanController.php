<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardLaporanController extends Controller
{
    public function index(){
        return view ('dashboard.laporan.index', [
            'siswas' => Siswa::all(),
            'absensis' => Absensi::all()
        ]);
    }
}

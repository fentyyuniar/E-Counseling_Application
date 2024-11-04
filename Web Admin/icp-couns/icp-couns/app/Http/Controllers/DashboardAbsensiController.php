<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.absensi.index', [
            'siswas' => Siswa::all(),
            'absensis' => Absensi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = Absensi::find($id);
        return view('dashboard.absensi.edit', compact(['absensi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $absensi = Absensi::find($id);

        $rules = ([
            'id_user' => '',
            'kelas' => '',
            'hadir' => '',
            'alfa' => '',
            'izin' => '',
            'sakit' => '',
        ]);

        $validatedData = $request->validate($rules);


        absensi::where('id', $absensi->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/absensi')->with('success', 'Data absensi berhasil diubah!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}

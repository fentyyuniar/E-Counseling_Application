<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opsisiswa = Siswa::all();
        return view ('dashboard.pengaduan.index', compact('opsisiswa'), [
            'pengaduans' => Pengaduan::all(),
            'siswas' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opsisiswa = Siswa::all();
        return view('dashboard.pengaduan.create',  compact('opsisiswa'), [
            'siswas' => Siswa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_siswa' => 'required',
            'kelas' => 'required',
            'nohp' => 'required',
            'keluhansiswa' => 'required',
        ]);

        Pengaduan::create($validatedData);
        return redirect ('/dashboard/pengaduan')->with('success', 'Berhasil menambahkan data keluhan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('dashboard.pengaduan.show', [
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengaduan::destroy($id);

        return redirect ('/dashboard/pengaduan')->with('success', 'Data has been deleted!');
    }

    public function pengaduan(Request $request)
    {
       Pengaduan::insert([
            'namasiswa' => $request->namasiswa,
            'kelassiswa' => $request->kelassiswa,
            'keluhansiswa' => $request->keluhansiswa,
        ]);

        return response()->json(['Message' => "Berhasil Kirim"]);
    }
}

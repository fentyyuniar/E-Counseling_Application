<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opsisiswa = Siswa::all();
        return view ('dashboard.konsultasi.index', compact('opsisiswa'), [
            'konsultasis' => Konsultasi::all(),
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
        return view ('dashboard.konsultasi.create', compact('opsisiswa'), [
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
            'tanggal' => 'required',
            'jam' => 'required',
        ]);

        Konsultasi::create($validatedData);
        return redirect ('/dashboard/konsultasi')->with('success', 'Berhasil menambahkan data konsultasi!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konsultasi = Konsultasi::find($id);
        return view('dashboard.konsultasi.edit', compact(['konsultasi']));
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
        $konsultasi = Konsultasi::find($id);

        $rules = ([
            'nama' => '',
            'kelas' => '',
            'nohp' => '',
            'tanggal' => '',
            'jam' => '',
        ]);

        $validatedData = $request->validate($rules);


        konsultasi::where('id', $konsultasi->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/konsultasi')->with('success', 'Data konsultasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Konsultasi::destroy($id);

        return redirect ('/dashboard/konsultasi')->with('success', 'Data Konsultasi berhasil dihapus!');
    }


    public function konsultasi(Request $request){
        Konsultasi::insert([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nohp' => $request->nohp,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);
        
        return response()->json(['Message' => "Berhasil Kirim"]);
    }


}

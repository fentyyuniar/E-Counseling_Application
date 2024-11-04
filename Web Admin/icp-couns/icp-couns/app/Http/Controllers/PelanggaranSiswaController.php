<?php

namespace App\Http\Controllers;

use App\Models\PelanggaranSiswa;
use App\Http\Requests\StorePelanggaranSiswaRequest;
use App\Http\Requests\UpdatePelanggaranSiswaRequest;
use App\Models\Pelanggaran;

class PelanggaranSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.pelanggaran.index', [
            'pelanggarans' => Pelanggaran::all()
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
     * @param  \App\Http\Requests\StorePelanggaranSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelanggaranSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PelanggaranSiswa  $pelanggaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(PelanggaranSiswa $pelanggaranSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PelanggaranSiswa  $pelanggaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(PelanggaranSiswa $pelanggaranSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelanggaranSiswaRequest  $request
     * @param  \App\Models\PelanggaranSiswa  $pelanggaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelanggaranSiswaRequest $request, PelanggaranSiswa $pelanggaranSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PelanggaranSiswa  $pelanggaranSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelanggaranSiswa $pelanggaranSiswa)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class DashboardPelanggaranController extends Controller
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
        return view('dashboard.pelanggaran.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelanggaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namapelanggaran' => 'required',
            'poin' => 'required',
        ]);

        Pelanggaran::create($validatedData);
        return redirect ('/dashboard/pelanggaran')->with('success', 'Berhasil menambahkan Data Pelanggaran!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggaran = Pelanggaran::find($id);
        return view('dashboard.pelanggaran.edit', compact(['pelanggaran']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelanggaranRequest  $request
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggaran = Pelanggaran::find($id);

        $rules = ([
            'namapelanggaran' => 'required',
            'poin' => 'required',
        ]);

        $validatedData = $request->validate($rules);


        Pelanggaran::where('id', $pelanggaran->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/pelanggaran')->with('success', 'Data pelanggaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggaran  $pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::find($id);

        if ($pelanggaran) {

            $pelanggaran->delete();
    
            return redirect('/dashboard/pelanggaran')->with('success', 'Pelanggaran has been deleted!');
        } else {
            return redirect('/dashboard/pelanggaran')->with('error', 'Pelanggaran not found!');
        }
    }
}

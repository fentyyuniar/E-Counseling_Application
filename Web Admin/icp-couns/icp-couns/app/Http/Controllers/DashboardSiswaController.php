<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.siswa.index', [
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
        $optionPelanggaran = Pelanggaran::all();

        return view ('dashboard.siswa.create', compact('optionPelanggaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $siswa = new Siswa;
        $siswa->nis = $data['nis'];
        $siswa->nama = $data['nama'];
        $siswa->kelas = $data['kelas'];
        $siswa->tempatlahir = $data['tempatlahir'];
        $siswa->tanggallahir = $data['tanggallahir'];
        $siswa->email = $data['email'];
        $siswa->no_hp = $data['no_hp'];
        $siswa->alamat = $data['alamat'];
        $siswa->jenis_kelamin = $data['jenis_kelamin'];
        $siswa->prestasi = $data['prestasi'];
        $siswa->pelanggaran = $data['pelanggaran'];
        $siswa->save();

        $absensisiswa = new Absensi;
        $absensisiswa->id_siswa = $data['nis'];
        $absensisiswa->namasiswa = $data['nama'];
        $absensisiswa->kelas = $siswa->kelas;
        $absensisiswa->save();


        $siswa = new User();
        $siswa->id_pengguna = $data['nis'];
        $siswa->email = $data['email'];
        // Ambil tanggal lahir dari $data
        $tanggal_lahir = $data['tanggallahir'];

        // Menghilangkan tanda "-" dari tanggal lahir
        $tanggal_lahir_tanpa_dash = str_replace("-", "", $tanggal_lahir);

        // Hash password
        $hashed_password = password_hash($tanggal_lahir_tanpa_dash, PASSWORD_DEFAULT);

        // Simpan hashed password ke dalam properti $siswa->password
        $siswa->password = $hashed_password;
        $siswa->role = 'siswa';
        $siswa->save();
        return redirect ('/dashboard/siswa')->with('success', 'Berhasil menambahkan data siswa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('dashboard.siswa.show', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $optionPelanggaran = Pelanggaran::all();
        return view('dashboard.siswa.edit', compact(['siswa', 'optionPelanggaran']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        // Validasi input
        $rules = [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'tempatlahir' => 'required',
            'email' => 'required|email:dns',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'prestasi' => '',
            'pelanggaran' => ''
        ];
    
        $this->validate($request, $rules);
    
        // Mengambil atau membuat data absensi berdasarkan ID siswa
        $absensi = Absensi::updateOrCreate(
            ['id' => $id],
            [
                // Sesuaikan kolom-kolom pada tabel absensi sesuai kebutuhan
                'id_siswa' => $request->nis,
                'namasiswa' => $request->nama,
                'kelas' => $request->kelas,
                // ...
            ]
        );

        // Mengambil data User berdasarkan ID
        $user = User::updateOrCreate(
            ['id' => $id],
            [
                // Sesuaikan kolom-kolom pada tabel absensi sesuai kebutuhan
                'id_pengguna' => $request->nis,
                'email' => $request->email,
                // ...
            ]
        );
    
        // Memperbarui data siswa
        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'tanggallahir' => $request->tanggallahir,
            'tempatlahir' => $request->tempatlahir,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'prestasi' => $request->prestasi,
            'pelanggaran' => $request->pelanggaran
        ]);

        return redirect ('/dashboard/siswa')->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $absensi = Absensi::find($id);
        $user = User::find($id);

        if ($siswa) {

            $absensi->delete();
            $siswa->delete();
            $user->delete();
    
            return redirect('/dashboard/siswa')->with('success', 'Siswa has been deleted!');
        } else {
            return redirect('/dashboard/siswa')->with('error', 'Siswa not found!');
        }
    }
}

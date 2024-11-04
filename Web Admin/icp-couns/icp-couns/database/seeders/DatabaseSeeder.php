<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Pengaduan;
use App\Models\Konsultasi;
use App\Models\Pelanggaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_pengguna' => '1',
            'email' => 'gurubk@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);

{
        // Tambahkan data pada tabel siswas
        // Siswa::create([
        //     'nis' => '11111',
        //     'nama' => 'John Doe',
        //     'kelas' => 'TKJ - 1',
        //     'tempatlahir' => 'Purwakarta',
        //     'tanggallahir' => '1990-01-01',
        //     'email' => 'johndoe@example.com',
        //     'no_hp' => '089213212312',
        //     'alamat' => 'Jl. Contoh Alamat',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'prestasi' => 'Juara 1 Lomba',
        //     'pelanggaran' => null,
        // ]);

        Pelanggaran::create([
            'namapelanggaran' => 'Tidak Memasukkan Baju',
            'poin' => '10',
        ]);

        

        // Tambahkan data lainnya jika diperlukan
    }

        // Konsultasi::create([
        //     'nama' => 'Vellany',
        //     'kelas' => 'MM-1',
        //     'nohp' => '089112212312',
        //     'tanggal' => '2023-01-18',
        //     'jam' => '09.00 WIB'
        // ]);

        // Siswa::create([
        //     'nis' => '11046',
        //     'nama' => 'Alfiano Rover Pradana',
        //     'kelas' => 'TKR-2',
        //     'ttl' => 'Madiun, 17 Juli 2005',
        //     'email' => 'roverpradana@gmail.com',
        //     'no_hp' => '081987689096',
        //     'alamat' => 'Jl. Mundu, Rt.02 Rw.01, Dsn.Sebayi',
        //     'jenis_kelamin' => "L",
        // ]);


        // Pengaduan::create([
        //     'namasiswa' => 'Roy Kiyoshi',
        //     'kelassiswa' => 'MM-1',
        //     'keluhansiswa' => 'Teman saya dibully di kelas',
        // ]);

    }
}

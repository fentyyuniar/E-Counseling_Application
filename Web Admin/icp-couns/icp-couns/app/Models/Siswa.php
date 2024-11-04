<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function absensi() {
        return $this->belongsTo(Absensi::class, 'id_siswa', 'nis');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }

}

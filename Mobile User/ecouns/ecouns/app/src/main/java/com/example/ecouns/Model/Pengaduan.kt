package com.example.ecouns.Model

import com.google.gson.annotations.SerializedName

data class Pengaduan(
    @SerializedName("nama")
    var nama : String,

    @SerializedName("kelas")
    var kelas : String,

    @SerializedName("nohp")
    var nohp : String,

    @SerializedName("keluhansiswa")
    var keluhansiswa : String,

)

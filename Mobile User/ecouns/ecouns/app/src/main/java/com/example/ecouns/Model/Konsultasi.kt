package com.example.ecouns.Model

import com.google.gson.annotations.SerializedName

data class Konsultasi(

    @SerializedName("nama")
    var nama : String,

    @SerializedName("kelas")
    var kelas : String,

    @SerializedName("nohp")
    var nohp : String,

    @SerializedName("tanggal")
    var tanggal : String,

    @SerializedName("jam")
    var jam : String,
)

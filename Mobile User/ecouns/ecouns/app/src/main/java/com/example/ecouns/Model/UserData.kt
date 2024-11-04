package com.example.ecouns.Model

import com.google.gson.annotations.SerializedName

data class UserData(
    @SerializedName("nis")
    var nis : Int,

    @SerializedName("nama")
    var nama : String,

    @SerializedName("kelas")
    var kelas : String,

    @SerializedName("tempatlahir")
    var tempatlahir : String,

    @SerializedName("tanggallahir")
    var tanggallahir : String,

    @SerializedName("email")
    var email : String,

    @SerializedName("no_hp")
    var no_hp : String,

    @SerializedName("alamat")
    var alamat : String,

    @SerializedName("jenis_kelamin")
    var jenis_kelamin : String,

)

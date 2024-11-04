package com.example.ecouns.Model

import com.google.gson.annotations.SerializedName

data class RegisterClient(
    @SerializedName("nama_lengkap")
    var nama : String,

    @SerializedName("kelas")
    var kelas : String,

    @SerializedName("no_hp")
    var nohp : String,

    @SerializedName("email")
    var email : String,

    @SerializedName("password")
    var password : String,

    @SerializedName("alamat")
    var alamat : String,
)

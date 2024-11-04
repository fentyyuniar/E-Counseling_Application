package com.example.ecouns.Model

import com.google.gson.annotations.SerializedName

data class User(
    @SerializedName("token")
    var token : String
)

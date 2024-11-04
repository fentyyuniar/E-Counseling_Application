package com.example.ecouns.Service

import com.example.ecouns.Model.*
import retrofit2.Call
import retrofit2.http.*

interface APIClient {
    @FormUrlEncoded
    @POST("login")
    fun login(
        @Field("email") email: String,
        @Field("password") password:String
    ): Call<LoginClient>

    @POST ("register")
    fun registrasi(@Body request: RegisterClient
    ): Call<User>

    @POST ("pengaduan/create")
    fun keluhan(
        @Header("Authorization") token: String?,
        @Body request: PengaduanClient
    ): Call<Pengaduan>

    @POST ("konsultasi/create")
    fun konsultasi(
        @Header("Authorization") token: String?,
        @Body request: KonsultasiClient
    ): Call<Konsultasi>

    @GET ("profile")
    fun profil(
        @Header("Authorization") token: String?,
    ): Call<UserData>



//    @FormUrlEncoded
//    @POST("pengaduan")
//    fun pengaduan(
//        @Field("namasiswa")namasiswa: String,
//        @Field("kelassiswa")kelassiswa: String,
//        @Field("keluhansiswa")keluhansiswa: String,
//    ): Call<PengaduanClient>
//
//    @FormUrlEncoded
//    @POST("konsultasi")
//    fun konsultasi(
//        @Field("nama") nama: String,
//        @Field("kelas") kelas: String,
//        @Field("nohp") nohp: String,
//        @Field("tanggal") tanggal: String,
//        @Field("jam") jam: String,
//
//    ): Call<KonsultasiClient>
}
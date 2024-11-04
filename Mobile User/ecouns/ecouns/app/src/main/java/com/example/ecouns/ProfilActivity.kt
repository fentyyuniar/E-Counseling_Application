package com.example.ecouns

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.ecouns.Model.UserData
import com.example.ecouns.Service.SessionManager
import com.example.ecouns.Service.SettingAPI
import kotlinx.android.synthetic.main.profil_siswa.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ProfilActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.profil_siswa)

        profil()


    }


    private fun profil(){
        val sessionManager = SessionManager(this)
        SettingAPI.instance.profil(token = "Bearer ${sessionManager.fetchAuthToken()}"
        ).enqueue(object : Callback<UserData> {
            override fun onResponse(call: Call<UserData>, response: Response<UserData>) {
                val response = response.body()!!
                tv_nis.text = response.nis.toString()
                tv_nama.text = response.nama
                tv_kelas.text = response.kelas
                tv_tempatlahir.text = response.tempatlahir
                tv_tanggallahir.text = response.tanggallahir
                tv_email.text = response.email
                tv_nohp.text = response.no_hp
                tv_jenkal.text = response.jenis_kelamin
                tv_alamat.text = response.alamat

            }

            override fun onFailure(call: Call<UserData>, t: Throwable) {
                TODO("Not yet implemented")
            }

        })
    }


}
package com.example.ecouns

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ecouns.Model.Pengaduan
import com.example.ecouns.Model.PengaduanClient
import com.example.ecouns.Service.SessionManager
import com.example.ecouns.Service.SettingAPI
import kotlinx.android.synthetic.main.keluhan.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class KeluhanActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.keluhan)

        btn_keluhan.setOnClickListener{
            pengaduan()
        }


    }

    private fun pengaduan(){
        val sessionManager = SessionManager(this)
        if(edt_pengaduan.text.isEmpty()){
            edt_pengaduan.error = "Kolom keluhan harus Diisi"
            edt_pengaduan.requestFocus()
        }

        SettingAPI.instance.keluhan(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
            PengaduanClient(
                keluhansiswa = edt_pengaduan.text.toString()
            )
        ).enqueue(object : Callback<Pengaduan>{
            override fun onResponse(call: Call<Pengaduan>, response: Response<Pengaduan>) {
                val keluhanRespon = response.body()
                if (keluhanRespon != null) {
                    intent = Intent(this@KeluhanActivity, HomeActivity::class.java)
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                    startActivity(intent)
                    Toast.makeText(this@KeluhanActivity, "Data Keluhan Berhasil Ditambah", Toast.LENGTH_SHORT).show()
                }else{
                    Log.e("Error", toString(), Throwable())
//                        Toast.makeText(this@DataAnakActivity, "Gagal Tambah Data!", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<Pengaduan>, t: Throwable) {
                Log.e("ERROR",t.message.toString())
            }

        })



    }

}

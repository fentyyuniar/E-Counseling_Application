package com.example.ecouns

import android.app.DatePickerDialog
import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.ArrayAdapter
import android.widget.DatePicker
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ecouns.Model.Konsultasi
import com.example.ecouns.Model.KonsultasiClient
import com.example.ecouns.Service.SessionManager
import com.example.ecouns.Service.SettingAPI
import kotlinx.android.synthetic.main.konsultasi.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.text.SimpleDateFormat
import java.util.*

class KonsultasiActivity : AppCompatActivity() {

    private var tanggal = Calendar.getInstance()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.konsultasi)


        val jadwal = arrayOf("09.00 WIB", "10.00 WIB", "11.00 WIB",
        "12.00 WIB", "13.00 WIB", "14.00 WIB", "15.00 WIB")
        val arrayAdapter = ArrayAdapter(this, android.R.layout.simple_spinner_dropdown_item, jadwal)
        option_jadwal.adapter = arrayAdapter



        val DateListener = object : DatePickerDialog.OnDateSetListener{
            override fun onDateSet(view: DatePicker?, year: Int, month: Int, day: Int) {
                tanggal.set(Calendar.YEAR, year)
                tanggal.set(Calendar.MONTH, month)
                tanggal.set(Calendar.DAY_OF_MONTH, day)
                updateDate()
            }
        }


        btn_konsultasi.setOnClickListener({
            konsultasi()
        })

    }
    private fun updateDate() {
        val formatdate = "yyyy-MM-dd"
        val sdf = SimpleDateFormat(formatdate, Locale.US)

    }


    private fun konsultasi(){
        val sessionManager = SessionManager(this)
        SettingAPI.instance.konsultasi(
            token = "Bearer ${sessionManager.fetchAuthToken()}",
            KonsultasiClient(
                tanggal = option_jadwal.selectedItem.toString()
            )
        ).enqueue(object : Callback<Konsultasi>{
            override fun onResponse(call: Call<Konsultasi>, response: Response<Konsultasi>) {
                val keluhanRespon = response.body()
                if (keluhanRespon != null) {
                    intent = Intent(this@KonsultasiActivity, HomeActivity::class.java)
                    intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                    startActivity(intent)
                    Toast.makeText(this@KonsultasiActivity, "Data Berhasil Ditambah", Toast.LENGTH_SHORT).show()
                }else{
                    Log.e("Error", toString(), Throwable())
//                        Toast.makeText(this@DataAnakActivity, "Gagal Tambah Data!", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<Konsultasi>, t: Throwable) {
                Log.e("ERROR",t.message.toString())
            }

        })
    }




}

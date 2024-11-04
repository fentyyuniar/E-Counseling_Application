package com.example.ecouns

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import kotlinx.android.synthetic.main.home.*
import kotlinx.android.synthetic.main.login.*

class HomeActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.home)


        menu_keluhan.setOnClickListener{
            startActivity(Intent(this, KeluhanActivity::class.java))
        }

        menu_konsultasi.setOnClickListener{
            startActivity(Intent(this, KonsultasiActivity::class.java))
        }

        menu_data.setOnClickListener{
            startActivity(Intent(this, ProfilActivity::class.java ))
        }
    }
}
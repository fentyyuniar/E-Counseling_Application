package com.example.ecouns

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import androidx.appcompat.app.AppCompatActivity

class Splash : AppCompatActivity() {
    lateinit var handler: Handler

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.splash_screen)

        handler = Handler()
        handler.postDelayed({

            val intent = Intent(this, LoginActivity::class.java)
            startActivity(intent)
            finish()

        }, 3000)
    }
}
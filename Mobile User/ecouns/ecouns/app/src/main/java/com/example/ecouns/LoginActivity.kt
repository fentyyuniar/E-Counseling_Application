package com.example.ecouns

import android.content.Intent
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.ecouns.Model.LoginClient
import com.example.ecouns.Service.SessionManager
import com.example.ecouns.Service.SettingAPI
import kotlinx.android.synthetic.main.login.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.login)


        btn_login.setOnClickListener{
            APILogin()
        }

    }

        private fun APILogin(){
            if (input_email.text.isEmpty()){
                input_email.error = "Email harus diisi!"
                input_email.requestFocus()
                return
            }
            if (input_password.text.isEmpty()){
                input_password.error = "Password harus diisi!"
                input_password.requestFocus()
                return
            }

            val sessionManager = SessionManager(this)


            SettingAPI.instance.login(input_email.text.toString(), input_password.text.toString())
                .enqueue(object : Callback<LoginClient>{
                override fun onResponse(call: Call<LoginClient>, response: Response<LoginClient>) {
                    var responlogin = response.body()!!
                    if (responlogin.Success == 1){
                        sessionManager.saveAuthToken(responlogin.token)
                        intent = Intent(this@LoginActivity, HomeActivity::class.java)
                        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP or Intent.FLAG_ACTIVITY_NEW_TASK)
                        startActivity(intent)
                        Toast.makeText(this@LoginActivity, "Halo anak muda!", Toast.LENGTH_SHORT).show()
                    }
                }

                override fun onFailure(call: Call<LoginClient>, t: Throwable) {
                    Toast.makeText(this@LoginActivity, "Login tidak berhasil!"+t.message, Toast.LENGTH_SHORT).show()
                }

            })
        }
}
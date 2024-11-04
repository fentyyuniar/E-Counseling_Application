<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id()->startingValue(2);
            $table->foreignId('id_siswa');
            $table->string('namasiswa');
            $table->string('kelas');
            $table->integer('hadir')->nullable();
            $table->integer('alfa')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('izin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
};

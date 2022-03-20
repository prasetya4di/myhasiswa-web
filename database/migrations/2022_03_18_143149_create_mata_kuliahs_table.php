<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string("kode_matkul")->primary();
            $table->string("mahasiswa_nim");
            $table->string("nama");
            $table->integer("sks");
            $table->string("link_kelas");
            $table->string("nama_dosen");
            $table->string("hari_kuliah");
            $table->time("waktu_kuliah");
            $table->date("tanggal_mulai");
            $table->date("tanggal_selesai");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("mahasiswa_nim")->references("nim")->on("mahasiswa");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
};

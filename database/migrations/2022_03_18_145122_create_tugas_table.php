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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string("mata_kuliah_kode_matkul");
            $table->string("nama");
            $table->date("tanggal_pengumpulan");
            $table->string("link_pengumpulan");
            $table->boolean("status");
            $table->timestamps();
            $table->foreign("mata_kuliah_kode_matkul")->references("kode_matkul")->on("mata_kuliah");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};

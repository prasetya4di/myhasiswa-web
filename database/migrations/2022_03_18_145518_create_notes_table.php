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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string("mata_kuliah_kode_matkul");
            $table->date("tanggal");
            $table->text("note");
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
        Schema::dropIfExists('notes');
    }
};

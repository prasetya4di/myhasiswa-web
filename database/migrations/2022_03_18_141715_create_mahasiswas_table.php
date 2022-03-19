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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string("nim")->primary();
            $table->unsignedBigInteger("users_id");
            $table->string("nama");
            $table->text("alamat");
            $table->date("ttl");
            $table->string("gender");
            $table->string("prodi");
            $table->string("no_handphone");
            $table->timestamps();
            $table->foreign("users_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};

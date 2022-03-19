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
            $table->string("name");
            $table->text("address");
            $table->date("birth_date");
            $table->string("gender");
            $table->string("study_plan");
            $table->string("phone_number");
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

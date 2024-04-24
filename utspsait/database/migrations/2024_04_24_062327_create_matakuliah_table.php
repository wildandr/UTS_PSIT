<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->string('kode_mk', 10)->primary();
            $table->string('nama_mk', 20);
            $table->tinyInteger('sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}

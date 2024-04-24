<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkuliahanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('perkuliahan', function (Blueprint $table) {
            $table->increments('id_perkuliahan');
            $table->string('nim', 10);
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->string('kode_mk', 10);
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah');
            $table->double('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('perkuliahan');
    }
}

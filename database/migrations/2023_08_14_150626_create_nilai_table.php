<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->integer('lat_soal1');
            $table->integer('lat_soal2');
            $table->integer('lat_soal3');
            $table->integer('lat_soal4');
            $table->integer('uh1');
            $table->integer('uh2');
            $table->integer('uts');
            $table->integer('uas');
            $table->foreignId('siswa_id')->constrained('siswa');
            $table->foreignId('matpel_id')->constrained('matpel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}

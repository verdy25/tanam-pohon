<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('penanggungjawab');
            $table->string('alamat');
            $table->string('nik');
            $table->string('telp');
            $table->string('tujuan');
            $table->unsignedBigInteger('bibit_id');
            $table->integer('jumlah_bibit');
            $table->double('luas_lahan');
            $table->string('ktp');
            $table->string('spptpbb');
            $table->string('permohonan');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('bibit_id')->references('id')->on('bibits');
            $table->foreign('status')->references('id')->on('status_pengajuans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaans');
    }
}

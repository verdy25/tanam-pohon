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
            $table->unsignedBigInteger('user_id');
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
            $table->double('latitude');
            $table->double('longitude');
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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

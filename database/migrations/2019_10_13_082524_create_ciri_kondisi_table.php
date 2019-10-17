<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiriKondisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahan_kondisi_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lahan_kondisi_id');
            $table->unsignedBigInteger('lahan_ciri_id');

            $table->foreign('lahan_kondisi_id')->references('id')->on('lahan_kondisis');
            $table->foreign('lahan_ciri_id')->references('id')->on('lahan_ciris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lahan_kondisi_detail');
    }
}

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
        Schema::create('lahan_ciri_lahan_kondisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lahan_kondisi_id')->unsigned();
            $table->integer('lahan_ciri_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lahan_ciri_lahan_kondisi');
    }
}

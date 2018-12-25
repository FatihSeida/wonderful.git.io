<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masukan', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->integer('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id')->on('wisata');
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
        Schema::dropIfExists('masukan');
    }
}

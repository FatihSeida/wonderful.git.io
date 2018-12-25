<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('desc')->nullable();
            $table->string('price')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('hp')->nullable();
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
        Schema::dropIfExists('villa');
    }
}

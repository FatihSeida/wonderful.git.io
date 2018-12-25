<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLikeDislikeColumnToVillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villa', function (Blueprint $table) {
          $table->integer('like')->after('price')->nullable();
          $table->integer('dislike')->after('like')->nullable();
          $table->string('photo1')->after('thumbnail')->nullable();
          $table->string('photo2')->after('photo1')->nullable();
          $table->string('photo3')->after('photo2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villa', function (Blueprint $table) {
          $table->dropColumn('like');
          $table->dropColumn('dislike');
          $table->dropColumn('photo1');
          $table->dropColumn('photo2');
          $table->dropColumn('photo3');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mechanikas_id');
            $table->unsignedBigInteger('automobilis_id');
            $table->unsignedBigInteger('simptomas_id');
            $table->unsignedBigInteger('problema_id');
            $table->string('sprendimas');
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
        Schema::dropIfExists('gidas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('k_mk');
            $table->string('mk');
            $table->string('angkatan');
            $table->integer('request_seats');
            $table->boolean('status_request');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lr');
    }
}

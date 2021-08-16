<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('experience');
            $table->string('mobile')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts');
    }
}

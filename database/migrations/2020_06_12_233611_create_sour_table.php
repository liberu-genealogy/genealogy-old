<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sours', function (Blueprint $table) {
            $table->id();
            $table->string('sour')->nullable();
            $table->string('titl')->nullable();
            $table->string('auth')->nullable();
            $table->string('data')->nullable();
            $table->string('text')->nullable();
            $table->string('publ')->nullable();
            $table->string('abbr')->nullable();
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
        Schema::dropIfExists('sours');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subms', function (Blueprint $table) {
            $table->id();
            $table->string('subm')->nullable();
            $table->string('name')->nullable();
            $table->string('addr')->nullable();
            $table->string('rin')->nullable();
            $table->string('rfn')->nullable();
            $table->string('lang')->nullable();
            $table->string('phon')->nullable();
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
        Schema::dropIfExists('subms');
    }
}

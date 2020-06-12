<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepogedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repogeds', function (Blueprint $table) {
            $table->id();
            $table->string('repo')->nullable();
            $table->string('name')->nullable();
            $table->string('addr')->nullable();
            $table->string('rin')->nullable();
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
        Schema::dropIfExists('repogeds');
    }
}

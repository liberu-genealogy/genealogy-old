<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description', 65535);
            $table->dateTime('date')->nullable();
            $table->timestamps();
            $table->integer('is_active');
            $table->integer('volume_id');
            $table->integer('page_id');
            $table->integer('confidence');
            $table->integer('source_id')->references('id')->on('sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sources');
    }
}

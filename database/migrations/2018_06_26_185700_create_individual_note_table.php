<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndividualNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_note', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('individual_id')->unsigned()->index('individual_id');
            $table->foreign('individual_id')->references('id')->on('individuals');
            $table->integer('note_id')->unsigned()->index('note_id');
            $table->foreign('note_id')->references('id')->on('notes');
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
        Schema::drop('individual_note');
    }
}

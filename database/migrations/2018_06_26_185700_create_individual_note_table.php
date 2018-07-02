<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('individual_id')->unsigned()->index('individual_note_id');
            $table->foreign('individual_id')->references('id')->on('individuals');
            $table->integer('note_id')->unsigned()->index('note_individual_id');
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

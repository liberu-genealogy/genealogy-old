<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilyIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_individual', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->index('family_id');
            $table->foreign('family_id')->references('id')->on('families');
            $table->integer('individual_id')->unsigned()->index('individual_id');
            $table->foreign('individual_id')->references('id')->on('individuals');
            $table->integer('type_id')->default('0');
            $table->timestamps();
            $table->integer('is_active')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('family_individual');
    }
}

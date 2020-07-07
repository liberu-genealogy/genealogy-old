<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataExportsTable extends Migration
{
    public function up()
    {
        Schema::create('data_exports', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('entries')->nullable();
            $table->integer('status')->nullable();

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_exports');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataImportsTable extends Migration
{
    public function up()
    {
        Schema::create('data_imports', function (Blueprint $table) {
            $table->increments('id');

            $table->string('type')->index();

            $table->integer('successful');
            $table->integer('failed');

            $table->integer('chunks');
            $table->integer('processed_chunks');

            $table->boolean('file_parsed');

            $table->tinyInteger('status');

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_imports');
    }
}

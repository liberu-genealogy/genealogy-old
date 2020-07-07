<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectedImportsTable extends Migration
{
    public function up()
    {
        Schema::create('rejected_imports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('data_import_id')->unsigned();
            $table->foreign('data_import_id')->references('id')->on('data_imports')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rejected_imports');
    }
}

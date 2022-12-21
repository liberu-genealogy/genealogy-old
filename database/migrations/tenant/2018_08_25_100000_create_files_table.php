<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');

            $table->string('attachable_type')->nullable();
            $table->integer('attachable_id')->nullable();
            $table->integer('type_id')->default(0);
            $table->string('original_name')->index();
            $table->string('saved_name')->index();
            // $table->string('path');

            $table->integer('size');
            $table->string('mime_type')->nullable();
            $table->integer('is_public')->default(1);
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}

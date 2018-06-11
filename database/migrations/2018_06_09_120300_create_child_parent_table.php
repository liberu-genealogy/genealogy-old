<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_parent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->unsigned()->index('child_id');
            $table->foreign('child_id')->references('id')->on('individuals');
            $table->integer('parent_id')->unsigned()->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('individuals');
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
        Schema::drop('child_parent');
    }
}

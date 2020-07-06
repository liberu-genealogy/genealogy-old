<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('comment_user', function (Blueprint $table) {
            $table->integer('comment_id')->unsigned()->index();
            $table->foreign('comment_id')->references('id')->on('comments')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->primary(['comment_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::drop('comment_user');
    }
}

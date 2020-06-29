<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('person_id')->unsigned()->index();

            $table->integer('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('user_groups');

            $table->integer('role_id')->unsigned()->index('roles_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->boolean('is_active');

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');

            $table->rememberToken();

            $table->datetime('password_updated_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarEventUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('calendar_event_user', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('calendar_events')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['event_id', 'user_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar_event_user');
    }
}

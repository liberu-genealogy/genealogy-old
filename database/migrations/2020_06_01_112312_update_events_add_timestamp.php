<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventsAddTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('person_events', function (Blueprint $table) {
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
        });
        Schema::table('family_events', function (Blueprint $table) {
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->integer('day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('person_events', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('month');
            $table->dropColumn('day');
        });
        Schema::table('family_events', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('month');
            $table->dropColumn('day');
        });
    }
}

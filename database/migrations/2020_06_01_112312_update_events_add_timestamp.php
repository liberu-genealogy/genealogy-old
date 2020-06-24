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
            $table->string('type')->nullable();
            $table->string('attr')->nullable();
            $table->string('plac')->nullable();
            $table->string('phon')->nullable();
            $table->string('caus')->nullable();
            $table->string('age')->nullable();
            $table->string('agnc')->nullable();
            $table->string('adop')->nullable();
            $table->string('adop_famc')->nullable();
            $table->string('birt_famc')->nullable();
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
            $table->dropColumn('type');
            $table->dropColumn('attr');
            $table->dropColumn('plac');
            $table->dropColumn('phon');
            $table->dropColumn('caus');
            $table->dropColumn('age');
            $table->dropColumn('agnc');
            $table->dropColumn('adop');
            $table->dropColumn('adop_famc');
            $table->dropColumn('birt_famc');
        });
        Schema::table('family_events', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('month');
            $table->dropColumn('day');
        });
    }
}

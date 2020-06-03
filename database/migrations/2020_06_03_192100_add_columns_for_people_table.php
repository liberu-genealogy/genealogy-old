<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsForPeopleTable extends Migration
{
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string("givn");
            $table->text("surn")->nullable();
            $table->char("sex",1)->nullable();
            $table->text("description")->nullable();
            $table->integer("child_in_family_id")->references("id")->on("families")->nullable();
        });

    }

    public function down()
    {

    Schema::table('people', function($table) {
        $table->dropColumn('givn');
        $table->dropColumn('surn');
        $table->dropColumn('sex');
        $table->dropColumn('description');
        $table->dropColumn('child_in_family_id');
    });

    }
}

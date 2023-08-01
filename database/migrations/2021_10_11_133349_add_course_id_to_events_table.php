<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseIdToEventsTable extends Migration
{

    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');

        });
    }


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}

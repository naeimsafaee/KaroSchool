<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->integer('order')->after('home_work');
        });
    }


    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            //
        });
    }
}

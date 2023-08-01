<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteCategoryCoursesTable extends Migration
{

    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {

            $table->dropForeign(['course_category_id']);
            $table->dropColumn('course_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

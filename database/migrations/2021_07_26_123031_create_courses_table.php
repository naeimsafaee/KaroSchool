<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('title');
            $table->text('description');
            $table->text('short_description');
            $table->string('hour');
            $table->text('file');
            $table->unsignedBigInteger('course_category_id');
            $table->unsignedBigInteger('teacher_id');
            $table->bigInteger('price');
            $table->bigInteger('discount_price');
            $table->timestamps();

            $table->foreign('course_category_id')->references('id')->on('course_categories')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('title');
            $table->text('description');
            $table->string('hour');
            $table->text('file');
            $table->unsignedBigInteger('blog_category_id');
            $table->timestamps();

            $table->foreign('blog_category_id')->references('id')->on('blog_categories')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}

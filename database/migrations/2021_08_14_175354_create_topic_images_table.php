<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicImagesTable extends Migration
{

    public function up()
    {
        Schema::create('topic_images', function (Blueprint $table) {
            $table->id();
            $table->text('file');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->timestamps();


            $table->foreign('topic_id')->references('id')->on('topics')
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
        Schema::dropIfExists('topic_images');
    }
}

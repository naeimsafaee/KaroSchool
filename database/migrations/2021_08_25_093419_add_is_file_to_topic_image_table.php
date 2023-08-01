<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFileToTopicImageTable extends Migration
{

    public function up()
    {
        Schema::table('topic_images', function (Blueprint $table) {
            $table->boolean('is_file')->default(false)->after('topic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_image', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerIdToAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {

            $table->unsignedBigInteger('answer_id')->nullable()->after('topic_id');

            $table->foreign('answer_id')->references('id')->on('answers')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            //
        });
    }
}

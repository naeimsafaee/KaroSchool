<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{

    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->text('client_id');
            $table->text('topic_category_id');
            $table->text('tool_id');
            $table->text('title');
            $table->text('content');
            $table->integer('likes')->default(0);
            $table->text('file')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}

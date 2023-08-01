<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventFilesTable extends Migration
{

    public function up()
    {
        Schema::create('event_files', function (Blueprint $table) {
            $table->id();
            $table->text('file');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('vote');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('event_files');
    }
}

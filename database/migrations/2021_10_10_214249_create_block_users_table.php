<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockUsersTable extends Migration
{

    public function up()
    {
        Schema::create('block_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('banned_client_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('block_users');
    }
}

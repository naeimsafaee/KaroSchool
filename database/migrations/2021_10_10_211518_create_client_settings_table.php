<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSettingsTable extends Migration{

    public function up(){
        Schema::create('client_settings', function(Blueprint $table){
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('client_settings');
    }
}

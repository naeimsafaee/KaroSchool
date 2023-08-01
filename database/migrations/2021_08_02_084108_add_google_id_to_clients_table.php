<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleIdToClientsTable extends Migration{

    public function up(){
        Schema::table('clients', function(Blueprint $table){
            $table->string('google_id')->nullable();
        });
    }

    public function down(){
        Schema::table('clients', function(Blueprint $table){
            //
        });
    }
}

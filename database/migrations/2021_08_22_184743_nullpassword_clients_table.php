<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullpasswordClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->text('password')->nullable()->change();
        });
    }

    public function down()
    {
        //
    }
}

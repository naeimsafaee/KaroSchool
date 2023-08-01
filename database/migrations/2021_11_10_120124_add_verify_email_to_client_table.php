<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifyEmailToClientTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('email_code')->nullable()->after('password_code');
            $table->integer('phone_code')->nullable()->after('email_code');
            $table->boolean('is_phone_verified')->default(false)->after('phone_code');
            $table->boolean('is_email_verified')->default(false)->after('is_phone_verified');
        });
    }


    public function down()
    {
        Schema::table('client', function (Blueprint $table) {
            //
        });
    }
}

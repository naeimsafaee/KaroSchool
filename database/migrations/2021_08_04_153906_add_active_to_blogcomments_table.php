<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveToBlogcommentsTable extends Migration
{

    public function up()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->boolean('active')->default(false
            )->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogcomments', function (Blueprint $table) {
            //
        });
    }
}

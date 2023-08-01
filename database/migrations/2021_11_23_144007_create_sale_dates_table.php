<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDatesTable extends Migration
{

    public function up()
    {
        Schema::create('sale_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('percent');
            $table->text('start_date');
            $table->text('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sale_dates');
    }
}

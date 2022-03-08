<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniqueClickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_clickers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address');
            $table->date('day');
            $table->timestamps();

            $table->foreign('day')->references('day')->on('daily_clicks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unique_clickers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('swimmer_id');
            $table->integer('lane');
            $table->string('result');
            $table->timestamps();
            $table->foreign('swimmer_id')->references('id')->on('swimmers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_infos');
    }
}
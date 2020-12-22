<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSwimmerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_swimmer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreignId('member_id');
            $table->integer('lane')->unique();
            $table->string('result')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('member_id')->references('id')->on('members');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_swimmer');
    }
}
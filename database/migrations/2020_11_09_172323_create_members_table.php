<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_group_id')->nullable();            
            $table->foreignId('member_type_id');
            $table->foreignId('event_id')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->timestamp('dob');
            $table->foreignId('status_id');
            $table->string('password');
            $table->timestamps();
            $table->foreign('family_group_id')->references('id')->on('family_groups');            
            $table->foreign('member_type_id')->references('id')->on('member_types');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
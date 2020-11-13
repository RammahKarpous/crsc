<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_group_id')->nullable();
            $table->string('member_type');
            $table->string('name');
            $table->string('gender');
            $table->timestamp('dob');
            $table->foreignId('status_id');
            $table->string('password');
            $table->timestamps();
            $table->foreign('family_group_id')->references('id')->on('family_groups');
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
        Schema::dropIfExists('parents');
    }
}
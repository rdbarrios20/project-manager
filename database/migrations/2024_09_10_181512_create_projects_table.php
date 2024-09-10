<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('value');
            $table->string('zone');
            $table->string('type');
            $table->timestamp('start_date');
            $table->timestamp('ending_date');
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('goal_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('goal_id')->references('id')->on('goals');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table){
            $table->dropForeign(['card_id']);
            $table->dropForeign(['goal_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('projects');
    }
};

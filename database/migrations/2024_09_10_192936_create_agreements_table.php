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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('object');
            $table->string('description');
            $table->string('agreement_number');
            $table->string('value');
            $table->timestamp('start_date');
            $table->timestamp('ending_date');
            $table->timestamp('firm_date');
            $table->unsignedBigInteger('project_id');
            $table->bigInteger('contractor_id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::table('agreements', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['state_id']);
        });

        Schema::dropIfExists('agreements');
    }
};

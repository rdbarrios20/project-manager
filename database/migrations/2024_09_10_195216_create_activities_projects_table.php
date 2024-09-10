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
        Schema::create('activities_projects', function (Blueprint $table) {
            $table->id();
            $table->string('activity');
            $table->timestamp('start_date');
            $table->timestamp('ending_date');
            $table->string('observation');
            $table->string('state');
            $table->unsignedBigInteger('project_id');
            $table->integer('activity_project_id');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::table('activities_projects', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
        });

        Schema::dropIfExists('activities_projects');
    }
};

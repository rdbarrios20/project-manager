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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->decimal('physical_projected', 10, 2);
            $table->decimal('physical_current', 10, 2);
            $table->decimal('physical_delay');
            $table->decimal('financial_current', 10, 2);
            $table->decimal('financial_delay', 10, 2);
            $table->decimal('financial_projected', 10, 2);
            $table->string('observation');
            $table->unsignedBigInteger('project_id');
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
        Schema::table('progress', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['state_id']);
        });

        Schema::dropIfExists('progress');
    }
};

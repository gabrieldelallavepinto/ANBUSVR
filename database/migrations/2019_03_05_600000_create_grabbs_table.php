<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrabbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grabbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('scene_id');
            $table->integer('sequence');
            $table->double('timeStart');
            $table->double('timeEnd');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('scene_id')->references('id')->on('scenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grabs');
    }
}

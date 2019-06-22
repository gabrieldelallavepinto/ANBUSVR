<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGazesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gazes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->integer('sequence');
            $table->double('timeStart');
            $table->double('timeEnd');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gazes');
    }
}

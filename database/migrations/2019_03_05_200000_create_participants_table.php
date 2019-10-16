<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->string('name');
            $table->smallInteger('age')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->timestamps();

            // $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}

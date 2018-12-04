<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classrooms_id')->unsigned();
            $table->integer('academic_subjects_id')->unsigned();
            $table->integer('teachers_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('classroom_details', function (Blueprint $table) {
            $table->foreign('classrooms_id')->references('id')->on('classrooms');
        });
        Schema::table('classroom_details', function (Blueprint $table) {
            $table->foreign('academic_subjects_id')->references('id')->on('academic_subjects');
        });
        Schema::table('classroom_details', function (Blueprint $table) {
            $table->foreign('teachers_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom_details');
    }
}

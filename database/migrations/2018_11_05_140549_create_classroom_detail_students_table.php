<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomDetailStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_detail_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classrooms_details_id')->unsigned();
            $table->integer('students_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('classroom_detail_students', function (Blueprint $table) {
            $table->foreign('classrooms_details_id')->references('id')->on('classroom_details');
        });
        Schema::table('classroom_detail_students', function (Blueprint $table) {
            $table->foreign('students_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom_detail_students');
    }
}

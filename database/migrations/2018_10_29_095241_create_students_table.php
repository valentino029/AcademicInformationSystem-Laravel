<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_nis',10);
            $table->string('student_nisn',20);
            $table->string('student_name',50);
            $table->string('student_major',10);
            $table->string('student_gender',10);
            $table->integer('users_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('students',function (Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

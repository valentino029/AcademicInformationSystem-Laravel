<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('academic_subjects_code',35);
            $table->string('academic_subjects_name',30);
            $table->integer('majors_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('academic_subjects', function (Blueprint $table) {
            $table->foreign('majors_id')->references('id')->on('majors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_subjects');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_detail_students')->unsigned();
            $table->string('nama_tugas');
            $table->integer('nilai');
            $table->timestamps();
        });

        Schema::table('tugas', function (Blueprint $table) {
            $table->foreign('classroom_detail_students')->references('id')->on('classroom_detail_students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}

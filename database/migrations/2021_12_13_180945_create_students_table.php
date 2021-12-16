<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->integer('reporting_teacher_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('reporting_teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('reporting_teacher_id');
        });
        Schema::dropIfExists('students');
    }
}

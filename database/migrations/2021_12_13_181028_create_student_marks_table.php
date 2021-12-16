<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->float('maths');
            $table->float('science');
            $table->float('history');
            $table->integer('term_id')->unsigned();;
            $table->float('total_mark');
            $table->timestamps();
        });
        Schema::table('student_marks', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('term_id')->references('id')->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_marks', function (Blueprint $table) {
            $table->dropForeign('student_id');
            $table->dropForeign('term_id');
        });
        Schema::dropIfExists('student_marks');
    }
}

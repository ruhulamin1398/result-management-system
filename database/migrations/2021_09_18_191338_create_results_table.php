<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('course_id');
            $table->double('attendance_marks',8,2)->default(0);
            $table->double('class_test_marks',8,2)->default(0);
            $table->double('writtent',8,2)->default(0);
            $table->double('total_marks',8,2)->default(0);
            $table->string('letter')->default('F');
            $table->double('point',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}

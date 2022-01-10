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
            $table->id();
            $table->string('reg');
            $table->string('name')->nullable(); 
            $table->string('sex')->default('male');
            $table->text('address')->default('');
            $table->string('phone')->default('');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('department_id');
            $table->double('cgpa',8,2)->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}

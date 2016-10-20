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
            $table->string('name', 150);
            $table->date('birthdate');
            $table->string('email', 150)->unique();
            $table->string('phone', 30);
            $table->string('address', 200);
            $table->unsignedInteger('student_parent_id');
            $table->unsignedInteger('user_id');
            $table->foreign('student_parent_id')->references('id')->on('student_parents');
            $table->foreign('user_id')->references('id')->on('users');
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

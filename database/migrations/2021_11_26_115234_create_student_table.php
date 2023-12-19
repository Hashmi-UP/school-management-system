<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table)
        {
            $table->id();
            $table->string('sno');
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('fathername');
            $table->string('phone');
            $table->integer('age');
            $table->string('password');
            $table->string('gender');
            $table->string('religion');
            $table->string('email');
            $table->date('dob');
            $table->date('doj');
            $table->string('address');
            $table->string('image');
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

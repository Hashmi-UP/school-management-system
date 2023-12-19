<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacheruserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacheruser', function (Blueprint $table) {
            $table->id();
            $table->string('sno')->unique();
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->string('phone')->unique();
            $table->string('address');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('religion');
            $table->string('mainsubject');
            $table->string('password');
            $table->date('doj');
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
        Schema::dropIfExists('teacheruser');
    }
}

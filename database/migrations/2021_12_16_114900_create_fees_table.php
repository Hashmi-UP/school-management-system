<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('sno');
            $table->string('class');
            $table->integer('tutionfees');
            $table->integer('libraryfees');
            $table->integer('labfees');
            $table->integer('activitiesfees');
            $table->integer('fine')->default(0);
            $table->date('date');
            $table->date('duedate');
            $table->integer('total');
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
        Schema::dropIfExists('fees');
    }
}

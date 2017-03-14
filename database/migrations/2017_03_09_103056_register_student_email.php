<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterStudentEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_student_interest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 125);
            $table->string('subject', 325);
            $table->string('city', 325);
            $table->string('loc_name', 325);
            $table->string('lat', 20);
            $table->string('lng', 20);
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
        Schema::drop('register_student_interest');
    }
}
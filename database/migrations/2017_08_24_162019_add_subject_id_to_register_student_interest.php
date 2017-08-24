<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjectIdToRegisterStudentInterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_student_interest', function (Blueprint $table) {
            $table->integer('subjectId')->unsigned();
            $table->foreign('subjectId')->references('id')->on('sub_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_student_interest', function (Blueprint $table) {
            $table->dropForeign(['subjectId']);
        });
    }
}

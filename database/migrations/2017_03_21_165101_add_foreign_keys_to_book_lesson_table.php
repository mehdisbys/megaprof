<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookLessonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book_lesson', function(Blueprint $table)
		{
			$table->foreign('student_user_id', 'fk_studentid_booking')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subject_id', 'fk_subjectid_booking')->references('id')->on('sub_subjects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('prof_user_id', 'fk_userid_booking')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book_lesson', function(Blueprint $table)
		{
			$table->dropForeign('fk_studentid_booking');
			$table->dropForeign('fk_subjectid_booking');
			$table->dropForeign('fk_userid_booking');
		});
	}

}

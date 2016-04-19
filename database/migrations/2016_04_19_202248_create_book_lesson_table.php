<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookLessonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_lesson', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('advert_id')->unsigned()->index('fk_advert_id_idx');
			$table->integer('prof_user_id')->unsigned()->index('fk_userid_booking_idx');
			$table->integer('student_user_id')->unsigned()->nullable()->index('fk_studentid_booking_idx');
			$table->integer('subject_id')->unsigned()->nullable()->index('fk_subjectid_booking_idx');
			$table->string('answer', 5)->nullable();
			$table->string('presentation', 600);
			$table->string('date', 45)->nullable();
			$table->dateTime('pick_a_date')->nullable();
			$table->string('location')->nullable();
			$table->string('pick_a_location')->nullable();
			$table->string('client', 45)->nullable();
			$table->string('pick_a_client', 45)->nullable();
			$table->dateTime('birthdate')->nullable();
			$table->string('gender', 45)->nullable();
			$table->string('mobile', 45)->nullable();
			$table->string('addresse')->nullable();
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
		Schema::drop('book_lesson');
	}

}

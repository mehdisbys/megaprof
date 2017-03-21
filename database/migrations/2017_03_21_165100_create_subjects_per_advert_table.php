<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsPerAdvertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects_per_advert', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('advert_id')->unsigned()->nullable();
			$table->integer('subject_id')->unsigned()->nullable()->index('fk_subjectid_subjects_idx');
			$table->string('level_ids', 45)->nullable();
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
		Schema::drop('subjects_per_advert');
	}

}

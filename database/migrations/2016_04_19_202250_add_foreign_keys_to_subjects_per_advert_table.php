<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectsPerAdvertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subjects_per_advert', function(Blueprint $table)
		{
			$table->foreign('advert_id', 'fk_advertid_subjects')->references('id')->on('adverts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subject_id', 'fk_subjectid_subjects')->references('id')->on('sub_subjects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subjects_per_advert', function(Blueprint $table)
		{
			$table->dropForeign('fk_advertid_subjects');
			$table->dropForeign('fk_subjectid_subjects');
		});
	}

}

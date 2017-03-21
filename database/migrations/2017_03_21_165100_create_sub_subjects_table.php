<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_subjects', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->string('name', 100);
			$table->integer('parent_id')->unsigned()->index('sub_subjects_parent_id_foreign');
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
		Schema::drop('sub_subjects');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlaggedAdvertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flagged_adverts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('advert_id', 45)->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index('fk_userid_flagged_idx');
			$table->string('email', 75)->nullable();
			$table->string('reason', 45)->nullable();
			$table->string('comment', 500)->nullable();
			$table->string('created_at', 45)->nullable();
			$table->string('updated_at', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flagged_adverts');
	}

}

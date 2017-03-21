<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFlaggedAdvertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('flagged_adverts', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_userid_flagged')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('flagged_adverts', function(Blueprint $table)
		{
			$table->dropForeign('fk_userid_flagged');
		});
	}

}

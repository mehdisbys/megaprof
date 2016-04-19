<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('owner_advert_id', 'fk_owner_advertid_comments')->references('id')->on('adverts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('source_user_id', 'fk_sourceuserid_comments')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('target_user_id', 'fk_targetuserid_comments')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('fk_owner_advertid_comments');
			$table->dropForeign('fk_sourceuserid_comments');
			$table->dropForeign('fk_targetuserid_comments');
		});
	}

}

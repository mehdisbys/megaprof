<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAvatarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('avatar', function(Blueprint $table)
		{
			$table->foreign('advert_id', 'fk_advertid_avatar')->references('id')->on('adverts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_userid_avatar')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('avatar', function(Blueprint $table)
		{
			$table->dropForeign('fk_advertid_avatar');
			$table->dropForeign('fk_userid_avatar');
		});
	}

}

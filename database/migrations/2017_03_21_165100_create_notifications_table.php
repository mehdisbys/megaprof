<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('fk_userid_notif_idx');
			$table->integer('advert_id')->unsigned()->nullable();
			$table->string('table', 45)->nullable();
			$table->string('item_id', 45)->nullable();
			$table->string('name', 45);
			$table->string('channel', 45);
			$table->string('message');
			$table->integer('hide')->nullable()->default(0);
			$table->string('link', 455);
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
		Schema::drop('notifications');
	}

}

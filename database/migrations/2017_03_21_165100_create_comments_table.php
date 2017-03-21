<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('source_user_id')->unsigned()->index('fk_sourceuserid_comments_idx');
			$table->integer('target_user_id')->unsigned()->index('fk_targetuserid_comments_idx');
			$table->integer('owner_advert_id')->unsigned()->nullable();
			$table->string('advert_id', 45);
			$table->string('comment')->nullable();
			$table->string('stars', 45)->nullable();
			$table->dateTime('comment_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvatarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avatar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('fk_userid_avatar');
			$table->string('type')->nullable()->default('advert');
			$table->string('img_name', 45)->nullable();
			$table->string('img_mime', 45)->nullable();
			$table->integer('img_size')->nullable();
			$table->integer('img_cropped_x')->nullable();
			$table->integer('img_cropped_y')->nullable();
			$table->integer('img_cropped_w')->nullable();
			$table->integer('img_cropped_h')->nullable();
			$table->timestamps();
		});

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE avatar ADD img MEDIUMBLOB");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE avatar ADD img_cropped MEDIUMBLOB");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('avatar');
	}

}

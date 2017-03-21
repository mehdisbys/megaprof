<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->nullable();
			$table->boolean('is_admin')->nullable();
			$table->string('firstname', 45);
			$table->string('lastname', 45);
			$table->string('email')->unique();
			$table->string('avatar')->nullable();
			$table->string('telephone', 45)->nullable();
			$table->string('gender', 45)->nullable();
			$table->string('birthdate', 45)->nullable();
			$table->string('password');
			$table->string('facebook_id')->nullable();
			$table->string('confirmation_code');
			$table->string('remember_token')->nullable();
			$table->string('forgotten_token', 45)->nullable();
			$table->boolean('confirmed')->default(0);
			$table->integer('auto_created')->nullable();
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
		Schema::drop('users');
	}

}

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
			$table->string('firstname', 45);
			$table->string('lastname', 45);
			$table->string('email')->unique();
			$table->string('telephone', 45)->nullable();
			$table->string('password');
			$table->string('confirmation_code');
			$table->string('remember_token')->nullable();
			$table->string('forgotten_token', 45)->nullable();
			$table->boolean('confirmed')->default(0);
			$table->integer('auto_created')->nullable();
			$table->timestamps();
			$table->integer('premium_credit')->nullable()->default(0);
			$table->string('stripe_customer_id')->nullable();
			$table->string('last4', 4)->nullable();
			$table->integer('exp_month')->nullable();
			$table->integer('exp_year')->nullable();
			$table->string('brand', 45)->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adverts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id')->unsigned()->primary();
			$table->integer('user_id')->unsigned()->index('fk_userid_idx');
			$table->string('slug')->nullable();
			$table->string('title');
			$table->text('presentation', 65535);
			$table->text('content', 65535);
			$table->text('experience', 65535);
			$table->integer('price')->nullable();
			$table->string('price_travel_percentage', 45)->nullable();
			$table->string('price_travel', 45)->nullable();
			$table->string('price_5_hours_percentage', 45)->nullable();
			$table->string('price_5_hours', 45)->nullable();
			$table->string('price_10_hours_percentage', 45)->nullable();
			$table->string('price_10_hours', 45)->nullable();
			$table->string('price_webcam_percentage', 45)->nullable();
			$table->string('price_webcam', 45)->nullable();
			$table->text('price_more', 65535)->nullable();
			$table->string('location', 45);
			$table->string('location_lat', 45)->nullable();
			$table->string('location_long', 45)->nullable();
			$table->integer('travel_radius')->nullable();
			$table->string('location_postcode', 45)->nullable();
			$table->string('location_city', 45)->nullable();
			$table->string('location_country', 45)->nullable();
			$table->string('location_street', 45)->nullable();
			$table->string('location_house_number', 45)->nullable();
			$table->string('location_more_details', 45)->nullable();
			$table->string('can_receive', 45)->nullable();
			$table->string('can_travel', 45)->nullable();
			$table->string('can_webcam', 45)->nullable();
			$table->string('marketing_video', 512)->nullable();
			$table->dateTime('published_at')->nullable();
			$table->integer('currently_online')->nullable();
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
		Schema::drop('adverts');
	}

}

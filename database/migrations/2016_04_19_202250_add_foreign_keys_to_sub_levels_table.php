<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sub_levels', function(Blueprint $table)
		{
			$table->foreign('parent_id')->references('id')->on('levels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sub_levels', function(Blueprint $table)
		{
			$table->dropForeign('sub_levels_parent_id_foreign');
		});
	}

}

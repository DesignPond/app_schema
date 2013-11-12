<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arrows', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('projet_id');
			$table->string('topCoord_arrow');
			$table->string('leftCoord_arrow');
			$table->string('no_arrow');
			$table->string('couleurBg_arrow');
			$table->string('position');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arrows');
	}

}

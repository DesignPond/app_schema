<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boxes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('projet_id');
			$table->string('topCoord_node');
			$table->string('leftCoord_node');
			$table->string('no_node');
			$table->string('width_node');
			$table->string('height_node');
			$table->string('couleurBg_node');
			$table->text('text');
			$table->string('borderBg_node');
			$table->integer('zindex');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('boxes');
	}

}

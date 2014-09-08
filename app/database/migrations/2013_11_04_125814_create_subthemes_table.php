<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubthemesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subthemes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titre');
			$table->string('schemas');
			$table->integer('categorie_id');
			$table->integer('theme_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subthemes');
	}

}

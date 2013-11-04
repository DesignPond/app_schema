<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchemaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schema', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titre');
			$table->text('description');
			$table->string('auteur');
			$table->integer('categorie');
			$table->integer('refTheme');
			$table->integer('refSubtheme');
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
		Schema::drop('schema');
	}

}

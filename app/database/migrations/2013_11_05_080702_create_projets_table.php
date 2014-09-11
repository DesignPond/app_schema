<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projets', function(Blueprint $table) {

			$table->increments('id');
			$table->string('titre');
			$table->text('description');
			$table->integer('user_id');
			$table->integer('categorie_id');
			$table->integer('theme_id');
			$table->integer('subtheme_id');
            $table->integer('rang')->default(0);
			$table->enum('type', array('app', 'pdf'));
			$table->string('slug');
			$table->enum('status', array('actif','pending','submitted','revision'))->default('pending');
			$table->timestamps();
            $table->tinyInteger('deleted')->default(0);

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projets');
	}

}

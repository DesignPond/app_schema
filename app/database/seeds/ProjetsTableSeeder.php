<?php

class ProjetsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projets')->truncate();

		$projets = array(
		
			array( 
				'titre'      => 'Titre de test',
				'description'=> 'Description du projet de Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt accusantium doloremque laudantium, totam um fugiat quo voluptas nulla pariatur.',
				'auteur'     => 'Cindy Leschaud',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '3',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Autre titre de test',
				'description'=> 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'auteur'     => 'Jane Doe',
				'categorie'  => '1',
				'refTheme'   => '3',
				'refSubtheme'=> '6',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			)
		);

		// Uncomment the below to run the seeder
		DB::table('projets')->insert($projets);
	}

}

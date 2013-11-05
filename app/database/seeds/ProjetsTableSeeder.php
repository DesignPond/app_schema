<?php

class ProjetsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projets')->truncate();

		$projets = array(
		
			array( 
				'titre'      => 'Titre de test',
				'description'=> 'Description du projet de test',
				'auteur'     => 'Cindy Leschaud',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '3',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Autre titre de test',
				'description'=> 'Description du deuxième',
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

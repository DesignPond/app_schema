<?php

class ProjetsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projets')->truncate();

		$projets = array(
		
			array( 
				'titre'      => 'Titre de test',
				'description'=> 'Description du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremque laudantium, totam um fugiat quo voluptas nulla pariatur.',
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
				'refSubtheme'=> '2',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Troisième projet',
				'description'=> 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'auteur'     => 'John Doe',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '2',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Un quatrième beau schema',
				'description'=> 'Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'auteur'     => 'Jane Doe',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '2',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			)
		);

		// Uncomment the below to run the seeder
		DB::table('projets')->insert($projets);
	}

}

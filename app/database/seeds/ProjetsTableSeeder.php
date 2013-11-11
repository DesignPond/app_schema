<?php

class ProjetsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projets')->truncate();

		$projets = array(
		
			array( 
				'titre'      => 'Titre de test',
				'description'=> 'Description du projet de Excepteur sint occaecat officia deserunt accusantium doloremque laudantium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '3',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Autre titre de test',
				'description'=> 'Ut enim ad minim veniam, quis nostrud exe nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '3',
				'refSubtheme'=> '6',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Troisième projet',
				'description'=> 'Ut enim ad minim veniam, quis nostrud exnisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '2',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Un quatrième beau schema',
				'description'=> 'Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '2',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),		
			array( 
				'titre'      => 'Hsd de ertz',
				'description'=> 'Description du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremqntium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '2',
				'refSubtheme'=> '4',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'GDSD de ertz',
				'description'=> 'Description du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremqntium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '2',
				'refSubtheme'=> '4',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Esdr de ertz',
				'description'=> 'Description du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremqntium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '2',
				'refSubtheme'=> '4',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Dere de ertz',
				'description'=> 'Descrgion du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremqntium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '2',
				'refSubtheme'=> '4',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Audcfgdtre titre de test',
				'description'=> 'Ut enim ad minim veniam, quis nostrud exercitfgation ullamco laboris nisi ut aliquip ex ea commodo iolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '3',
				'refSubtheme'=> '5',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Troisièfdgdgme projet',
				'description'=> 'Ut enim ad minim veniam, quis nostrugnd exercitation ullamco laboris nisi ut aliquip ex et. Duis e dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie'  => '1',
				'refTheme'   => '1',
				'refSubtheme'=> '1',
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'      => 'Un quatrième behfhau schema',
				'description'=> 'Nostrud exercitatidfhon ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
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

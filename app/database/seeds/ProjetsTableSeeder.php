<?php

class ProjetsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('projets')->truncate();

		$projets = array(
		
			array( 
				'titre'       => 'Historique',
				'description' => 'Historique du droit Suisse',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '1',
				'subtheme_id' => '',
				'type'        => 'pdf',
				'slug'        => 'historique',
				'status'      => 'actif',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'       => 'Instances cantonales uniques',
				'description' => 'Compétence des tribunaux',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '2',
				'subtheme_id' => '',
				'type'        => 'pdf',
				'slug'        => 'instances_cantonales_uniques',
				'status'      => 'actif',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'       => 'Schéma projet',
				'description' => 'Ut enim ad minim veniam, quis nostrud exnisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '1',
				'subtheme_id' => '',
				'type'        => 'app',
				'slug'        => 'schema_projet',
				'status'      => 'actif',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'       => 'Un quatrième',
				'description' => 'Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit mollit anim id est laborum.',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '2',
				'subtheme_id' => '',
				'type'        => 'app',
				'slug'        => 'un_quatrieme',
				'status'      => 'brouillon',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),		
			array( 
				'titre'       => 'Principe de la bonne foi',
				'description' => 'Le principe de la bonne foi (art. 52 CPC)',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '3',
				'subtheme_id' => '',
				'type'        => 'pdf',
				'slug'        => 'principe_de_la_bonne_foi',
				'status'      => 'actif',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'       => 'Consorités',
				'description' => 'Consorités (art. 70-71 CPC)',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '4',
				'subtheme_id' => '',
				'type'        => 'pdf',
				'slug'        => 'consorites',
				'status'      => 'brouillon',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			),
			array( 
				'titre'       => 'Consorités de test',
				'description' => 'Description du projet de Excepteur sint occaecat culpa qui officia deserunt accusantium doloremqntium, totam um fugiat quo voluptas nulla pariatur.',
				'user_id'     => '1',
				'categorie_id'=> '1',
				'theme_id'    => '4',
				'subtheme_id' => '',
				'type'        => 'app',
				'status'      => 'actif',
				'slug'        => 'consorites_de_test',
				'created_at'  => date('Y-m-d G:i:s'),
				'updated_at'  => date('Y-m-d G:i:s') 
			)
		);

		// Uncomment the below to run the seeder
		DB::table('projets')->insert($projets);
	}

}

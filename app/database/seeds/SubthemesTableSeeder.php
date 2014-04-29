<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

		$subthemes = array(
			array( 'titre' => 'Historique (1)', 'categorie_id' => 1, 'theme_id' => 1),
			array( 'titre' => 'Sources (2)', 'categorie_id' => 1, 'theme_id' => 1),
			array( 'titre' => 'Champ d’application (3)', 'categorie_id' => 1, 'theme_id' => 1),
			array( 'titre' => 'Droit transitoire (4)', 'categorie_id' => 1, 'theme_id' => 1),
			array( 'titre' => 'Organisations judiciaires (5-12)', 'categorie_id' => 1, 'theme_id' => 2),
			array( 'titre' => 'Instances cantonales uniques (13)', 'categorie_id' => 1, 'theme_id' => 2),
			array( 'titre' => 'Valeur litigieuse (14)', 'categorie_id' => 1, 'theme_id' => 2),
			array( 'titre' => 'Règles générales et spéciales en mat. de fors (17-23)', 'categorie_id' => 1, 'theme_id' => 2),
			array( 'titre' => 'Récusation (24)', 'categorie_id' => 1, 'theme_id' => 2),
			array( 'titre' => 'Principes de procédure (25-32)', 'categorie_id' => 1, 'theme_id' => 3),
			array( 'titre' => 'Jugement dans un délai raisonnable (33)', 'categorie_id' => 1, 'theme_id' => 3),
		);

		// Uncomment the below to run the seeder
		DB::table('subthemes')->insert($subthemes);
	}

}

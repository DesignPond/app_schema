<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

		$subthemes = array(
			array( 'titre' => 'Sources', 'categorie_id' => '1', 'theme_id' => '1' ),
			array( 'titre' => 'Champ d\'application', 'categorie_id' => '1', 'theme_id' => '1' ),
			array( 'titre' => 'Historique', 'categorie_id' => '1', 'theme_id' => '1' ),
			array( 'titre' => 'Instances cantonales uniques', 'categorie_id' => '1', 'theme_id' => '2' ),
			array( 'titre' => 'La représentation', 'categorie_id' => '1', 'theme_id' => '3' ),
			array( 'titre' => 'Les citations', 'categorie_id' => '1', 'theme_id' => '4' ),
			array( 'titre' => 'Les sûretés', 'categorie_id' => '1', 'theme_id' => '6' )
		);

		// Uncomment the below to run the seeder
		DB::table('subthemes')->insert($subthemes);
	}

}

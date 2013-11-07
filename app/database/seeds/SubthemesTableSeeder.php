<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

		$subthemes = array(
			array( 'titre' => 'Sources', 'refCategorie' => '1', 'refTheme' => '1' ),
			array( 'titre' => 'Champ d\'application', 'refCategorie' => '1', 'refTheme' => '1' ),
			array( 'titre' => 'Instances cantonales uniques', 'refCategorie' => '1', 'refTheme' => '2' ),
			array( 'titre' => 'La représentation', 'refCategorie' => '1', 'refTheme' => '3' ),
			array( 'titre' => 'Les citations', 'refCategorie' => '1', 'refTheme' => '4' ),
			array( 'titre' => 'Les sûretés', 'refCategorie' => '1', 'refTheme' => '6' )
		);

		// Uncomment the below to run the seeder
		DB::table('subthemes')->insert($subthemes);
	}

}

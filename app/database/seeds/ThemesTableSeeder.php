<?php

class ThemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('themes')->truncate();

		$themes = array(
			array( 'titre' => 'Historique et sources', 'refCategorie' => '1' ),
			array( 'titre' => 'Compétence', 'refCategorie' => '1'),
			array( 'titre' => 'Parties', 'refCategorie' => '1'),
			array( 'titre' => 'Forme', 'refCategorie' => '1'),
			array( 'titre' => 'Délais', 'refCategorie' => '1'),
			array( 'titre' => 'Assurance accident' , 'refCategorie'=> '2'),
			array( 'titre' => 'Assurance maladie' , 'refCategorie'=> '2'),
			array( 'titre' => 'Assurance invalidité', 'refCategorie' => '2')
		);

		// Uncomment the below to run the seeder
		DB::table('themes')->insert($themes);
	}

}

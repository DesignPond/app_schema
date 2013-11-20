<?php

class ThemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('themes')->truncate();

		$themes = array(
			array( 'titre' => 'Historique et sources', 'categorie_id' => '1', 'couleur' => '#83146a' ),
			array( 'titre' => 'Compétence', 'categorie_id' => '1', 'couleur' => '#004685'  ),
			array( 'titre' => 'Principes de procédure', 'categorie_id' => '1', 'couleur' => '#004685'  ),
			array( 'titre' => 'Parties', 'categorie_id' => '1', 'couleur' => '#0092be' ),
			array( 'titre' => 'Forme', 'categorie_id' => '1' , 'couleur' =>  '#1f362f' ),
			array( 'titre' => 'Frais', 'categorie_id' => '1', 'couleur' => '#005d35' ),
			array( 'titre' => 'Délais', 'categorie_id' => '1', 'couleur' => '#57ac4a' ),
			array( 'titre' => 'Preuves', 'categorie_id' => '1', 'couleur' => '#57ac4a' ),
			array( 'titre' => 'Déroulement du procès', 'categorie_id' => '1', 'couleur' => '#e19720' ),
			array( 'titre' => 'Protection rapide', 'categorie_id' => '1', 'couleur' => '#e06a22' ),
			array( 'titre' => 'Procédures spéciales', 'categorie_id' => '1', 'couleur' => '#a84424' ),
			array( 'titre' => 'Voies de recours', 'categorie_id' => '1', 'couleur' => '#b10535' ),
			array( 'titre' => 'Exécution', 'categorie_id' => '1', 'couleur' => '#b10535' ),
			
			array( 'titre' => 'Assurance accident'  , 'categorie_id'=> '2', 'couleur' => '#000' ),
			array( 'titre' => 'Assurance maladie'   , 'categorie_id'=> '2', 'couleur' => '#000' ),
			array( 'titre' => 'Assurance invalidité', 'categorie_id' => '2', 'couleur' => '#000' )
		);

		// Uncomment the below to run the seeder
		DB::table('themes')->insert($themes);
	}

}

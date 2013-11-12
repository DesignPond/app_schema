<?php

class ThemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('themes')->truncate();

		$themes = array(
			array( 'titre' => 'Historique et sources', 'categorie_id' => '1', 'couleur' => '#8a386d' ),
			array( 'titre' => 'Compétence', 'categorie_id' => '1', 'couleur' => '#345a8c'  ),
			array( 'titre' => 'Parties', 'categorie_id' => '1', 'couleur' => '#3592b9' ),
			array( 'titre' => 'Forme', 'categorie_id' => '1' , 'couleur' =>  '#24614e' ),
			array( 'titre' => 'Délais', 'categorie_id' => '1', 'couleur' => '#5ba164' ),
			array( 'titre' => 'Assurance accident' , 'categorie_id'=> '2', 'couleur' => '#000' ),
			array( 'titre' => 'Assurance maladie' , 'categorie_id'=> '2', 'couleur' => '#000' ),
			array( 'titre' => 'Assurance invalidité', 'categorie_id' => '2', 'couleur' => '#000' )
		);

		// Uncomment the below to run the seeder
		DB::table('themes')->insert($themes);
	}

}

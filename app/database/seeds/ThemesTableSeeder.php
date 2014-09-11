<?php

class ThemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('themes')->truncate();

        $themes = array(
            array('titre' => 'Cadre général','categorie_id' => '1','couleur_primaire' => '#aa007c','couleur_secondaire' => '#f3e7f1'),
            array('titre' => 'Compétence et récusation','categorie_id' => '1','couleur_primaire' => '#005da4','couleur_secondaire' => '#e4e8f4'),
            array('titre' => 'Principes de procédure et conditions de recevabilités','categorie_id' => '1','couleur_primaire' => '#3077b8','couleur_secondaire' => '#eaedf6'),
            array('titre' => 'Objet du litige, action et parties','categorie_id' => '1','couleur_primaire' => '#009dd3','couleur_secondaire' => '#e6f4fa'),
            array('titre' => 'Forme et notification','categorie_id' => '1','couleur_primaire' => '#314f49','couleur_secondaire' => '#e3e9e7'),
            array('titre' => 'Frais et assistance judiciaire','categorie_id' => '1','couleur_primaire' => '#006e41','couleur_secondaire' => '#e0ebe4'),
            array('titre' => 'Délais','categorie_id' => '1','couleur_primaire' => '#78b74a','couleur_secondaire' => '#f1f7eb'),
            array('titre' => 'Preuves','categorie_id' => '1','couleur_primaire' => '#fcc400','couleur_secondaire' => '#fff8e7'),
            array('titre' => 'Déroulement du procès','categorie_id' => '1','couleur_primaire' => '#f2b000','couleur_secondaire' => '#fef5e5'),
            array('titre' => 'Protection rapide','categorie_id' => '1','couleur_primaire' => '#ef8600','couleur_secondaire' => '#fef1e3'),
            array('titre' => 'Procédures spéciales','categorie_id' => '1','couleur_primaire' => '#c85d23','couleur_secondaire' => '#f9ebe0'),
            array('titre' => 'Voies de recours','categorie_id' => '1','couleur_primaire' => '#a13f2e','couleur_secondaire' => '#f3e6df'),
            array('titre' => 'Exécution','categorie_id' => '1','couleur_primaire' => '#cf003f','couleur_secondaire' => '#fae7e4')
        );

		// Uncomment the below to run the seeder
		DB::table('themes')->insert($themes);
	}

}


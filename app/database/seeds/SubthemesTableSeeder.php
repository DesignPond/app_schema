<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

		$subthemes = array(
			array( 'titre' => 'Historique', 'categorie_id' => 1, 'theme_id' => 1  , 'schemas' => '1'),
			array( 'titre' => 'Sources', 'categorie_id' => 1, 'theme_id' => 1 , 'schemas' => '2'),
			array( 'titre' => 'Champ d’application', 'categorie_id' => 1, 'theme_id' => 1 , 'schemas' => '3'),
			array( 'titre' => 'Droit transitoire', 'categorie_id' => 1, 'theme_id' => 1 , 'schemas' => '4'),
			array( 'titre' => 'Organisations judiciaires', 'categorie_id' => 1, 'theme_id' => 2 , 'schemas' => '5,6,7,8,9,10,11,12'),
			array( 'titre' => 'Instances cantonales uniques', 'categorie_id' => 1, 'theme_id' => 2 , 'schemas' => '13'),
			array( 'titre' => 'Valeur litigieuse', 'categorie_id' => 1, 'theme_id' => 2 , 'schemas' => '14'),
			array( 'titre' => 'Règles générales et spéciales en mat. de fors', 'categorie_id' => 1, 'theme_id' => 2 , 'schemas' => '17,18,19,20,21,22,23'),
			array( 'titre' => 'Récusation', 'categorie_id' => 1, 'theme_id' => 2 , 'schemas' => '24'),
			array( 'titre' => 'Principes de procédure', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '25,26,27,28,29,30,31,32'),
			array( 'titre' => 'Jugement dans un délai raisonnable', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '33'),
			array( 'titre' => 'Champ d’application', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '34'),
			array( 'titre' => 'Litispendance', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '35'),
			array( 'titre' => 'Autorité de la chose jugée', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '36'),
			array( 'titre' => 'Examen des conditions de recevabilité', 'categorie_id' => 1, 'theme_id' => 3 , 'schemas' => '37'),
			array( 'titre' => 'Objet du litige', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '38'),
			array( 'titre' => 'Action', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '39,40,41,42,43'),
			array( 'titre' => 'Capacités, qualité, représentation et légitimation', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '44,45,46,47'),
			array( 'titre' => 'Actions collectives', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '48,49,50,51'),
			array( 'titre' => 'Interventions', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '52,53,54'),
			array( 'titre' => 'Substitution des parties', 'categorie_id' => 1, 'theme_id' => 4 , 'schemas' => '55'),
			array( 'titre' => 'Forme des actes', 'categorie_id' => 1, 'theme_id' => 5 , 'schemas' => '56'),
			array( 'titre' => 'Action', 'categorie_id' => 1, 'theme_id' => 5 , 'schemas' => '57'),
			array( 'titre' => 'Formalisme excessif', 'categorie_id' => 1, 'theme_id' => 5 , 'schemas' => '58'),
			array( 'titre' => 'Citations', 'categorie_id' => 1, 'theme_id' => 5 , 'schemas' => '59'),
			array( 'titre' => 'Notifications', 'categorie_id' => 1, 'theme_id' => 5 , 'schemas' => '60,61,62'),
			array( 'titre' => 'Types de frais', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '63'),
			array( 'titre' => 'Sûretés', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '64'),
			array( 'titre' => 'Répartition des frais', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '65'),
			array( 'titre' => 'Gratuité', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '66'),
			array( 'titre' => 'Assistance judiciaire', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '67,68,69'),
			array( 'titre' => 'Avocat d\'office', 'categorie_id' => 1, 'theme_id' => 6 , 'schemas' => '70'),
			array( 'titre' => 'Catégorie de délais', 'categorie_id' => 1, 'theme_id' => 7 , 'schemas' => '71'),
			array( 'titre' => 'Délais de procédure', 'categorie_id' => 1, 'theme_id' => 7 , 'schemas' => '72'),
			array( 'titre' => 'Défaut et restitution des délais', 'categorie_id' => 1, 'theme_id' => 7 , 'schemas' => '73'),
			array( 'titre' => 'Fardeau, charge et droit à la preuve', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '74,75,76'),
			array( 'titre' => 'Objet de la preuve', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '77'),
			array( 'titre' => 'Preuves illicites', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '78'),
			array( 'titre' => 'Obligation de collaborer', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '79'),
			array( 'titre' => 'Ordonnance administration, degré et appréciation', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '80'),
			array( 'titre' => 'Types de preuves', 'categorie_id' => 1, 'theme_id' => 8 , 'schemas' => '81,82,83,84,85,86'),
			array( 'titre' => 'Rôle du juge et des parties', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '87,88,89'),
			array( 'titre' => 'Conciliation', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '90,91,92,93'),
			array( 'titre' => 'Médiation', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '94,95'),
			array( 'titre' => 'Déroulement et types de procédure', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '96,97,98,99,100,101,102'),
			array( 'titre' => 'Faits et preuves nouveaux mod. des conclusions', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '103,104'),
			array( 'titre' => 'Décisions', 'categorie_id' => 1, 'theme_id' => 9 , 'schemas' => '105,106,107,108'),
			array( 'titre' => 'Mesures provisionnelles', 'categorie_id' => 1, 'theme_id' => 10 , 'schemas' => '109'),
			array( 'titre' => 'Mémoire préventif', 'categorie_id' => 1, 'theme_id' => 10 , 'schemas' => '110'),
			array( 'titre' => 'Preuve à futur', 'categorie_id' => 1, 'theme_id' => 10 , 'schemas' => '111'),
			array( 'titre' => 'Cas clairs', 'categorie_id' => 1, 'theme_id' => 10 , 'schemas' => '112,113'),
			array( 'titre' => 'Mise à ban', 'categorie_id' => 1, 'theme_id' => 10 , 'schemas' => '114'),
			array( 'titre' => 'Bail', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '115'),
			array( 'titre' => 'Travail', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '116'),
			array( 'titre' => 'Mesure protectrices', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '117,118'),
			array( 'titre' => 'Divorce', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '118,119,120,121,122,123,124'),
			array( 'titre' => 'Partenariat', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '125'),
			array( 'titre' => 'Enfants dans affaires matrimoniales', 'categorie_id' => 1, 'theme_id' => 11 , 'schemas' => '126,127'),
			array( 'titre' => 'Moyens de recours', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '128'),
			array( 'titre' => 'Appel', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '129,130'),
			array( 'titre' => 'Recours', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '131,132'),
			array( 'titre' => 'Révision', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '133,134'),
			array( 'titre' => 'Interprétation', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '135'),
			array( 'titre' => 'Recours en matière civile', 'categorie_id' => 1, 'theme_id' => 12 , 'schemas' => '136,137'),
			array( 'titre' => 'Exécution', 'categorie_id' => 1, 'theme_id' => 13 , 'schemas' => '138'),
			array( 'titre' => 'Procédure d’exécution', 'categorie_id' => 1, 'theme_id' => 13 , 'schemas' => '139'),
			array( 'titre' => 'Exécution des titres authentiques', 'categorie_id' => 1, 'theme_id' => 13, 'schemas' => '140')
		);

		// Uncomment the below to run the seeder
		DB::table('subthemes')->insert($subthemes);
	}

}

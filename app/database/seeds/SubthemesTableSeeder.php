<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

        $subthemes = array(
            array('titre' => 'Historique','categorie_id' => '1','theme_id' => '1'),
            array('titre' => 'Sources','categorie_id' => '1','theme_id' => '1'),
            array('titre' => 'Champ d’application du CPC','categorie_id' => '1','theme_id' => '1'),
            array('titre' => 'Disposition transitoire','categorie_id' => '1','theme_id' => '1'),
            array('titre' => 'Organisations judiciaires romandes','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Portée règles de compétence locale','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Valeur litigieuse','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Règles générales et spéciales en mat. de fors','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Récusation','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Principes de procédure','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Jugement dans un délai raisonnable','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Champ d’application','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Litispendance','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Autorité de la chose jugée','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Examen des conditions de recevabilité','categorie_id' => '1','theme_id' => '3'),
            array('titre' => 'Objet du litige','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Action','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Capacités, qualité, représentation et légitimation','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Actions collectives','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Interventions','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Substitution des parties','categorie_id' => '1','theme_id' => '4'),
            array('titre' => 'Forme des actes','categorie_id' => '1','theme_id' => '5'),
            array('titre' => 'Action','categorie_id' => '1','theme_id' => '5'),
            array('titre' => 'Formalisme excessif','categorie_id' => '1','theme_id' => '5'),
            array('titre' => 'Citations','categorie_id' => '1','theme_id' => '5'),
            array('titre' => 'Notifications','categorie_id' => '1','theme_id' => '5'),
            array('titre' => 'Types de frais','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Sûretés','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Répartition des frais','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Gratuité','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Assistance judiciaire','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Avocat d\'office','categorie_id' => '1','theme_id' => '6'),
            array('titre' => 'Catégorie de délais','categorie_id' => '1','theme_id' => '7'),
            array('titre' => 'Délais de procédure','categorie_id' => '1','theme_id' => '7'),
            array('titre' => 'Défaut et restitution des délais','categorie_id' => '1','theme_id' => '7'),
            array('titre' => 'Fardeau, charge et droit à la preuve','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Objet de la preuve','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Preuves illicites','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Obligation de collaborer','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Ordonnance administration, degré et appréciation','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Types de preuves','categorie_id' => '1','theme_id' => '8'),
            array('titre' => 'Rôle du juge et des parties','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Conciliation','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Médiation','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Déroulement et types de procédure','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Faits et preuves nouveaux mod. des conclusions','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Décisions','categorie_id' => '1','theme_id' => '9'),
            array('titre' => 'Mesures provisionnelles','categorie_id' => '1','theme_id' => '10'),
            array('titre' => 'Mémoire préventif','categorie_id' => '1','theme_id' => '10'),
            array('titre' => 'Preuve à futur','categorie_id' => '1','theme_id' => '10'),
            array('titre' => 'Cas clairs','categorie_id' => '1','theme_id' => '10'),
            array('titre' => 'Mise à ban','categorie_id' => '1','theme_id' => '10'),
            array('titre' => 'Bail','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Travail','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Mesure protectrices','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Divorce','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Partenariat','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Enfants dans affaires matrimoniales','categorie_id' => '1','theme_id' => '11'),
            array('titre' => 'Moyens de recours','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Appel','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Recours','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Révision','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Interprétation','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Recours en matière civile','categorie_id' => '1','theme_id' => '12'),
            array('titre' => 'Exécution','categorie_id' => '1','theme_id' => '13'),
            array('titre' => 'Procédure d’exécution','categorie_id' => '1','theme_id' => '13'),
            array('titre' => 'Exécution des titres authentiques','categorie_id' => '1','theme_id' => '13'),
            array('titre' => 'Portée des règles de compétence locale ','categorie_id' => '1','theme_id' => '2'),
            array('titre' => 'Détermination du tribunal matériellement compétent','categorie_id' => '1','theme_id' => '2')
        );
		// Uncomment the below to run the seeder
		DB::table('subthemes')->insert($subthemes);
	}

}

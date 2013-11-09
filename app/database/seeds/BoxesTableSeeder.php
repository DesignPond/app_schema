<?php

class BoxesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('boxes')->truncate();

		$boxes = array(
			array( 
				'refProjet'      => '3', 
				'topCoord_node'  => '100', 
				'leftCoord_node' => '150', 
				'no_node'        => '1', 
				'width_node'     => '60', 
				'height_node'    => '40', 
				'couleurBg_node' => '#000', 
				'text'           => '<p>Hey</p>', 
				'borderBg_node'  => '#fcfcfc', 
				'zindex'         => '10' 
			)
		);

		// Uncomment the below to run the seeder
		DB::table('boxes')->insert($boxes);
	}

}

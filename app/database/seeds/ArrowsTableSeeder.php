<?php

class ArrowsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('arrows')->truncate();

		$arrows = array(
			array( 
				'projet_id'       => '3', 
				'topCoord_arrow'  => '350', 
				'leftCoord_arrow' => '50', 
				'no_arrow'        => '1', 
				'couleurBg_arrow' => '#000', 
				'position'        => 'up'
			),
			array( 
				'projet_id'       => '3', 
				'topCoord_arrow'  => '10', 
				'leftCoord_arrow' => '10', 
				'no_arrow'        => '2', 
				'couleurBg_arrow' => '#000', 
				'position'        => 'down'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('arrows')->insert($arrows);
	}

}

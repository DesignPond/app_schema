<?php

class SubthemesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subthemes')->truncate();

		$subthemes = array();

		// Uncomment the below to run the seeder
		//DB::table('subthemes')->insert($subthemes);
	}

}

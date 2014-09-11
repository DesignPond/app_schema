<?php


class RolesTableSeeder extends Seeder {

	public function run()
	{
        // Uncomment the below to wipe the table clean before populating
        DB::table('roles')->truncate();

        $roles = array(
            array('id' => '1','name' => 'validate'),
            array('id' => '2','name' => 'assign'),
            array('id' => '3','name' => 'delete'),
            array('id' => '4','name' => 'submission')
        );

        // Uncomment the below to run the seeder
        DB::table('roles')->insert($roles);
	}

}
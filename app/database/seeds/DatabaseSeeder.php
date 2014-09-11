<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('ProjetsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ThemesTableSeeder');
		$this->call('SubthemesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('BoxesTableSeeder');
		$this->call('ArrowsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersRolesTableSeeder');
	}

}
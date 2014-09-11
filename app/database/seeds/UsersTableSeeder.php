<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = array(
			array( 
				'prenom'     => 'Cindy',
				'nom'        => 'Leschaud',
				'email'      => 'cindy.leschaud@gmail.com',
				'password'   => Hash::make('secret'),
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
			array( 
				'prenom'     => 'François',
				'nom'        => 'Bohnet',
				'email'      => 'francois.bohnet@unine.ch',
				'password'   => Hash::make('secret'),
				'created_at' => date('Y-m-d G:i:s'),
				'updated_at' => date('Y-m-d G:i:s') 
			),
            array(
                'prenom'     => 'Luca',
                'nom'        => 'Melcarne',
                'email'      => 'luca.melcarne@unine.ch',
                'password'   => Hash::make('schemas2014'),
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')
            )
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}

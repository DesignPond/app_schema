<?php

class UsersRolesTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users_roles')->truncate();

        $users_roles = array(
            array('user_id' => '1','role_id' => '1'),
            array('user_id' => '1','role_id' => '2'),
            array('user_id' => '1','role_id' => '3'),
            array('user_id' => '1','role_id' => '4')
        );

        // Uncomment the below to run the seeder
        DB::table('users_roles')->insert($users_roles);

    }

}
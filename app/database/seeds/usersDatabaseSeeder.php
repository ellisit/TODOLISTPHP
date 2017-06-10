<?php

class usersDatabaseSeeder extends seeder {

    public function run() {

        DB::table('users')->delete();

        $users = array (
            array (
                'name' => 'Terry',
                'password' => Hash::make('terry'),
                'email' => 'toto@email.fr'
            )
        );
        

        DB::table('users')->insert($users);
    }
}
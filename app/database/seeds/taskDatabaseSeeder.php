<?php

class taskDatabaseSeeder extends seeder {

    public function run() {

        DB::table('task')->delete();

        $task = array (
            array (
                'user-id' => 1 ,
                'content' => 'pick up milk',
                'done' => false
            ),

             array (
                'user-id' => 1 ,
                'content' => 'finir laravel todolist',
                'done' => true
            )
        );
        

        DB::table('task')->insert($task);
    }
}
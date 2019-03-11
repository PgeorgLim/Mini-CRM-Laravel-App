<?php

use Illuminate\Database\Seeder;

class UserLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userlevels')->insert([
            'name' => 'admin',
            'level' => 1,
            'description' => 'Admin level. Has access to everything.'
        ]);

        DB::table('userlevels')->insert([
                'name' => 'normal',
                'level' => 2,
                'description' => 'Normal user'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Start extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'entity_id' => 1,
            'name' => 'Admin',
            'identification' => '123',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);

        DB::table('entities')->insert([
            'user_id' => 1,
            'name' => 'Start',
            'description' => 'start description',
            'windows' => '5'
        ]);

        DB::table('services')->insert([
            'user_id' => 1,
            'entity_id' => 1,
            'code' => 'P1',
            'name' => 'Prueba 1',
            'description' => 'P1 description',
            'window' => '1'
        ]);

    }
}

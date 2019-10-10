<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'dlh',
            'email' => 'admin@tapo.com',
            'role_id' => 1,
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'name' => 'semai',
            'email' => 'semai@tapo.com',
            'role_id' => 2,
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'name' => 'Verdy Bangkit',
            'email' => 'verdybangkit@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('password')
        ]);
    }
}

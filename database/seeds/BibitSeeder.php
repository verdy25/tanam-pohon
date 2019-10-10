<?php

use Illuminate\Database\Seeder;

class BibitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bibits')->insert([
            'bibit' => 'durian',
            'kuota' => 5000
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'nangka',
            'kuota' => 7000
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'kelengkeng',
            'kuota' => 10000
        ]);
    }
}

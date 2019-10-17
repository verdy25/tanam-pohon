<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BibitSeeder::class);
        $this->call(StatusPengajuanSeeder::class);
        $this->call(CiriSedeer::class);
        $this->call(KondisiSeeder::class);
    }
}

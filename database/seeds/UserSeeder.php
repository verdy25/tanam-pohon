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

        DB::table('masyarakats')->insert([
            'nama' => 'Verdy Bangkit',
            'email' => 'verdybangkit@gmail.com',
            'alamat' => 'Jln. danau toba 47A',
            'user_id' => 3,
            'tempat_lahir' => 'Magetan',
            'tanggal_lahir' => '1998-06-26',
            'hp' => '+62895601673628',
            'provinsi_id' => 35,
            'kabupaten_id' => 3520,
            'kecamatan_id' => 3520060
        ]);

        DB::table('masyarakats')->insert([
            'nama' => 'Admin',
            'email' => 'admin@tapo.com',
            'alamat' => 'Jln. danau toba 47A',
            'user_id' => 1,
            'tempat_lahir' => 'Magetan',
            'tanggal_lahir' => '1998-06-26',
            'hp' => '+6289560167328',
            'provinsi_id' => 35,
            'kabupaten_id' => 3520,
            'kecamatan_id' => 3520060
        ]);

        DB::table('masyarakats')->insert([
            'nama' => 'semai',
            'email' => 'semai@tapo.com',
            'alamat' => 'Jln. danau toba 47A',
            'user_id' => 2,
            'tempat_lahir' => 'Magetan',
            'tanggal_lahir' => '1998-06-26',
            'hp' => '+628956016628',
            'provinsi_id' => 35,
            'kabupaten_id' => 3520,
            'kecamatan_id' => 3520060
        ]);
    }
}

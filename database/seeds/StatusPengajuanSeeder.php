<?php

use Illuminate\Database\Seeder;

class StatusPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pengajuans')->insert([
            'status' => 'belum disetujui'
        ]);

        DB::table('status_pengajuans')->insert([
            'status' => 'tidak disetujui'
        ]);

        DB::table('status_pengajuans')->insert([
            'status' => 'disetujui'
        ]);

        DB::table('status_pengajuans')->insert([
            'status' => 'bibit diterima'
        ]);

        DB::table('status_pengajuans')->insert([
            'status' => 'telah ditanam'
        ]);

        DB::table('status_pengajuans')->insert([
            'status' => 'tidak ditanam'
        ]);
    }
}

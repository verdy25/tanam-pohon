<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert(
            [
                [
                    'kategori' => 'erosi'
                ],
                [
                    'kategori' => 'iklim'
                ],
                [
                    'kategori' => 'kemiringan tanah'
                ],
                [
                    'kategori' => 'penahan air'
                ],
                [
                    'kategori' => 'banjir'
                ],
                [
                    'kategori' => 'pengolahan tanah'
                ],
                [
                    'kategori' => 'natrium'
                ]
            ]
        );
    }
}

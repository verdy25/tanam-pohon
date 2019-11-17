<?php

use Illuminate\Database\Seeder;

class CiriSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lahan_ciris')->insert(
            [
                [
                    'ciri' => 'Mempunyai topografi atau permukaan hampir datar',
                    'kategori_id' => null,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi kecil',
                    'kategori_id' => 1,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kedalaman tanah 0-30 cm',
                    'kategori_id' => null,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pengolahan tanah baik',
                    'kategori_id' => 6,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kapasitas menahan air baik',
                    'kategori_id' => 4,
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Memiliki tanah yang subur',
                    'kategori_id' => null,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Tidak terancam banjir',
                    'kategori_id' => 5,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Keadaan iklim yang sesuai',
                    'kategori_id' => 2,
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng landai, kemiringan ≤ 30%',
                    'kategori_id' => 3,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi sedang',
                    'kategori_id' => 1,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pengolahan tanah kurang baik',
                    'kategori_id' => 6,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pernah terkena banjir',
                    'kategori_id' => 5,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Kelebihan air',
                    'kategori_id' => null,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Keadaan iklim kurang sesuai',
                    'kategori_id' => 2,
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng miring atau bergelombang, kemiringan ≤50%',
                    'kategori_id' => 3,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi agak berat',
                    'kategori_id' => 1,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Sering mengalami banjir',
                    'kategori_id' => 5,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Memiliki tanah yang basah',
                    'kategori_id' => null,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kapasitas menahan air rendah',
                    'kategori_id' => 4,
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Mengandung natrium rendah',
                    'kategori_id' => 7,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Keadaan iklim tidak sesuai',
                    'kategori_id' => 2,
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng curam atau berbukit, kemiringan ≥ 50%',
                    'kategori_id' => 3,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi berat',
                    'kategori_id' => 1,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Lahan tergenang air',
                    'kategori_id' => null,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Lahan berbatu',
                    'kategori_id' => null,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Mengandung natrium tinggi',
                    'kategori_id' => 7,
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Ancaman erosi sangat berat (erosi parit)',
                    'kategori_id' => 1,
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Daerah perakaran sangat dangkal',
                    'kategori_id' => null,
                    'bobot' => 5
                ]
            ]
        );
    }
}

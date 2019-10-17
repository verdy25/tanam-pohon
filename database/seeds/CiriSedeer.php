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
                    'pertanyaan' => 'Permukaan lahan anda hampir datar (tidak miring)',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi kecil',
                    'pertanyaan' => 'Erosi tidak pernah terjadi',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kedalaman tanah 0-30 cm',
                    'pertanyaan' => 'Kedalaman tanah 0-30 cm',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pengolahan tanah baik',
                    'pertanyaan' => 'Pengolahan tanah baik',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kapasitas menahan air baik',
                    'pertanyaan' => 'Tanah dapat menahan air dengan baik',
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Memiliki tanah yang subur',
                    'pertanyaan' => 'Tanah subur',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Tidak terancam banjir',
                    'pertanyaan' => 'Banjir tidak pernah terjadi',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Keadaan iklim yang sesuai',
                    'pertanyaan' => 'Iklim normal',
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng landai, kemiringan ≤ 30%',
                    'pertanyaan' => 'Kemiringan lahan ≤ 30%',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi sedang',
                    'pertanyaan' => 'Erosi jarang terjadi',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pengolahan tanah kurang baik',
                    'pertanyaan' => 'Pengolahan tanah kurang baik',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Pernah terkena banjir',
                    'pertanyaan' => 'Banjir pernah terjadi, tetapi tidak sering',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Kelebihan air',
                    'pertanyaan' => 'Kelebihan air',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Keadaan iklim kurang sesuai',
                    'pertanyaan' => 'Iklim normal, kadang tidak normal',
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng miring atau bergelombang, kemiringan ≤50%',
                    'pertanyaan' => 'Kemiringan lahan ≤ 50%',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi agak berat',
                    'pertanyaan' => 'Erosi sering terjadi',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Sering mengalami banjir',
                    'pertanyaan' => 'Banjir sering terjadi',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Memiliki tanah yang basah',
                    'pertanyaan' => 'Tanah basah',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Kapasitas menahan air rendah',
                    'pertanyaan' => 'Tanah kurang bisa menyerap air',
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Mengandung natrium rendah',
                    'pertanyaan' => 'Lahan mengandung natrium rendah',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Keadaan iklim tidak sesuai',
                    'pertanyaan' => 'Iklim tidak normal',
                    'bobot' => 1
                ],
                [
                    'ciri' => 'Lereng curam atau berbukit, kemiringan ≥ 50%',
                    'pertanyaan' => 'Kemiringan lahan ≥ 50%',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Ancaman erosi berat',
                    'pertanyaan' => 'Erosi sangat sering terjadi',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Lahan tergenang air',
                    'pertanyaan' => 'Lahan tergenang air',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Lahan berbatu',
                    'pertanyaan' => 'Lahan berbatu',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Mengandung natrium tinggi',
                    'pertanyaan' => 'Lahan mengandung natrium tinggi',
                    'bobot' => 3
                ],
                [
                    'ciri' => 'Ancaman erosi sangat berat (erosi parit)',
                    'pertanyaan' => 'Pernah terjadi erosi parit',
                    'bobot' => 5
                ],
                [
                    'ciri' => 'Daerah perakaran sangat dangkal',
                    'pertanyaan' => 'Daerah perakaran sangat dangkal',
                    'bobot' => 5
                ]
            ]
        );
    }
}

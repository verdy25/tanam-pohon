<?php

use App\LahanCiri;
use App\LahanKondisi;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('lahan_kondisis')->insert([
            [
                'kondisi' => 'Lahan Kelas I',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas I, dimana lahan ini dapat digunakan untuk semua jenis penggunaan, mulai dari pertanian yang sangat intensif untuk tanaman semusim dan juga tahunan sampai penggunaan untuk hutan lindung. Walaupun demikian, jenis lahan ini tetap memerlukan tindakan untuk mempertahankan produktivitas berupa pemeliharaan kesuburan dan struktur tanah. Upaya ini meliputi pemupukan baik dengan pupuk buatan maupun pupuk organic (pupuk kandang dan pupuk hijau), pergiliran tanaman, dan penggunaan tanaman penutup tanah.'
            ],
            [
                'kondisi' => 'Lahan Kelas II',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas II, lahan ini dapat digunakan untuk tanaman semusim, selain pemupukan, tanah pada lahan ini juga mungkin memerlukan tindakan konservasi seperti pembuatan guludan, penanaman dalam setrip, pengolahan menurut kontur, dan pergiliran tanaman. '
            ],
            [
                'kondisi' => 'Lahan Kelas III',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas III. Pada lahan ini, pilihan penggunaannya lebih sempit, dimana lahan ini tidak dapat digunakan untuk system pertanian,. Pada lahan ini hanya dapat diterapkan mulai penggarapan secara sedang dan seterusnya sampai penggunaan untuk cagar alam. Lahan kelas III masih dapat dipergunakan untuk tanaman semusim dan tanaman yang memerlukan pengolahan tanah, tetapi pengolahan ini juga harus diimbangi dengan usaha konservasi, jenis upaya konservasi dapat berupa guludan bersaluran, penanaman dalam setrip, penggunaan mulsa, pergiliran tanaman, pembuatan teras ataupun kombinasi dari usaha konservasi tersebut.'
            ],
            [
                'kondisi' => 'Lahan Kelas IV',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas IV. Lahan pada kelas ini tidak dapat digunakan untuk system untuk pertanian yang intensif dan garapan sedang. Lahan ini hanya dapat digarap secara terbatas, untuk penggembalaan intensif sampai hutan lindung. Selain upaya untuk memelihara kesuburan kondisi fisik tanah, perlu juga dilakukan pembuatan teras bangku, saluran bervegetasi, dan dam penghambat.'
            ],
            [
                'kondisi' => 'Lahan Kelas V',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas V. Kondisi lahan seperti ini biasanya tidak dapat ditanami dengan tanaman semusim, tetapi masih dapat ditumbuhi rumput atau pepohonan. Lahan pada kelas ini tidak cocok untuk digarap.'
            ],
            [
                'kondisi' => 'Lahan Kelas VI',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas VI. Lahan ini tidak dapat digunakan untuk pertanian, lahan ini hanya dapat digunakan untuk tanaman rumput atau padang penggembalaan, hutan produksi, dan hutan lindung. Bahkan jika digunakan sebagai padang penggembalaan dan hutan produksi pun, harus dikelola dengan baik untuk menghindari terjadinya erosi.'
            ],
            [
                'kondisi' => 'Lahan Kelas VII',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas VII. Jika lahan ini digunakan untukpadang rumput atau hutan produksi harus diimbangi dengan usaha pencegahan erosi yang berat. Tindakan yang perlu dilakukan misalnya dengan membuat teras bangku yang ditunjang dengan cara-cara vegetatif untuk konservasi tanah. Selain itu, tentunya perlu dijaga kesuburan dan struktur tanahnya dengan melakukan pemupukan secara rutin. '
            ],
            [
                'kondisi' => 'Lahan Kelas VIII',
                'penanganan' => 'Anda memiliki Lahan dengan kategori Kelas VIII. Jenis lahan ini sama sekali tidak sesuai untuk budidaya pertanian, lahan jenis ini paling cocok digunakan untuk hutan lindung atau cagar alam yang sekaligus dapat berfungsi sebagai tempat rekreasi karena keadaan alamnya yang lebih alami'
            ]
        ]);

        DB::table('lahan_ciri_lahan_kondisi')->insert([
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 1
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 2
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 3
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 4
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 5
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 6
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 7
            ],
            [
                'lahan_kondisi_id' => 1,
                'lahan_ciri_id' => 8
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 9
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 10
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 11
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 12
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 13
            ],
            [
                'lahan_kondisi_id' => 2,
                'lahan_ciri_id' => 14
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 15
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 16
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 17
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 18
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 19
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 20
            ],
            [
                'lahan_kondisi_id' => 3,
                'lahan_ciri_id' => 21
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 22
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 23
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 24
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 19
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 26
            ],
            [
                'lahan_kondisi_id' => 4,
                'lahan_ciri_id' => 21
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 1
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 2
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 24
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 17
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 25
            ],
            [
                'lahan_kondisi_id' => 5,
                'lahan_ciri_id' => 14
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 22
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 23
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 26
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 28
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 20
            ],
            [
                'lahan_kondisi_id' => 6,
                'lahan_ciri_id' => 21
            ],
            [
                'lahan_kondisi_id' => 7,
                'lahan_ciri_id' => 28
            ],
            [
                'lahan_kondisi_id' => 7,
                'lahan_ciri_id' => 22
            ],
            [
                'lahan_kondisi_id' => 7,
                'lahan_ciri_id' => 27
            ],
            [
                'lahan_kondisi_id' => 8,
                'lahan_ciri_id' => 22
            ],
            [
                'lahan_kondisi_id' => 8,
                'lahan_ciri_id' => 25
            ],
            [
                'lahan_kondisi_id' => 8,
                'lahan_ciri_id' => 19
            ],
        ]);
    }
}

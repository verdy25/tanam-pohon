<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
            'bibit' => 'durian montong',
            'kuota' => 5000,
            'panen' => Carbon::create('2000', '01', '01'),
            'deskripsi' => 'Durian montong ini adalah jenis durian yang paling terkenal di Indonesia. Bahkan untuk satu biji dengan balutan daging di atasnya saja, dijual dengan harga yang cukup mahal jika dikurskan dalam Rupiah. Buah asli Kalimantan ini memiliki ciri khas dagingnya yang cukup besar dengan rasa manis dan juga beraroma harum ketika dibuka.
            Selain itu, ciri khas lainnya adalah bentuknya tidak bulat penuh, melainkan sedikit lonjong dengan tidak beraturan. Jika sudah siap petik, Durian Montong dapat memiliki berat kurang lebih 13 kilogram.'
        ]);

        DB::table('bibits')->insert([
            'bibit' => 'nangka',
            'kuota' => 7000,
            'panen' => Carbon::create('2000', '01', '01'),
            'deskripsi' => 'Nangka yang ditanam merupakan jenis nangka bubur. Nangka bubur yaitu nangka dengan daging buah tipis, berserat, lunak dan membubur, rasanya asam manis, dan berbau harum tajam.'
        ]);

    }
}

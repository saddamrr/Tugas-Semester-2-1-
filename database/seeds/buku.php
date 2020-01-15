<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku::insert([
            [
                'judul'=>'SAKIT',
                'penerbit'=>'homeproducing',
                'pengarang'=>'Saddam',
                'foto'=>'-'
            ],
            [
                'judul'=>'KAO',
                'penerbit'=>'homeproducing',
                'pengarang'=>'OAOE',
                'foto'=>'-'
            ],
            [
                'judul'=>'PETCAH PALA KAO',
                'penerbit'=>'homeproducing',
                'pengarang'=>'Lian Kwang',
                'foto'=>'-'
            ],
            [
                'judul'=>'YOI GAN',
                'penerbit'=>'homeproducing',
                'pengarang'=>'Macho Grup',
                'foto'=>'-'
            ],
            [
                'judul'=>'SWEGAR',
                'penerbit'=>'homeproducing',
                'pengarang'=>'Larutan Cap Kaki 3',
                'foto'=>'-'
            ]
        ]);
    }
}

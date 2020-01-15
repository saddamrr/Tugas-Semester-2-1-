<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota::insert([
            [
                'nama_anggota'=>'saddam',
                'alamat'=>'Jl.Jenderal Soedirman',
                'notelp'=>'082140322',
            ],
            [
                'nama_anggota'=>'raihan',
                'alamat'=>'Jl.Jenderal Soekarno',
                'notelp'=>'082140322',
            ],
            [
                'nama_anggota'=>'Yoi',
                'alamat'=>'Jl.Jenderal ABC',
                'notelp'=>'082140322',
            ],
            [
                'nama_anggota'=>'OAOE',
                'alamat'=>'Jl.Jenderal EFG',
                'notelp'=>'082140322',
            ],
            [
                'nama_anggota'=>'BL0cks',
                'alamat'=>'Jl.Jenderal HIJ',
                'notelp'=>'082140322',
            ]
        ]);
    }
}

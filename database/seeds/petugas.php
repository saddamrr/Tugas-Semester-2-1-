<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::insert([
            [
                'nama_petugas'=>'Udin',
                'alamat'=>'Jl.Jakarta-Bandung',
                'notelp'=>'08214032',
                'username'=>'123456',
                'password'=>'123456',
            ],
            [
                'nama_petugas'=>'Samrudin',
                'alamat'=>'Jl.Jakarta-Bandung',
                'notelp'=>'08214032',
                'username'=>'123456',
                'password'=>'123456',
            ],
            [
                'nama_petugas'=>'Siyan',
                'alamat'=>'Jl.Jakarta-Bandung',
                'notelp'=>'08214032',
                'username'=>'123456',
                'password'=>'123456',
            ],
            [
                'nama_petugas'=>'Nobita',
                'alamat'=>'Jl.Jakarta-Bandung',
                'notelp'=>'08214032',
                'username'=>'123456',
                'password'=>'123456',
            ],
            [
                'nama_petugas'=>'Shizuka',
                'alamat'=>'Jl.Jakarta-Bandung',
                'notelp'=>'08214032',
                'username'=>'123456',
                'password'=>'123456',
            ]
        ]);
    }
}

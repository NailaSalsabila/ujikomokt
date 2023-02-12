<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1'),
            'role'=>'admin'
        ]);

        kategori::create([
            'name'=>'Leptop'
        ]);
        kategori::create([
            'name'=>'Gedjet'
        ]);
        kategori::create([
            'name'=>'Memasak'
        ]);

        produk::create([
            'kategori_id'=>1,
            'name'=>'Axio Leptop',
            'harga'=>300000,
            'foto'=>'img/axio.jpg',
            'keterangan'=>'Laptop teknologi canggih'
        ]);
        produk::create([
            'kategori_id'=>2,
            'name'=>'Iphone Pro 11',
            'harga'=>1800000,
            'foto'=>'img/iphone11.jpg',
            'keterangan'=>'Hp para artist'
        ]);
        produk::create([
            'kategori_id'=>1,
            'name'=>'Majikom',
            'harga'=>600000,
            'foto'=>'img/majik.jpg',
            'keterangan'=>'Memasak dengan mudah'
        ]);
    }
}

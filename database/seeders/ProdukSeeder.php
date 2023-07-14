<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            [
            'nama_produk' => 'Selada Segar',
            'harga_produk' => 20000,
            'id_kategori' => 1,
            'id_user' => 8,
            'varietas_produk' => 'Nauli F1',
            'panen_usia' => '30-35 hari',
            'bobot_rata_rata' => '80-110 gr',
            'ks_ruangan' => '3 hari',
            'ks_kulkas' => '10 hari',
            'pestisida' => '14 hari pra panen',
            'deskripsi_produk' => '
            freestar
            
            freestar
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel magna tempus, egestas lectus at, semper sapien. Pellentesque placerat fermentum.',
            'kapasitas_produksi' => Str::random(10),
            'opsi_pengiriman' => 'Kirim Langsung',
            'photo_produk_1' => 'Selada.jpg',
            'photo_produk_2' => 'Selada2.jpg',
            'photo_produk_3' => 'Lettuce.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'nama_produk' => 'Pakcoy Segar',
            'harga_produk' => 19000,
            'id_kategori' => 1,
            'id_user' => 6,
            'varietas_produk' => 'Nauli F1',
            'panen_usia' => '30-35 hari',
            'bobot_rata_rata' => '80-110 gr',
            'ks_ruangan' => '3 hari',
            'ks_kulkas' => '10 hari',
            'pestisida' => '14 hari pra panen',
            'deskripsi_produk' => '
            freestar
            
            freestar
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel magna tempus, egestas lectus at, semper sapien. Pellentesque placerat fermentum.',
            'kapasitas_produksi' => Str::random(10),
            'opsi_pengiriman' => 'Kirim Langsung',
            'photo_produk_1' => 'Selada.jpg',
            'photo_produk_2' => 'Selada2.jpg',
            'photo_produk_3' => 'Lettuce.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'nama_produk' => 'Kaisim Segar',
            'harga_produk' => 18000,
            'id_kategori' => 1,
            'id_user' => 6,
            'varietas_produk' => 'Nauli F1',
            'panen_usia' => '30-35 hari',
            'bobot_rata_rata' => '80-110 gr',
            'ks_ruangan' => '3 hari',
            'ks_kulkas' => '10 hari',
            'pestisida' => '14 hari pra panen',
            'deskripsi_produk' => '
            freestar
            
            freestar
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel magna tempus, egestas lectus at, semper sapien. Pellentesque placerat fermentum.',
            'kapasitas_produksi' => Str::random(10),
            'opsi_pengiriman' => 'Kirim Langsung',
            'photo_produk_1' => 'Selada.jpg',
            'photo_produk_2' => 'Selada2.jpg',
            'photo_produk_3' => 'Lettuce.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'nama_produk' => 'Kangkung Segar',
            'harga_produk' => 17000,
            'id_kategori' => 1,
            'id_user' => 7,
            'varietas_produk' => 'Nauli F1',
            'panen_usia' => '30-35 hari',
            'bobot_rata_rata' => '80-110 gr',
            'ks_ruangan' => '3 hari',
            'ks_kulkas' => '10 hari',
            'pestisida' => '14 hari pra panen',
            'deskripsi_produk' => '
            freestar
            
            freestar
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel magna tempus, egestas lectus at, semper sapien. Pellentesque placerat fermentum.',
            'kapasitas_produksi' => Str::random(10),
            'opsi_pengiriman' => 'Kirim Langsung',
            'photo_produk_1' => 'Selada.jpg',
            'photo_produk_2' => 'Selada2.jpg',
            'photo_produk_3' => 'Lettuce.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]
        ]);

    }
}

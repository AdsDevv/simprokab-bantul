<?php

namespace Database\Seeders;

use App\Models\Pengrajin;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Pengrajin
        $p1 = Pengrajin::create([
            'nama_pengrajin' => 'Bapak Sutomo',
            'jenis_kerajinan' => 'Gerabah Kasongan',
            'alamat' => 'Kasongan, Bantul, Yogyakarta',
            'kontak' => '081234567890'
        ]);

        $p2 = Pengrajin::create([
            'nama_pengrajin' => 'Ibu Hartini',
            'jenis_kerajinan' => 'Batik Tulis',
            'alamat' => 'Imogiri, Bantul, Yogyakarta',
            'kontak' => '089876543210'
        ]);

        $p3 = Pengrajin::create([
            'nama_pengrajin' => 'Mas Budi Leather',
            'jenis_kerajinan' => 'Kerajinan Kulit',
            'alamat' => 'Manding, Bantul, Yogyakarta',
            'kontak' => '085678901234'
        ]);

        // 2. Buat Data Produk 
        
        // Produk milik Pak Sutomo ($p1)
        Produk::create([
            'pengrajin_id' => $p1->id,
            'nama_produk' => 'Guci Tanah Liat Motif Naga',
            'harga' => 150000,
            'stok' => 10,
            'deskripsi' => 'Guci hias asli tanah liat Kasongan dengan ukiran tangan.',
            'foto' => null // Foto dikosongi dulu
        ]);
        Produk::create([
            'pengrajin_id' => $p1->id,
            'nama_produk' => 'Pot Bunga Minimalis',
            'harga' => 25000,
            'stok' => 50,
            'deskripsi' => 'Pot bunga kecil cocok untuk tanaman kaktus.',
            'foto' => null
        ]);

        // Produk milik Bu Hartini ($p2)
        Produk::create([
            'pengrajin_id' => $p2->id,
            'nama_produk' => 'Kain Batik Motif Parang',
            'harga' => 350000,
            'stok' => 5,
            'deskripsi' => 'Batik tulis asli pewarna alami.',
            'foto' => null
        ]);

        // Produk milik Mas Budi ($p3)
        Produk::create([
            'pengrajin_id' => $p3->id,
            'nama_produk' => 'Dompet Kulit Pria',
            'harga' => 120000,
            'stok' => 20,
            'deskripsi' => 'Dompet kulit sapi asli awet bertahun-tahun.',
            'foto' => null
        ]);
    }
}
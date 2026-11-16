<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
        public static function semua(): array
    {
        return [
            // Bahan Pokok
            ['kode' => 'BP-001', 'nama' => 'Beras Premium 5 kg',  'kategori' => 'Bahan Pokok', 'satuan' => 'karung', 'harga_beli' => 68000, 'stok_awal' => 40, 'barang_masuk' => 20, 'barang_keluar' => 52, 'stok_minimum' => 10, 'stok_target' => 50, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Beras%20Premium%20.webp'],
            ['kode' => 'BP-002', 'nama' => 'Minyak Goreng 2 L',    'kategori' => 'Bahan Pokok', 'satuan' => 'botol',  'harga_beli' => 36000, 'stok_awal' => 30, 'barang_masuk' => 0,  'barang_keluar' => 30, 'stok_minimum' => 12, 'stok_target' => 48, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Minyak%20Goreng.webp'],
            ['kode' => 'BP-003', 'nama' => 'Gula Pasir 1 kg',      'kategori' => 'Bahan Pokok', 'satuan' => 'bungkus','harga_beli' => 16500, 'stok_awal' => 50, 'barang_masuk' => 30, 'barang_keluar' => 20, 'stok_minimum' => 15, 'stok_target' => 60, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Gula%20Pasir.avif'],
            ['kode' => 'BP-004', 'nama' => 'Tepung Terigu 1 kg',   'kategori' => 'Bahan Pokok', 'satuan' => 'bungkus','harga_beli' => 12000, 'stok_awal' => 25, 'barang_masuk' => 10, 'barang_keluar' => 22, 'stok_minimum' => 10, 'stok_target' => 40, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Tepung%20Terigu.avif'],
            ['kode' => 'BP-005', 'nama' => 'Telur Ayam 1 kg',      'kategori' => 'Bahan Pokok', 'satuan' => 'kg',     'harga_beli' => 28000, 'stok_awal' => 20, 'barang_masuk' => 40, 'barang_keluar' => 35, 'stok_minimum' => 10, 'stok_target' => 45, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Telur%20Ayam.avif'],

            // Minuman
            ['kode' => 'MN-001', 'nama' => 'Air Mineral 600 ml (dus)', 'kategori' => 'Minuman', 'satuan' => 'dus',    'harga_beli' => 42000, 'stok_awal' => 30, 'barang_masuk' => 20, 'barang_keluar' => 18, 'stok_minimum' => 10, 'stok_target' => 40, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Air%20Mineral.avif'],
            ['kode' => 'MN-002', 'nama' => 'Teh Celup Isi 25',         'kategori' => 'Minuman', 'satuan' => 'kotak',  'harga_beli' => 6500,  'stok_awal' => 60, 'barang_masuk' => 0,  'barang_keluar' => 55, 'stok_minimum' => 20, 'stok_target' => 80, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Teh%20Celup.webp'],
            ['kode' => 'MN-003', 'nama' => 'Kopi Bubuk 200 g',         'kategori' => 'Minuman', 'satuan' => 'bungkus','harga_beli' => 18000, 'stok_awal' => 45, 'barang_masuk' => 15, 'barang_keluar' => 20, 'stok_minimum' => 15, 'stok_target' => 55, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Kopi%20Bubuk.webp'],
            ['kode' => 'MN-004', 'nama' => 'Susu Kental Manis',        'kategori' => 'Minuman', 'satuan' => 'kaleng', 'harga_beli' => 11500, 'stok_awal' => 36, 'barang_masuk' => 12, 'barang_keluar' => 40, 'stok_minimum' => 12, 'stok_target' => 50, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Susu%20Kental%20Manis.webp'],

            // Makanan Ringan
            ['kode' => 'MR-001', 'nama' => 'Keripik Singkong',   'kategori' => 'Makanan Ringan', 'satuan' => 'pak',    'harga_beli' => 9000,  'stok_awal' => 80, 'barang_masuk' => 40, 'barang_keluar' => 90, 'stok_minimum' => 25, 'stok_target' => 100, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Keripik%20Singkong.avif'],
            ['kode' => 'MR-002', 'nama' => 'Biskuit Kelapa',     'kategori' => 'Makanan Ringan', 'satuan' => 'bungkus','harga_beli' => 7500,  'stok_awal' => 50, 'barang_masuk' => 30, 'barang_keluar' => 25, 'stok_minimum' => 20, 'stok_target' => 70, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Biskuit%20Kelapa.avif'],
            ['kode' => 'MR-003', 'nama' => 'Wafer Cokelat',      'kategori' => 'Makanan Ringan', 'satuan' => 'bungkus','harga_beli' => 5000,  'stok_awal' => 40, 'barang_masuk' => 0,  'barang_keluar' => 40, 'stok_minimum' => 20, 'stok_target' => 80, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Wafer%20Cokelat.avif'],
            ['kode' => 'MR-004', 'nama' => 'Kacang Atom',        'kategori' => 'Makanan Ringan', 'satuan' => 'pak',    'harga_beli' => 8000,  'stok_awal' => 35, 'barang_masuk' => 20, 'barang_keluar' => 12, 'stok_minimum' => 15, 'stok_target' => 50, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Kacang%20Atom.webp'],

            // Perlengkapan Toko
            ['kode' => 'PT-001', 'nama' => 'Kantong Plastik Kecil', 'kategori' => 'Perlengkapan Toko', 'satuan' => 'pak',   'harga_beli' => 14000, 'stok_awal' => 30, 'barang_masuk' => 10, 'barang_keluar' => 33, 'stok_minimum' => 10, 'stok_target' => 40, 'image' => 'https://github.com/jangaris/homeimage/blob/main/img_persidiaan_umkm/Kantong%20Plastik%20Kecil.avif'],
            ['kode' => 'PT-002', 'nama' => 'Kertas Struk Thermal',  'kategori' => 'Perlengkapan Toko', 'satuan' => 'roll',  'harga_beli' => 7000,  'stok_awal' => 20, 'barang_masuk' => 10, 'barang_keluar' => 12, 'stok_minimum' => 8,  'stok_target' => 30, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Kertas%20Struk%20Thermal.avif'],
            ['kode' => 'PT-003', 'nama' => 'Sabun Cuci Piring',     'kategori' => 'Perlengkapan Toko', 'satuan' => 'botol', 'harga_beli' => 15000, 'stok_awal' => 18, 'barang_masuk' => 6,  'barang_keluar' => 10, 'stok_minimum' => 6,  'stok_target' => 25, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Sabun%20Cuci%20Piring.webp'],

            // Data tidak valid
            ['kode' => 'MR-005', 'nama' => 'Permen Mint',        'kategori' => 'Makanan Ringan',   'satuan' => 'toples', 'harga_beli' => 22000, 'stok_awal' => 10, 'barang_masuk' => 5,  'barang_keluar' => 25, 'stok_minimum' => 5, 'stok_target' => 20, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Permen%20Mint.avif'],
            ['kode' => 'PT-004', 'nama' => 'Lakban Bening',      'kategori' => 'Perlengkapan Toko', 'satuan' => 'roll',  'harga_beli' => 9000,  'stok_awal' => 12, 'barang_masuk' => -4, 'barang_keluar' => 3,  'stok_minimum' => 4, 'stok_target' => 15, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Lakban%20Bening.webp'],
            ['kode' => 'MN-005', 'nama' => 'Sirup Markisa 460 ml','kategori' => 'Minuman',         'satuan' => 'botol',  'harga_beli' => 24000, 'stok_awal' => 14, 'barang_masuk' => 6,  'barang_keluar' => 8,  'stok_minimum' => 15, 'stok_target' => 10, 'image' => 'https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Sirup%20Markisa.avif'],
        ];
    }

}

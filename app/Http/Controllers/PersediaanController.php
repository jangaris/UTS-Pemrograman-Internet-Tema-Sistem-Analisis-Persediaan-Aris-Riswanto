<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PersediaanController extends Controller
{
    public const STATUS_AMAN    = 'Aman';
    public const STATUS_MENIPIS = 'Menipis';
    public const STATUS_HABIS   = 'Habis';
    public const STATUS_INVALID = 'Tidak Valid';

    private function getProcessedData()
    {
        $dataMentah = Barang::semua();
        $processed = [];

        foreach ($dataMentah as $item) {
            $isInvalid = ($item['barang_masuk'] < 0 || $item['stok_awal'] < 0 || $item['barang_keluar'] < 0 || $item['stok_target'] < $item['stok_minimum']);
            $stokAkhir = $item['stok_awal'] + $item['barang_masuk'] - $item['barang_keluar'];
            
            if ($stokAkhir < 0) {
                $stokAkhir = 0;
            }

            if ($isInvalid) {
                $status = self::STATUS_INVALID;
            } elseif ($stokAkhir == 0) {
                $status = self::STATUS_HABIS;
            } elseif ($stokAkhir <= $item['stok_minimum']) {
                $status = self::STATUS_MENIPIS;
            } else {
                $status = self::STATUS_AMAN;
            }

            $kebutuhanPengadaan = 0;
            $prioritas = '-';

            if (!$isInvalid && $stokAkhir < $item['stok_target']) {
                $kebutuhanPengadaan = $item['stok_target'] - $stokAkhir;
                
                if ($stokAkhir == 0) {
                    $prioritas = 'Tinggi';
                } elseif ($stokAkhir <= $item['stok_minimum']) {
                    $prioritas = 'Sedang';
                } else {
                    $prioritas = 'Rendah';
                }
            }

            $item['stok_akhir'] = $stokAkhir;
            $item['status'] = $status;
            $item['kebutuhan_pengadaan'] = $kebutuhanPengadaan;
            $item['prioritas'] = $prioritas;
            $item['is_invalid'] = $isInvalid;

            $item['valtimasi_aset'] = $stokAkhir * $item['harga_beli'];

            $processed[] = $item;
        }

        return $processed;
    }

    //  Beranda
    public function index()
    {
        $barang = $this->getProcessedData();
        
        $totalBarang = count($barang);
        $totalAman = collect($barang)->where('status', self::STATUS_AMAN)->count();
        $totalMenipis = collect($barang)->where('status', self::STATUS_MENIPIS)->count();
        $totalHabis = collect($barang)->where('status', self::STATUS_HABIS)->count();
        $totalInvalid = collect($barang)->where('status', self::STATUS_INVALID)->count();

        return view('beranda.beranda', compact('barang', 'totalBarang', 'totalAman', 'totalMenipis', 'totalHabis', 'totalInvalid'));
    }

    // Daftar Seluruh Barang
public function daftar()
{
    $barang = $this->getProcessedData();
    $daftarKategori = array_unique(array_column($barang, 'kategori'));

    return view('persediaan.barang', compact('barang', 'daftarKategori'));
}

    // Berdasarkan Kategori
    public function kategori($namaKategori)
    {
        $semuaBarang = $this->getProcessedData();
        $barang = array_filter($semuaBarang, function($item) use ($namaKategori) {
            return strtolower($item['kategori']) === strtolower(str_replace('-', ' ', $namaKategori));
        });

        return view('persediaan.kategori', compact('barang', 'namaKategori'));
    }

    //  Detail Barang
    public function detail($kode)
    {
        $semuaBarang = $this->getProcessedData();
        $detailBarang = null;

        foreach ($semuaBarang as $item) {
            if ($item['kode'] === $kode) {
                $detailBarang = $item;
                break;
            }
        }

        if (!$detailBarang) {
            abort(404, 'Data barang tidak ditemukan.');
        }

        return view('persediaan.detail', compact('detailBarang'));
    }

    // Analisis Kondisi Stok
    public function analisis()
    {
        $barang = $this->getProcessedData();
        
        $dataValid = array_filter($barang, fn($i) => !$i['is_invalid']);
        $dataInvalid = array_filter($barang, fn($i) => $i['is_invalid']);

        return view('persediaan.analisis', compact('barang', 'dataValid', 'dataInvalid'));
    }

    // Rekomendasi Pengadaan Barang
    public function rekomendasi()
    {
        $barang = $this->getProcessedData();
        
        $rekomendasi = array_filter($barang, function($item) {
            return !$item['is_invalid'] && $item['kebutuhan_pengadaan'] > 0;
        });

        usort($rekomendasi, function($a, $b) {
            $prioritasVal = ['Tinggi' => 1, 'Sedang' => 2, 'Rendah' => 3];
            return ($prioritasVal[$a['prioritas']] ?? 4) <=> ($prioritasVal[$b['prioritas']] ?? 4);
        });

        return view('persediaan.rekomendasi', compact('rekomendasi'));
    }
}
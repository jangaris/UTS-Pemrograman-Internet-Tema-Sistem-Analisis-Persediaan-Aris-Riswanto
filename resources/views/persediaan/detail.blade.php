@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-6 md:p-8 border border-gray-100">
    <!-- tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('persediaan.daftar') }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:gap-2 transition-all text-sm font-semibold"><-- Kembali ke Daftar Barang</a>
    </div>

    <!-- Header -->
    <img class="w-full h-56 md:h-64 object-cover rounded-xl shadow-md mb-6" src="{{ $detailBarang['image'] }}" alt="">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-gray-200 pb-5 mb-8 gap-4">
        <div>
            <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">{{ $detailBarang['kategori'] }}</span>
            <h1 class="text-3xl font-extrabold text-gray-800 mt-3 tracking-tight">{{ $detailBarang['nama'] }}</h1>
            <p class="text-sm font-mono text-gray-500 mt-1">Kode Barang: {{ $detailBarang['kode'] }}</p>
        </div>
        <div>
            @if($detailBarang['status'] == 'Aman')
                <span class="bg-green-100 text-green-800 text-sm px-4 py-2 rounded-full font-semibold ring-1 ring-green-300 shadow-sm">Status: Aman</span>
            @elseif($detailBarang['status'] == 'Menipis')
                <span class="bg-yellow-100 text-yellow-800 text-sm px-4 py-2 rounded-full font-semibold ring-1 ring-yellow-300 shadow-sm">Status: Menipis</span>
            @elseif($detailBarang['status'] == 'Habis')
                <span class="bg-red-100 text-red-800 text-sm px-4 py-2 rounded-full font-semibold ring-1 ring-red-300 shadow-sm">Status: Habis</span>
            @else
                <span class="bg-gray-200 text-gray-800 text-sm px-4 py-2 rounded-full font-semibold ring-1 ring-gray-300 shadow-sm">Status: Tidak Valid</span>
            @endif
        </div>
    </div>

    <!-- Informasi Stok -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class=" from-gray-50 to-white p-5 rounded-xl border border-gray-200 border-t-4 border-t-gray-400 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga Beli Satuan</h3>
            <p class="text-2xl font-extrabold text-gray-800 mt-2">Rp {{ number_format($detailBarang['harga_beli'], 0, ',', '.') }}</p>
        </div>
        <div class=" from-blue-50 to-white p-5 rounded-xl border border-blue-100 border-t-4 border-t-blue-500 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok Akhir</h3>
            <p class="text-2xl font-extrabold text-blue-600 mt-2">{{ $detailBarang['stok_akhir'] }} <span class="text-sm font-normal text-gray-600">{{ $detailBarang['satuan'] }}</span></p>
        </div>
        <div class=" from-green-50 to-white p-5 rounded-xl border border-green-100 border-t-4 border-t-green-500 shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Estimasi Nilai Aset Stok</h3>
            <p class="text-2xl font-extrabold text-green-600 mt-2">Rp {{ number_format($detailBarang['valtimasi_aset'], 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Rincian Perhitungans Stok -->
    <div class=" from-blue-50 to-indigo-50 border border-blue-200 border-l-4 border-l-blue-500 rounded-xl p-6 mb-8 shadow-sm">
        <h3 class="text-lg font-bold text-blue-900 mb-4">Rincian Formula Pergerakan Stok</h3>
        <ul class="space-y-3 text-sm text-blue-800">
            <li class="flex justify-between bg-white/60 rounded-lg px-4 py-2"><strong>Stok Awal:</strong> <span>{{ $detailBarang['stok_awal'] }} {{ $detailBarang['satuan'] }}</span></li>
            <li class="flex justify-between bg-white/60 rounded-lg px-4 py-2"><strong>Barang Masuk:</strong> <span class="text-green-700 font-semibold">+{{ $detailBarang['barang_masuk'] }} {{ $detailBarang['satuan'] }}</span></li>
            <li class="flex justify-between bg-white/60 rounded-lg px-4 py-2"><strong>Barang Keluar:</strong> <span class="text-red-600 font-semibold">-{{ $detailBarang['barang_keluar'] }} {{ $detailBarang['satuan'] }}</span></li>
            <li class="pt-3 border-t border-blue-200 font-semibold">
                Rumus: (Stok Awal + Barang Masuk) - Barang Keluar = <span class="inline-block bg-blue-600 text-white px-3 py-0.5 rounded-md ml-1">{{ $detailBarang['stok_akhir'] }}</span>
            </li>
        </ul>
    </div>

    <!-- Batas Stok dan Rekomendasi Pengadaan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border border-gray-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-md transition">
            <h4 class="font-bold text-gray-700 mb-3 pb-2 border-b border-gray-100">Parameter Batas Stok</h4>
            <p class="text-sm text-gray-600">Batas Stok Minimum: <strong class="text-gray-800">{{ $detailBarang['stok_minimum'] }}</strong></p>
            <p class="text-sm text-gray-600 mt-2">Target Stok Ideal: <strong class="text-gray-800">{{ $detailBarang['stok_target'] }}</strong></p>
        </div>
        <div class="border border-gray-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-md transition">
            <h4 class="font-bold text-gray-700 mb-3 pb-2 border-b border-gray-100">Analisis Pengadaan</h4>
            @if($detailBarang['is_invalid'])
                <p class="text-sm text-red-600 font-medium bg-red-50 rounded-lg px-3 py-2">Data terdeteksi tidak valid (terdapat anomali nilai negatif).</p>
            @elseif($detailBarang['kebutuhan_pengadaan'] > 0)
                <p class="text-sm text-gray-600">Kekurangan Stok: <strong class="text-red-600">{{ $detailBarang['kebutuhan_pengadaan'] }} {{ $detailBarang['satuan'] }}</strong></p>
                <p class="text-sm text-gray-600 mt-2">Prioritas Pengadaan: <strong class="text-blue-600">{{ $detailBarang['prioritas'] }}</strong></p>
            @else
                <p class="text-sm text-green-600 font-medium bg-green-50 rounded-lg px-3 py-2">Stok saat ini sudah mencukupi target ideal. Tidak memerlukan pengadaan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
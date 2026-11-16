@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Analisis Kondisi Stok & Validasi Data</h1>
            <p class="text-sm text-gray-500 mt-1">Evaluasi menyeluruh terhadap status persediaan, pengelompokan kondisi stok, dan deteksi anomali data.</p>
        </div>
        <div>
            <a href="{{ route('persediaan.rekomendasi') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                Lihat Rekomendasi Pengadaan -->;
            </a>
        </div>
    </div>

    <!-- Peringatan / Indikator Data Tidak Valid-->
    @php
        $invalidCount = count($dataInvalid);
    @endphp

    @if($invalidCount > 0)
    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
        <div class="flex items-center">
            <div class=" text-red-500 font-bold text-lg">⚠️</div>
            <div class="ml-3">
                <h3 class="text-sm font-bold text-red-800">Perhatian: Terdeteksi Anomali / Data Tidak Valid</h3>
                <p class="text-xs text-red-700 mt-0.5">Terdapat <strong>{{ $invalidCount }} item barang</strong> dengan parameter yang tidak wajar (seperti barang masuk bernilai negatif atau kesalahan batas stok). Sistem mengisolasi data ini agar tidak merusak kalkulasi pengadaan.</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Tabel Data Anomali / Tidak Valid -->
    @if($invalidCount > 0)
    <div class="bg-white shadow-md rounded-lg p-6 border border-red-200">
        <h2 class="text-lg font-bold text-red-700 mb-3">Daftar Data Persediaan Tidak Valid / Anomali</h2>
        <div class="overflow-x-auto rounded-lg border border-red-100">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-red-50 border-b border-red-100 text-red-800 uppercase text-xs">
                        <th class="p-3">Kode</th>
                        <th class="p-3">Nama Barang</th>
                        <th class="p-3">Kategori</th>
                        <th class="p-3 text-center">Stok Awal</th>
                        <th class="p-3 text-center">Barang Masuk</th>
                        <th class="p-3 text-center">Barang Keluar</th>
                        <th class="p-3 text-center">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-red-100">
                    @foreach($dataInvalid as $item)
                    <tr class="hover:bg-red-50/50">
                        <td class="p-3 font-mono font-semibold text-gray-700">{{ $item['kode'] }}</td>
                        <td class="p-3 font-medium text-gray-900">{{ $item['nama'] }}</td>
                        <td class="p-3 text-gray-600">{{ $item['kategori'] }}</td>
                        <td class="p-3 text-center">{{ $item['stok_awal'] }}</td>
                        <td class="p-3 text-center text-red-600 font-bold">{{ $item['barang_masuk'] }}</td>
                        <td class="p-3 text-center">{{ $item['barang_keluar'] }}</td>
                        <td class="p-3 text-center">
                            <span class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-semibold">Tidak Valid</span>
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('persediaan.detail', $item['kode']) }}" class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Tabel Analisis Stok Valid -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800">Analisis Stok Valid Berdasarkan Status</h2>
            <span class="text-xs text-gray-500 font-medium">Total Item Valid: {{ count($dataValid) }}</span>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700 uppercase text-xs">
                        <th class="p-3.5">Kode</th>
                        <th class="p-3.5">Nama Barang</th>
                        <th class="p-3.5">Kategori</th>
                        <th class="p-3.5 text-center">Stok Akhir</th>
                        <th class="p-3.5 text-center">Stok Min.</th>
                        <th class="p-3.5 text-center">Stok Target</th>
                        <th class="p-3.5 text-center">Kondisi Status</th>
                        <th class="p-3.5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($dataValid as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3.5 font-mono font-semibold text-gray-700">{{ $item['kode'] }}</td>
                        <td class="p-3.5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                        <td class="p-3.5 text-gray-600">{{ $item['kategori'] }}</td>
                        <td class="p-3.5 text-center font-bold text-gray-900">
                            {{ $item['stok_akhir'] }} <span class="text-xs font-normal text-gray-500">{{ $item['satuan'] }}</span>
                        </td>
                        <td class="p-3.5 text-center text-gray-600">{{ $item['stok_minimum'] }}</td>
                        <td class="p-3.5 text-center text-gray-600">{{ $item['stok_target'] }}</td>
                        <td class="p-3.5 text-center">
                            @if($item['status'] == 'Aman')
                                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-semibold">Aman</span>
                            @elseif($item['status'] == 'Menipis')
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-semibold">Menipis (≤ Min)</span>
                            @elseif($item['status'] == 'Habis')
                                <span class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-semibold">Habis (0)</span>
                            @endif
                        </td>
                        <td class="p-3.5 text-center">
                            <a href="{{ route('persediaan.detail', $item['kode']) }}" class="bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-blue-700 transition">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
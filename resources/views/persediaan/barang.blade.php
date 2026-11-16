@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Seluruh Barang Inventaris</h1>
            <p class="text-sm text-gray-500 mt-1">Menampilkan seluruh data persediaan barang beserta hasil perhitungan stok akhir.</p>
        </div>
        <div class="bg-blue-50 text-blue-700 px-4 py-2 rounded-lg text-sm font-semibold border border-blue-200 self-start">
            Total Data: {{ count($barang) }} Item
        </div>
    </div>

    <!-- Navigasi-->
    <div class="mb-6 flex flex-wrap items-center gap-2">
        <span class="text-xs font-semibold text-gray-500 uppercase mr-1">Filter Kategori:</span>
        <a href="{{ route('persediaan.daftar') }}" 
           class="px-3 py-1.5 rounded-full text-xs font-medium bg-blue-600 text-white shadow-xs">
            Semua Kategori
        </a>
        @foreach($daftarKategori as $kat)
            <a href="{{ route('persediaan.kategori', strtolower(str_replace(' ', '-', $kat))) }}" 
               class="px-3 py-1.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition">
                {{ $kat }}
            </a>
        @endforeach
    </div>

    <!-- Tabel Daftar Barang -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200 text-gray-700 uppercase text-xs">
                    <th class="p-3.5">Kode</th>
                    <th class="p-3.5">Nama Barang</th>
                    <th class="p-3.5">Kategori</th>
                    <th class="p-3.5 text-right">Harga Beli</th>
                    <th class="p-3.5 text-center">Awal</th>
                    <th class="p-3.5 text-center">Masuk</th>
                    <th class="p-3.5 text-center">Keluar</th>
                    <th class="p-3.5 text-center">Stok Akhir</th>
                    <th class="p-3.5 text-center">Min / Target</th>
                    <th class="p-3.5 text-center">Status Stok</th>
                    <th class="p-3.5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($barang as $item)
                <tr class="hover:bg-gray-50 transition {{ $item['is_invalid'] ? 'bg-red-50/40' : '' }}">
                    <td class="p-3.5 font-mono font-semibold text-gray-700">{{ $item['kode'] }}</td>
                    <td class="p-3.5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                    <td class="p-3.5">
                        <a href="{{ route('persediaan.kategori', strtolower(str_replace(' ', '-', $item['kategori']))) }}" 
                           class="text-blue-600 hover:underline font-medium">
                            {{ $item['kategori'] }}
                        </a>
                    </td>
                    <td class="p-3.5 text-right text-gray-600">
                        Rp {{ number_format($item['harga_beli'], 0, ',', '.') }}
                    </td>
                    <td class="p-3.5 text-center">{{ $item['stok_awal'] }}</td>
                    <td class="p-3.5 text-center text-green-600 font-medium">+{{ $item['barang_masuk'] }}</td>
                    <td class="p-3.5 text-center text-red-600 font-medium">-{{ $item['barang_keluar'] }}</td>
                    <td class="p-3.5 text-center font-bold text-gray-900">
                        {{ $item['stok_akhir'] }} <span class="text-xs font-normal text-gray-500">{{ $item['satuan'] }}</span>
                    </td>
                    <td class="p-3.5 text-center text-xs text-gray-500">
                        {{ $item['stok_minimum'] }} / {{ $item['stok_target'] }}
                    </td>
                    <td class="p-3.5 text-center">
                        @if($item['status'] == 'Aman')
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-semibold">Aman</span>
                        @elseif($item['status'] == 'Menipis')
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-semibold">Menipis</span>
                        @elseif($item['status'] == 'Habis')
                            <span class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-semibold">Habis</span>
                        @else
                            <span class="bg-gray-200 text-gray-800 text-xs px-2.5 py-1 rounded-full font-semibold">Tidak Valid</span>
                        @endif
                    </td>
                    <td class="p-3.5 text-center">
                        <a href="{{ route('persediaan.detail', $item['kode']) }}" 
                           class="inline-block bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-blue-700 transition">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
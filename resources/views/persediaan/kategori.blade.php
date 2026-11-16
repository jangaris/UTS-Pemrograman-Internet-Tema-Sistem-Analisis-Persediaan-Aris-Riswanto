@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
    <!-- Header & Tombol Kembali -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="{{ route('persediaan.daftar') }}" class="text-blue-600 hover:underline text-sm font-medium">&larr; Kembali ke Semua Barang</a>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Kategori: {{ ucwords(str_replace('-', ' ', $namaKategori)) }}</h1>
            <p class="text-sm text-gray-500 mt-1">Menampilkan daftar barang yang termasuk dalam kategori terpilih.</p>
        </div>
        <div class="bg-blue-50 text-blue-700 px-4 py-2 rounded-lg text-sm font-semibold border border-blue-200 self-start">
            Jumlah Item: {{ count($barang) }}
        </div>
    </div>

    @if(empty($barang))
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-lg text-sm">
            Tidak ada data barang yang ditemukan untuk kategori ini.
        </div>
    @else
        <!-- Tabel Data Kategori -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700 uppercase text-xs">
                        <th class="p-3.5">Kode</th>
                        <th class="p-3.5">Nama Barang</th>
                        <th class="p-3.5 text-right">Harga Beli</th>
                        <th class="p-3.5 text-center">Stok Akhir</th>
                        <th class="p-3.5 text-center">Satuan</th>
                        <th class="p-3.5 text-center">Status</th>
                        <th class="p-3.5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($barang as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3.5 font-mono font-semibold text-gray-700">{{ $item['kode'] }}</td>
                        <td class="p-3.5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                        <td class="p-3.5 text-right text-gray-600">Rp {{ number_format($item['harga_beli'], 0, ',', '.') }}</td>
                        <td class="p-3.5 text-center font-bold text-gray-900">{{ $item['stok_akhir'] }}</td>
                        <td class="p-3.5 text-center text-gray-600">{{ $item['satuan'] }}</td>
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
                            <a href="{{ route('persediaan.detail', $item['kode']) }}" class="bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-blue-700 transition">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
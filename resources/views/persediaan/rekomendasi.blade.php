@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Rekomendasi Pengadaan Barang</h1>
            <p class="text-sm text-gray-500 mt-1">Daftar prioritas pengadaan barang berdasarkan analisis selisih stok saat ini terhadap target stok ideal.</p>
        </div>
        <div>
            <a href="{{ route('persediaan.analisis') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                <-- Kembali ke Analisis Stok
            </a>
        </div>
    </div>

    <!-- Informasi-->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-sm text-blue-800">
        <h3 class="font-bold mb-1">Informasi Prioritas Pengadaan:</h3>
        <ul class="list-disc list-inside space-y-1 text-xs text-blue-900">
            <li><strong>Prioritas Tinggi:</strong> Stok barang saat ini habis.</li>
            <li><strong>Prioritas Sedang:</strong> Stok barang berada di bawah atau sama dengan batas stok minimum.</li>
            <li><strong>Prioritas Rendah:</strong> Stok barang di atas minimum tetapi belum mencapai target stok ideal.</li>
        </ul>
    </div>

    <!-- Tabel Rekomendasi Pengadaan -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800">Daftar Barang yang Memerlukan Pengadaan</h2>
            <span class="text-xs bg-green-100 text-green-800 font-semibold px-3 py-1 rounded-full">
                Total Kebutuhan: {{ count($rekomendasi) }} Item
            </span>
        </div>

        @if(empty($rekomendasi))
            <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-lg text-sm text-center">
                Semua stok barang dalam kondisi aman dan memenuhi target ideal. Tidak ada pengadaan yang diperlukan saat ini.
            </div>
        @else
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200 text-gray-700 uppercase text-xs">
                            <th class="p-3.5">Prioritas</th>
                            <th class="p-3.5">Kode</th>
                            <th class="p-3.5">Nama Barang</th>
                            <th class="p-3.5">Kategori</th>
                            <th class="p-3.5 text-center">Stok Akhir</th>
                            <th class="p-3.5 text-center">Target Stok</th>
                            <th class="p-3.5 text-center font-bold text-blue-700">Jumlah Pengadaan</th>
                            <th class="p-3.5 text-right">Estimasi Biaya (*)<br><small class="font-normal text-gray-500">(Kebutuhan x Harga Beli)</small></th>
                            <th class="p-3.5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($rekomendasi as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3.5 text-center">
                                @if($item['prioritas'] == 'Tinggi')
                                    <span class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-bold">Tinggi</span>
                                @elseif($item['prioritas'] == 'Sedang')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-bold">Sedang</span>
                                @else
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded-full font-medium">Rendah</span>
                                @endif
                            </td>
                            <td class="p-3.5 font-mono font-semibold text-gray-700">{{ $item['kode'] }}</td>
                            <td class="p-3.5 font-medium text-gray-900">{{ $item['nama'] }}</td>
                            <td class="p-3.5 text-gray-600">{{ $item['kategori'] }}</td>
                            <td class="p-3.5 text-center font-bold text-gray-900">
                                {{ $item['stok_akhir'] }} <span class="text-xs font-normal text-gray-500">{{ $item['satuan'] }}</span>
                            </td>
                            <td class="p-3.5 text-center text-gray-600">{{ $item['stok_target'] }}</td>
                            <td class="p-3.5 text-center font-bold text-blue-600 text-base">
                                +{{ $item['kebutuhan_pengadaan'] }} <span class="text-xs font-normal text-gray-500">{{ $item['satuan'] }}</span>
                            </td>
                            <td class="p-3.5 text-right font-semibold text-gray-800">
                                Rp {{ number_format($item['kebutuhan_pengadaan'] * $item['harga_beli'], 0, ',', '.') }}
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
</div>
@endsection
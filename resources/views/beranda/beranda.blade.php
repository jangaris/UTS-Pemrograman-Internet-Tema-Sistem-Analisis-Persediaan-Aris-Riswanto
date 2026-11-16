@extends('layouts.app')

@section('content')
<!-- Jumbotron -->
<div class="relative overflow-hidden rounded-2xl not-odd: from-indigo-600 via-blue-600 to-cyan-500 p-8 md:p-10 mb-8 shadow-lg">
    <div class="absolute -top-10 -right-10 w-56 h-56 rounded-full bg-white/10"></div>
    <div class="absolute -bottom-16 right-32 w-40 h-40 rounded-full bg-white/10"></div>
    <div class="relative">
        <span class="inline-block bg-white/20 text-black text-xs font-semibold tracking-wider uppercase px-3 py-1 rounded-full mb-4">
            Sistem Persediaan
        </span>
        <h1 class="text-3xl md:text-4xl font-extrabold text-black leading-tight">
            Dashboard Analisis Persediaan Barang Mang Aris
        </h1>
        <p class="text-black mt-3 max-w-2xl">
            Pengolahan data persediaan dan rekomendasi pengadaan Barang.
        </p>
    </div>
</div>

<!--  Ringkasan Statistik -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="group bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500 hover:shadow-xl hover:-translate-y-1 transition duration-300">
        <img class="w-full h-28 object-cover rounded-lg mb-4 group-hover:scale-[1.02] transition duration-300" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/stokBarang.webp" alt="Barang">
        <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Total Barang</h3>
        <p class="text-4xl font-extrabold text-gray-800 mt-2">{{ $totalBarang }}</p>
    </div>
    <div class="group bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 hover:shadow-xl hover:-translate-y-1 transition duration-300">
        <img class="w-full h-28 object-cover rounded-lg mb-4 group-hover:scale-[1.02] transition duration-300" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Total%20Items.webp" alt="Aman">
        <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Stok Aman</h3>
        <p class="text-4xl font-extrabold text-green-600 mt-2">{{ $totalAman }}</p>
    </div>
    <div class="group bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500 hover:shadow-xl hover:-translate-y-1 transition duration-300">
        <img class="w-full h-28 object-cover rounded-lg mb-4 group-hover:scale-[1.02] transition duration-300" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Stock%20is%20running%20low.avif" alt="Menipis">
        <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Stok Menipis</h3>
        <p class="text-4xl font-extrabold text-yellow-600 mt-2">{{ $totalMenipis }}</p>
    </div>
    <div class="group bg-white p-6 rounded-xl shadow-md border-l-4 border-red-500 hover:shadow-xl hover:-translate-y-1 transition duration-300">
        <img class="w-full h-28 object-cover rounded-lg mb-4 group-hover:scale-[1.02] transition duration-300" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Stock%20Out%20Invalid.avif" alt="Invalid">
        <h3 class="text-gray-500 text-xs font-semibold uppercase tracking-wider">Stok Habis / Invalid</h3>
        <p class="text-4xl font-extrabold text-red-600 mt-2">{{ $totalHabis + $totalInvalid }}</p>
    </div>
</div>

<!-- Menu Navigasi Kartu -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col">
        <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/List%20of%20All%20Items.webp" alt="all barang">
        <h3 class="text-xl font-bold mb-2 text-gray-800">Daftar Seluruh Barang</h3>
        <p class="text-gray-600 mb-5 text-sm ">Lihat seluruh inventaris barang beserta kalkulasi stok akhir dan statusnya.</p>
        <a href="{{ route('persediaan.daftar') }}" class="inline-block self-start from-blue-600 to-blue-500 text-amber-100 bg-cyan-950 px-5 py-2.5 rounded-lg text-sm font-semibold shadow hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition">Buka Daftar &rarr;</a>
    </div>
    <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col">
        <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Stock%20Condition%20Analysis.avif" alt="analisis">
        <h3 class="text-xl font-bold mb-2 text-gray-800">Analisis Kondisi Stok</h3>
        <p class="text-gray-600 mb-5 text-sm ">Evaluasi status kelayakan data, identifikasi anomali, dan pengelompokan stok.</p>
        <a href="{{ route('persediaan.analisis') }}" class="inline-block self-start  from-blue-600 to-blue-500 text-amber-100 bg-cyan-950 px-5 py-2.5 rounded-lg text-sm font-semibold shadow hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition">Buka Analisis &rarr;</a>
    </div>
    <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col">
        <img class="w-full h-40 object-cover rounded-lg mb-4" src="https://raw.githubusercontent.com/jangaris/homeimage/refs/heads/main/img_persidiaan_umkm/Procurement%20Recommendation.webp" alt="rekomendasi">
        <h3 class="text-xl font-bold mb-2 text-gray-800">Rekomendasi Pengadaan</h3>
        <p class="text-gray-600 mb-5 text-sm ">Dapatkan daftar prioritas barang yang harus segera dibeli kembali.</p>
        <a href="{{ route('persediaan.rekomendasi') }}" class="inline-block self-start  from-green-600 to-emeral0 text-amber-100 bg-cyan-950 px-5 py-2.5 rounded-lg text-sm font-semibold shadow hover:shadow-lg hover:from-green-700 hover:to-emerald-600 transition">Buka Rekomendasi &rarr;</a>
    </div>
</div>
@endsection
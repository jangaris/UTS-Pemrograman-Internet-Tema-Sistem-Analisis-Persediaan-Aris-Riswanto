<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Analisis Persediaan & Pengadaan Barang Mang Aris</title>
    @vite('resources/css/app.css')
  </head>
  <body class="bg-gray-50 flex flex-col min-h-screen">


<nav class="fixed  w-full z-20 top-0 border-b border-default">
  <div class=" flex bg-blue-700 flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://github.com/jangaris/homeimage/blob/main/Settings%20icon.png?raw=true" class="h-7" alt="Flowbite Logo" />
        <span class="self-center text-white text-xl text-heading font-semibold whitespace-nowrap">Mang Aris</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
      <li><a href="{{ route('persediaan.index') }}" class="block py-2 px-3 text-white hover:underline">Beranda</a></li>
        <li><a href="{{ route('persediaan.daftar') }}" class="block py-2 px-3 text-white hover:underline">Daftar Barang</a></li>
        <li><a href="{{ route('persediaan.analisis') }}" class="block py-2 px-3 text-white hover:underline">Analisis Stok</a></li>
        <li><a href="{{ route('persediaan.rekomendasi') }}" class="block py-2 px-3 text-white hover:underline">Rekomendasi Pengadaan</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container mx-auto px-4 mt-28 mb-12 max-w-7xl">
    @yield('content')
</main>

<footer class="bg-blue-800 text-white mt-auto">
    <div class="mx-auto w-full max-w-7xl p-4 py-6 text-center text-sm">
        <span>© 2026 Aris Riswanto - Pendidikan Teknologi Informasi. All Rights Reserved.</span>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  </body>
</html>


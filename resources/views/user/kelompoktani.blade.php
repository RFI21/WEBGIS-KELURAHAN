<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Kelompok Tani | WebGIS Battang Barat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #e9f0f0;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(129, 238, 26, 0.05);
        }

        .hero-inner {
            background: linear-gradient(135deg, #447a07 0%, #366b05 100%);
            position: relative;
            overflow: hidden;
        }

.pattern-bg {
    background:
        linear-gradient(
            rgba(15,23,42,0.7),
            rgba(15,23,42,0.7)
        ),
        url('/assets/img/patern.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

        .table-container {
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
        }

        tr {
            transition: all 0.2s ease;
        }

        tr:hover {
            background-color: #f1f5f9;
        }
    </style>
</head>

<body class="text-slate-900">

      @include('user.header')


    <section class="hero-inner pt-32 pb-20 text-white">
        <div class="absolute inset-0 pattern-bg"></div>
        <div class="container mx-auto px-6 relative z-10">
            <nav class="flex mb-8 animate__animated animate__fadeIn" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li><a href="/" class="text-slate-300 hover:text-white">Beranda</a></li>
                    <li><i class="bi bi-chevron-right text-[10px] mx-2 text-blue-400"></i></li>
                    <li class="text-blue-400 font-bold">Data Kelompok Tani</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown leading-tight">
                Kelompok Tani <br>
                <span class="text-blue-400">Battang Barat</span>
            </h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Daftar inventarisir kelompok tani, kepengurusan, dan komoditas unggulan per Rukun Warga di Kelurahan Battang Barat.
            </p>
        </div>
    </section>

    <section class="py-12 mt-5 relative z-20">
        <div class="container mx-auto px-4 lg:px-10">
            
            <!-- Toolbar Tabel -->
            <div class="bg-white p-6 rounded-t-[2rem] border-x border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- <div class="relative w-full md:w-96">
                    <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="Cari kelompok tani atau komoditas..." class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all text-sm">
                </div> -->
                <div class="flex gap-2 w-full md:w-auto">
                    <!-- <button class="bg-emerald-600 text-white px-5 py-3 rounded-2xl font-bold text-sm flex items-center gap-2 hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-200">
                        <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel
                    </button> -->
<form method="GET" action="" class="flex flex-col sm:flex-row items-start sm:items-center gap-3">

    <!-- Filter RW -->
    <div class="relative w-full sm:w-auto">

        <!-- Icon -->
        <i class="bi bi-funnel absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

        <!-- Select -->
        <select 
            name="rw"
            onchange="this.form.submit()"
            class="appearance-none w-full sm:w-48 pl-11 pr-10 py-3 
                   bg-slate-100 hover:bg-slate-200
                   text-slate-700 text-sm font-bold
                   border border-slate-200
                   rounded-2xl
                   transition-all duration-200
                   focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">

            <option value="">Semua RW</option>

            <option value="RW 1" {{ request('rw') == 'RW 1' ? 'selected' : '' }}>
                RW 1
            </option>

            <option value="RW 2" {{ request('rw') == 'RW 2' ? 'selected' : '' }}>
                RW 2
            </option>

            <option value="RW 3" {{ request('rw') == 'RW 3' ? 'selected' : '' }}>
                RW 3
            </option>

        </select>

        <!-- Arrow -->
        <i class="bi bi-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>

    </div>

</form>
                </div>
            </div>

            <!-- Tabel Area -->
            <div class="bg-white border-x border-b border-slate-100 table-container rounded-b-[2rem]">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">No.</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Kelompok Tani</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Ketua Kelompok</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Jumlah Anggota</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Komoditas Utama</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">RW</th>
                                </tr>
                        </thead>
                <tbody class="divide-y divide-slate-50">

    @forelse ($kelompoktani as $index => $kelompok)
    <tr class="hover:bg-slate-50 transition-all duration-200">

        <!-- Nomor -->
        <td class="px-8 py-6 text-sm font-bold text-slate-400">
            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
        </td>

        <!-- Nama Kelompok -->
        <td class="px-6 py-6">
            <span class="block font-extrabold text-slate-800">
                {{ $kelompok->nama_kelompok }}
            </span>

<span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase
    {{ $kelompok->status == 'Aktif'
        ? 'bg-emerald-50 text-emerald-600'
        : 'bg-red-50 text-red-600' }}">

    {{ $kelompok->status }}

</span>
        </td>

        <!-- Ketua -->
        <td class="px-6 py-6 text-sm font-semibold text-slate-600">
            {{ $kelompok->ketua }}
        </td>

        <!-- Jumlah Anggota -->
        <td class="px-6 py-6">
            <div class="flex items-center gap-2">
                
                <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xs">
                    {{ $kelompok->jumlah }}
                </span>

                <span class="text-xs text-slate-400 italic">
                    Anggota
                </span>

            </div>
        </td>

        <!-- Komoditas -->
        <td class="px-6 py-6">
            <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-[10px] font-bold border border-amber-100">
                {{ $kelompok->komoditas }}
            </span>
        </td>

        <!-- RW -->
        <td class="px-6 py-6">
            <span class="font-black text-slate-700">
                {{ $kelompok->rw }}
            </span>
        </td>

    </tr>

    @empty

    <tr>
        <td colspan="7" class="px-6 py-10 text-center text-slate-400 font-semibold">
            Belum ada data kelompok tani.
        </td>
    </tr>

    @endforelse

</tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
<!-- Pagination -->
<div class="px-8 py-5 bg-slate-50 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">

    <p class="text-xs text-slate-500 font-medium">
        Menampilkan 
        {{ $kelompoktani->firstItem() }} -
        {{ $kelompoktani->lastItem() }}
        dari {{ $kelompoktani->total() }} Kelompok Tani
    </p>

    <div class="flex items-center gap-2">

        {{-- Tombol Previous --}}
        @if ($kelompoktani->onFirstPage())
            <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-300 flex items-center justify-center">
                <i class="bi bi-chevron-left text-xs"></i>
            </span>
        @else
            <a href="{{ $kelompoktani->previousPageUrl() }}"
               class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-blue-600 hover:border-blue-200 transition-all">
                <i class="bi bi-chevron-left text-xs"></i>
            </a>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($kelompoktani->getUrlRange(1, $kelompoktani->lastPage()) as $page => $url)

            @if ($page == $kelompoktani->currentPage())

                <span class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center text-xs font-bold">
                    {{ $page }}
                </span>

            @else

                <a href="{{ $url }}"
                   class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-all text-xs font-bold">
                    {{ $page }}
                </a>

            @endif

        @endforeach

        {{-- Tombol Next --}}
        @if ($kelompoktani->hasMorePages())
            <a href="{{ $kelompoktani->nextPageUrl() }}"
               class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-blue-600 hover:border-blue-200 transition-all">
                <i class="bi bi-chevron-right text-xs"></i>
            </a>
        @else
            <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-300 flex items-center justify-center">
                <i class="bi bi-chevron-right text-xs"></i>
            </span>
        @endif

    </div>

</div>
            </div>

            <!-- <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-emerald-50 border border-emerald-100 p-6 rounded-3xl flex items-center gap-5">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white text-xl">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Total Anggota Terdaftar</h4>
                        <p class="text-2xl font-black text-slate-800">234 <span class="text-sm font-normal">Jiwa</span></p>
                    </div>
                </div>
                <div class="bg-amber-50 border border-amber-100 p-6 rounded-3xl flex items-center gap-5">
                    <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center text-white text-xl">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-amber-600 uppercase tracking-widest">Komoditas Dominan</h4>
                        <p class="text-2xl font-black text-slate-800">Cengkeh</p>
                    </div>
                </div>
                <div class="bg-blue-50 border border-blue-100 p-6 rounded-3xl flex items-center gap-5">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-xl">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-blue-600 uppercase tracking-widest">Distribusi Wilayah</h4>
                        <p class="text-2xl font-black text-slate-800">03 <span class="text-sm font-normal">RW Aktif</span></p>
                    </div>
                </div>
            </div> -->

        </div>
    </section>

    @include('user.footer')

    

</body>

</html>
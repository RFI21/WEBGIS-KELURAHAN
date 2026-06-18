   <!-- NAVIGATION -->
    <nav class="fixed w-full z-50 glass-nav py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-12">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-600 p-2 rounded-xl">
                        <i class="bi bi-geo-fill text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tight text-blue-900 block leading-none">BATTANG BARAT</span>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">WebGIS Terpadu</span>
                    </div>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('user.index') }}" class="px-4 py-2 text-sm font-semibold {{ Request::routeIs('user.index') ? 'active text-blue-600' : '' }} hover:text-blue-700">Beranda</a>
                    <a href="{{ route('user.profil') }}" class="px-4  py-2 text-sm font-semibold {{ Request::routeIs('user.profil') ? 'active text-blue-600' : '' }} hover:text-blue-600 transition-colors">Profil</a>
                    <a href="{{ route('user.administrasi') }}" class="px-4 py-2 text-sm font-semibold {{ Request::routeIs('user.administrasi') ? 'active text-blue-600' : '' }} hover:text-blue-600 transition-colors">Webgis</a>
                    <!-- <a href="{{ route('user.fasilitas') }}" class="px-4 py-2 text-sm font-semibold {{ Request::routeIs('user.fasilitas') ? 'active text-blue-600' : '' }} hover:text-blue-600 transition-colors">Fasilitas Umum</a>
                    <a href="{{ route('user.potensi') }}" class="px-4 py-2 text-sm font-semibold {{ Request::routeIs('user.potensi') ? 'active text-blue-600' : '' }} hover:text-blue-600 transition-colors">Potensi</a> -->
                    <!-- <a href="#sosial" class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">Data Sosial</a> -->
<div class="relative group">
    
    @php
        $activeSosial = Request::routeIs('user.bansos') || Request::routeIs('user.kelompoktani');
    @endphp

    <!-- Button -->
    <button class="px-4 py-2 text-sm font-semibold inline-flex items-center gap-2 transition-colors
        {{ $activeSosial ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }}">
        
        Data Sosial

        <i class="bi bi-chevron-down text-xs"></i>
    </button>

    <!-- Dropdown -->
    <div class="absolute left-0 top-full pt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-300 z-50">
        
        <div class="bg-white shadow-xl rounded-2xl w-56 border border-slate-100 overflow-hidden">
            
            <a href="{{ route('user.bansos') }}"
               class="block px-5 py-3 text-sm transition
               {{ Request::routeIs('user.bansos') 
                    ? 'bg-slate-50 text-blue-600 font-semibold' 
                    : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                
                Penerima Bansos
            </a>

            <a href="{{ route('user.kelompoktani') }}"
               class="block px-5 py-3 text-sm transition
               {{ Request::routeIs('user.kelompoktani') 
                    ? 'bg-slate-50 text-blue-600 font-semibold' 
                    : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                
                Kelompok Tani
            </a>

        </div>

    </div>

</div>
                    <a href="{{ route('user.penduduk') }}" class="px-4 py-2 text-sm font-semibold {{ Request::routeIs('user.penduduk') ? 'active text-blue-600' : '' }} hover:text-blue-600 transition-colors">
                        Penduduk
                    </a>
                <a href="{{ route('user.login') }}" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-all ml-4 shadow-md">
                     <i class="bi bi-box-arrow-in-right mr-2"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

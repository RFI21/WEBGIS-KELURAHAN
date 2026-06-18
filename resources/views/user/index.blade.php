<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>WebGIS Terpadu | Kelurahan Battang Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <style>

#heroMap{
    width:100%;
    height:500px;
    min-height:500px;
}

.leaflet-container{
    width:100%;
    height:100%;
    background:#e2e8f0;
}
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .hero-gradient {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(28, 37, 46, 0.7) 100%),
                        url('assets/img/battangbarat2.png');
            background-size: cover;
            background-position: center;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .map-glow {
            box-shadow: 0 0 30px rgba(37, 99, 235, 0.2);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

      {{-- header --}}
      @include('user.header')
      {{-- header end --}}

    <!-- HERO SECTION -->
    <header id="beranda" class="hero-gradient h-screen min-h-[700px] flex items-center relative overflow-hidden pt-20">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="animate__animated animate__fadeInLeft">
 
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mb-6">
                        Webgis Terpadu <span class="text-blue-400">Battang Barat</span>
                    </h1>
                    <p class="text-lg text-slate-200 mb-10 max-w-lg leading-relaxed">
                        Platform integrasi data geospasial untuk pemetaan administrasi, potensi wilayah, dan pelayanan masyarakat di Kelurahan Battang Barat.
                    </p>
                    <div class="flex flex-wrap gap-4">

                        <a href="{{ route('user.administrasi') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold transition-all transform hover:scale-105 shadow-xl flex items-center gap-2">
                            <i class="bi bi-map"></i> Buka Peta Interaktif
                        </a>

                        <a href="{{ route('user.penduduk') }}"
                        class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-4 rounded-2xl font-bold transition-all">
                            Lihat Statistik
                        </a>

                    </div>
                </div>
                <div class="hidden lg:block animate__animated animate__fadeInRight">
<div class="relative">

    <!-- efek glow -->
    <div class="absolute -inset-4 bg-blue-500/20 blur-3xl rounded-3xl"></div>

    <!-- MAP -->
    <div id="heromap"
         class="relative h-[500px] rounded-3xl overflow-hidden border border-white/20 shadow-2xl z-10">
    </div>

</div>
                </div>
            </div>
        </div>
        
        <!-- Decorative Shapes -->
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-slate-50 to-transparent"></div>
    </header>

    <!-- QUICK STATS -->
    <section class="relative z-20 -mt-16 container mx-auto px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 flex items-center gap-5 card-hover">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 text-2xl">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Luas Wilayah</p>
                    <h3 class="text-2xl font-extrabold text-slate-800">15 <span class="text-sm font-normal">km²</span></h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 flex items-center gap-5 card-hover">
                <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Penduduk</p>
                    <h3 class="text-2xl font-extrabold text-slate-800">{{ number_format($data->jumlah_penduduk, 0, ',', '.') }} <span class="text-sm font-normal">Jiwa</span></h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 flex items-center gap-5 card-hover">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 text-2xl">
                    <i class="bi bi-house-door"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Jumlah RT/RW</p>
                    <h3 class="text-2xl font-extrabold text-slate-800">00/03</h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 flex items-center gap-5 card-hover">
                <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-2xl">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Potensi Unggulan</p>
                    <h3 class="text-2xl font-extrabold text-slate-800">{{ $jumlahUmkm > $jumlahWisata ? 'UMKM' : 'Agrowisata' }}</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES GRID -->
    <section id="profil" class="py-24 container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h4 class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-3">Menu Layanan Geospasial</h4>
            <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">Integrasi Data Wilayah Dalam Satu Genggaman</h2>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Profil -->
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 card-hover group shadow-sm">
                <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-blue-200 transition-transform group-hover:rotate-12">
                    <i class="bi bi-info-circle"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Profil Kelurahan</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Informasi sejarah, visi misi, dan struktur organisasi Kelurahan Battang Barat secara mendalam.</p>
                <a href="{{ route('user.profil') }}" class="text-blue-600 font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Pelajari Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>

            <!-- Administrasi -->
            <div id="wilayah" class="bg-white p-8 rounded-[2rem] border border-slate-100 card-hover group shadow-sm">
                <div class="w-16 h-16 bg-slate-800 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-slate-200 transition-transform group-hover:rotate-12">
                    <i class="bi bi-layers"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Administrasi Wilayah</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Peta batas RT/RW, zonasi wilayah, dan titik koordinat batas kelurahan yang akurat sesuai data terbaru.</p>
                <a href="{{ route('user.administrasi') }}" class="text-blue-600 font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Lihat Peta Batas <i class="bi bi-arrow-right"></i></a>
            </div>

            <!-- Fasilitas -->
            <!-- <div id="fasilitas" class="bg-white p-8 rounded-[2rem] border border-slate-100 card-hover group shadow-sm">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-orange-200 transition-transform group-hover:rotate-12">
                    <i class="bi bi-building"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Fasilitas Umum</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Sebaran titik lokasi sekolah, rumah ibadah, kesehatan, dan fasilitas publik lainnya di Battang Barat.</p>
                <a href="{{ route('user.fasilitas') }}" class="text-blue-600 font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Cari Fasilitas <i class="bi bi-arrow-right"></i></a>
            </div> -->

            <!-- Potensi -->
            <!-- <div id="potensi" class="bg-white p-8 rounded-[2rem] border border-slate-100 card-hover group shadow-sm">
                <div class="w-16 h-16 bg-emerald-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-emerald-200 transition-transform group-hover:rotate-12">
                    <i class="bi bi-tree"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Potensi Wilayah</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6"> Sebaran titik lokasi potensi wilayah berupa UMKM dan destinasi wisata di Kelurahan Battang Barat.</p>
                <a href="{{ route('user.potensi') }}" class="text-blue-600 font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Eksplorasi Potensi <i class="bi bi-arrow-right"></i></a>
            </div> -->

            <!-- Sosial -->
            <div id="sosial" class="bg-white p-8 rounded-[2rem] border border-slate-100 card-hover group shadow-sm">
                <div class="w-16 h-16 bg-red-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-red-200 transition-transform group-hover:rotate-12">
                    <i class="bi bi-heart-pulse"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Data Sosial</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Informasi kesejahteraan keluarga, bantuan sosial, dan data kesehatan masyarakat berbasis wilayah.</p>
                <a href="{{ route('user.bansos') }}" class="text-blue-600 font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Lihat Data Sosial <i class="bi bi-arrow-right"></i></a>
            </div>

            <!-- Penduduk -->
            <div id="penduduk" class="bg-white p-8 rounded-[2rem] text-white card-hover group shadow-xl">
                <div class="w-16 h-16 bg-white text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-lg shadow-blue-800 transition-transform group-hover:rotate-12">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Statistik Penduduk</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Visualisasi piramida penduduk, tingkat pendidikan, dan pekerjaan warga Kelurahan Battang Barat.</p>
                <a href="{{ route('user.penduduk') }}" class="text-blue-600  font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all">Lihat Data Penduduk <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE MAP SECTION -->
    <section class="bg-slate-900 py-24">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/3 text-white">
                    <h2 class="text-4xl font-extrabold mb-6 leading-tight">Visualisasi Data <br><span class="text-blue-400">Spasial Presisi</span></h2>
                    <p class="text-slate-400 mb-8 leading-relaxed">Peta interaktif kami menggunakan standar geospasial terkini untuk memastikan data yang ditampilkan akurat dan mudah dipahami oleh masyarakat serta pemangku kebijakan.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-400"></i> Terintegrasi Data Disdukcapil
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-400"></i> Update Lokasi Real-time
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-check-circle-fill text-blue-400"></i> Akurasi Titik Hingga 5 Meter
                        </li>
                    </ul>
                </div>
                <div class="lg:w-2/3 w-full h-[500px] bg-slate-800 rounded-[2.5rem] overflow-hidden border-8 border-slate-800 shadow-2xl relative">
                    <!-- Placeholder for Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15915.228586071536!2d120.10!3d-2.98!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93e775!2sBattang%20Barat%2C%20Palopo!5e0!3m2!1sid!2sid!4v17000000000" class="w-full h-full opacity-70 hover:opacity-100 transition-opacity duration-500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    
                    <!-- Map Controls Overlay -->
                    <div class="absolute top-6 left-6 flex flex-col gap-2">
                        <button class="bg-white w-10 h-10 rounded-lg shadow-lg flex items-center justify-center hover:bg-blue-50 text-slate-800"><i class="bi bi-plus-lg"></i></button>
                        <button class="bg-white w-10 h-10 rounded-lg shadow-lg flex items-center justify-center hover:bg-blue-50 text-slate-800"><i class="bi bi-dash-lg"></i></button>
                        <button class="bg-blue-600 w-10 h-10 rounded-lg shadow-lg flex items-center justify-center text-white mt-4"><i class="bi bi-compass"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('user.footer')

    <!-- <footer class="bg-white pt-24 pb-12 border-t border-slate-100">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 lg:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-blue-600 p-2 rounded-xl">
                            <i class="bi bi-geo-fill text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-black text-blue-900 tracking-tight">WEBGIS BATTANG BARAT</span>
                    </div>
                    <p class="text-slate-500 max-w-sm mb-8 leading-relaxed">
                        Sistem Informasi Geografis Terpadu Kecamatan Wara Barat, Kota Palopo. Mewujudkan kelurahan berbasis data menuju transformasi digital.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-4 text-slate-500">
                        <li><a href="#" class="hover:text-blue-600 transition-colors">Portal Kota Palopo</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition-colors">Kecamatan Wara Barat</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition-colors">Data Open Palopo</a></li>
                        <li><a href="#" class="hover:text-blue-600 transition-colors">Lapor Bencana</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Kontak Kami</h4>
                    <ul class="space-y-4 text-slate-500">
                        <li class="flex items-start gap-3">
                            <i class="bi bi-geo-alt-fill text-blue-600 mt-1"></i>
                            Jl. Raya Battang Barat No. 10, Wara Barat, Kota Palopo
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-envelope-fill text-blue-600"></i>
                            kel.battangbarat@palopokota.go.id
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="bi bi-telephone-fill text-blue-600"></i>
                            (0471) 123-456-789
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-8 flex flex-col md:row items-center justify-between gap-4 text-slate-400 text-sm font-medium">
                <p>© 2024 Kelurahan Battang Barat. Dikelola oleh Diskominfo Kota Palopo.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-slate-600">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-600">Terms of Service</a>
                </div>
            </div>
        </div> -->
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('py-4', 'shadow-lg');
                nav.classList.remove('py-0');
            } else {
                nav.classList.remove('py-4', 'shadow-lg');
                nav.classList.add('py-0');
            }
        });

        // Simple Mobile Menu Toggle (logic only, buttons hidden in demo)
        function toggleMenu() {
            console.log('Mobile menu toggled');
        }
    </script>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.9.0/proj4.js"></script>

<script>

    var map = L.map('heromap').setView(
        [-2.9678, 120.1000],
        13
    );

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '© OpenStreetMap'
        }
    ).addTo(map);

    fetch("{{ asset('assets/js/Batas_Wilayah_KelurahanDesa_.json') }}")

    .then(response => response.json())

    .then(data => {

        data.features.forEach(feature => {

            const nama =
                feature.attributes.WADMKD;

            const rings =
                feature.geometry.rings;

            const latlngs = rings.map(ring =>

                ring.map(coord => [

                    coord[1],
                    coord[0]

                ])

            );

            const polygon = L.polygon(latlngs, {

                color: '#fff700',
                weight: 3,

                fillColor: '#f1ee0d',
                fillOpacity: 0.2

            }).addTo(map);

            polygon.bindPopup(`
                <b>${nama}</b>
            `);

        });

        // FIX TILE KOTAK-KOTAK
        setTimeout(() => {
            map.invalidateSize();
        }, 300);

    });

</script>
</body>
</html>
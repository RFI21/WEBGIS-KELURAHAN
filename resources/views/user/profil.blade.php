<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Profil Kelurahan | WebGIS Battang Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(133, 224, 212, 0.05);
        }

       .hero-inner {
            background: linear-gradient(135deg, #6b92e0 0%, #739ee4 100%);
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

        .card-profile {
            transition: all 0.3s ease;
        }

        .card-profile:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

      {{-- header --}}
      @include('user.header')
      {{-- header end --}}

    <!-- HERO PROFIL -->
    <section class="hero-inner pt-32 pb-20 text-white">
        <div class="absolute inset-0 pattern-bg "></div>
        <div class="container mx-auto px-6 relative z-10">
            <nav class="flex mb-8 animate__animated animate__fadeIn" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-slate-300 hover:text-white">Beranda</a>
                    </li>
                    <li>
                        <div class="flex items-center text-slate-400">
                            <i class="bi bi-chevron-right text-[10px] mx-2"></i>
                            <span class="text-blue-400 font-bold">Profil Kelurahan</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown">Mengenal Lebih Dekat <br><span class="text-blue-400">Battang Barat</span></h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Gerbang utama menuju keasrian alam pegunungan Kota Palopo, tempat dimana harmoni masyarakat dan kelestarian alam bersinergi.
            </p>
        </div>
    </section>

    <!-- SEJARAH & GEOGRAFIS -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="animate__animated animate__fadeInLeft">
                    <img src="assets/img/battangbarat2.png" alt="Kelurahan battang barat" class="rounded-[2.5rem] shadow-2xl border-8 border-white">
                </div>
                <div class="animate__animated animate__fadeInRight">
                    <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-4">Tentang Wilayah</h4>
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-6">Sejarah & Letak Geografis</h2>
                    <div class="space-y-4 text-slate-600 leading-relaxed text-justify">
                        <p>
                            Kelurahan Battang Barat merupakan salah satu kelurahan di Kecamatan Wara Barat, Kota Palopo yang secara geografis berada di kawasan dataran tinggi. Dikenal dengan udaranya yang sejuk dan kontur tanah yang berbukit-bukit, wilayah ini menjadi penyangga ekosistem alam bagi Kota Palopo.
                        </p>
                        <p>
                            Terletak di poros jalan trans Sulawesi arah Toraja, Battang Barat memiliki peran strategis baik secara ekonomi maupun ekologis. Mayoritas masyarakatnya menggantungkan hidup pada sektor pertanian dan perkebunan, terutama cengkeh dan durian yang menjadi komoditas unggulan daerah ini.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                            <h5 class="font-bold text-slate-400 text-xs uppercase mb-1">Ketinggian</h5>
                            <p class="text-slate-900 font-extrabold text-lg">700 - 1.200 MDPL</p>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                            <h5 class="font-bold text-slate-400 text-xs uppercase mb-1">Suhu Rata-rata</h5>
                            <p class="text-slate-900 font-extrabold text-lg">18°C - 24°C</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VISI & MISI -->
    <section class="py-20 bg-slate-900 text-white rounded-[4rem] mx-4 lg:mx-10 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/10 blur-[100px] rounded-full"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black mb-4">Visi & Misi Kelurahan</h2>
                <div class="w-20 h-1.5 bg-blue-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Visi -->
                <div class="lg:col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-[2.5rem]">
                    <div class="text-blue-400 text-4xl mb-6"><i class="bi bi-eye-fill"></i></div>
                    <h3 class="text-2xl font-bold mb-4 italic">"Mewujudkan Battang Barat yang Mandiri, Sejahtera, dan Berwawasan Lingkungan melalui Transformasi Digital 2025"</h3>
                </div>
                
                <!-- Misi -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex gap-6 p-6 bg-white/5 rounded-3xl border border-white/5 hover:border-blue-500/50 transition-all group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center font-bold text-xl group-hover:scale-110 transition-transform">1</div>
                        <div>
                            <h4 class="text-lg font-bold mb-1">Peningkatan Layanan Publik</h4>
                            <p class="text-slate-400 text-sm">Mengoptimalkan sistem administrasi kelurahan berbasis teknologi informasi untuk pelayanan yang cepat, transparan, dan akuntabel.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-6 bg-white/5 rounded-3xl border border-white/5 hover:border-emerald-500/50 transition-all group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-emerald-600 flex items-center justify-center font-bold text-xl group-hover:scale-110 transition-transform">2</div>
                        <div>
                            <h4 class="text-lg font-bold mb-1">Pemberdayaan Ekonomi Lokal</h4>
                            <p class="text-slate-400 text-sm">Mendorong potensi agrowisata dan hasil bumi masyarakat Battang Barat untuk meningkatkan kesejahteraan taraf hidup warga.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-6 bg-white/5 rounded-3xl border border-white/5 hover:border-orange-500/50 transition-all group">
                        <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-orange-600 flex items-center justify-center font-bold text-xl group-hover:scale-110 transition-transform">3</div>
                        <div>
                            <h4 class="text-lg font-bold mb-1">Kelestarian Lingkungan</h4>
                            <p class="text-slate-400 text-sm">Menjaga keseimbangan ekosistem pegunungan dan memitigasi risiko bencana melalui pemetaan wilayah yang presisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h4 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-3">Manajemen Kelurahan</h4>
                <h2 class="text-4xl font-extrabold text-slate-900 mb-4">Struktur Organisasi</h2>
                <p class="text-slate-500">Dedikasi kami untuk melayani masyarakat Battang Barat dengan integritas dan profesionalisme.</p>
            </div>

            <div class="flex justify-center mb-16">
                <!-- Kepala Kelurahan -->
                <div class="w-full max-w-sm text-center">
                    <div class="relative inline-block mb-6">
                        <div class="absolute -inset-2 bg-blue-600/20 blur-xl rounded-full"></div>
                        <img src="{{ asset('assets/img/Staf-Lurah.jpeg') }}" alt="Lurah" class="relative w-40 h-40 rounded-full border-4 border-white shadow-xl mx-auto object-cover">
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 uppercase">Adam, S.Sos</h3>
                    <p class="text-blue-600 font-bold tracking-widest text-xs uppercase mb-2">Lurah Battang Barat</p>
                    <div class="h-1 w-12 bg-blue-600 mx-auto rounded-full"></div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Staf Item -->
                <!-- <div class="bg-white p-6 rounded-3xl border border-slate-100 text-center card-profile shadow-sm">
                    <img src="https://placehold.co/150x150/cbd5e1/475569?text=Staf" class="w-24 h-24 rounded-2xl mx-auto mb-4 object-cover shadow-md">
                    <h4 class="font-bold text-slate-800">Nama Seklur</h4>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-tight">Sekretaris Lurah</p>
                </div> -->
                <!-- Staf Item -->
                <!-- <div class="bg-white p-6 rounded-3xl border border-slate-100 text-center card-profile shadow-sm">
                    <img src="https://placehold.co/150x150/cbd5e1/475569?text=Staf" class="w-24 h-24 rounded-2xl mx-auto mb-4 object-cover shadow-md">
                    <h4 class="font-bold text-slate-800">Nama Kasi</h4>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-tight">Kasi Pemerintahan</p>
                </div> -->
                <!-- Staf Item -->
                <!-- <div class="bg-white p-6 rounded-3xl border border-slate-100 text-center card-profile shadow-sm">
                    <img src="https://placehold.co/150x150/cbd5e1/475569?text=Staf" class="w-24 h-24 rounded-2xl mx-auto mb-4 object-cover shadow-md">
                    <h4 class="font-bold text-slate-800">Nama Kasi</h4>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-tight">Kasi Pemberdayaan Masyarakat dan kelurahan</p>
                </div> -->
                <!-- Staf Item -->
                <div class="bg-white p-6 rounded-3xl border border-slate-100 text-center card-profile shadow-sm">
                    <img src="{{ asset('assets/img/Staf-Lurah.jpeg') }}" class="w-24 h-24 rounded-2xl mx-auto mb-4 object-cover shadow-md">
                    <h4 class="font-bold text-slate-800">Safaat,S.Si</h4>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-tight">Kasi Pelayanan Umum</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('user.footer')


</body>
</html>
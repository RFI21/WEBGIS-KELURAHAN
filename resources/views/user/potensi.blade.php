<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Potensi | WebGIS Battang Barat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
    
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .hero-inner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
            overflow: hidden;
        }

.pattern-bg {
    background-color: #0f172a;
    background-image:
        radial-gradient(at 20% 20%, rgba(59,130,246,0.25), transparent 50%),
        radial-gradient(at 80% 30%, rgba(16,185,129,0.20), transparent 50%),
        radial-gradient(at 50% 80%, rgba(245,158,11,0.15), transparent 50%);
}

        #map {
            height: 70vh;
            min-height: 500px;
            width: 100%;
            z-index: 1;
        }

        .custom-popup .leaflet-popup-content-wrapper {
            border-radius: 1.5rem;
            padding: 0.5rem;
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        .label-kecamatan {
            background: transparent;
            border: none;
            box-shadow: none;
            color: #1e293b;
            font-weight: 800;
            text-shadow: 0 0 4px #fff, 0 0 4px #fff;
            text-align: center;
            font-size: 10px;
            text-transform: uppercase;
            pointer-events: none;
        }

        .leaflet-control-layers {
            border-radius: 1rem !important;
            border: none !important;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important;
            padding: 10px !important;
        }
    </style>
</head>

<body class="text-slate-900">

    @include('user.header')

    <!-- HERO SECTION -->
    <section class="hero-inner pt-32 pb-20 text-white">
        <div class="absolute inset-0 pattern-bg "></div>
        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex mb-8 animate__animated animate__fadeIn" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-slate-300 hover:text-white transition-colors">Beranda</a>
                    </li>
                    <li>
                        <div class="flex items-center text-slate-400">
                            <i class="bi bi-chevron-right text-[10px] mx-2"></i>
                            <span class="text-blue-400 font-bold">Potensi Wilayah</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title & Description -->
            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown">
                Potensi Wilayah <br>
                <span class="text-blue-400">Battang Barat</span>
            </h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Sebaran titik lokasi potensi wilayah berupa UMKM dan destinasi wisata di Kelurahan Battang Barat.
            </p>
        </div>
    </section>

    <section class="py-12 -mt-8 relative z-20">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 overflow-hidden border border-slate-100 flex flex-col lg:flex-row">
                
                <!-- SIDEBAR LEGENDA -->
                <div class="w-full lg:w-80 bg-white border-b lg:border-b-0 lg:border-r border-slate-100 p-8 flex flex-col">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <h5 class="font-extrabold text-slate-800 tracking-tight">Legenda Peta</h5>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Tipe</p>
                            <div class="space-y-3">

<div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
    <i class="bi bi-shop text-orange-600 text-xl"></i>
    <span class="text-sm font-semibold text-slate-600">UMKM Lokal</span>
</div>

<div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
    <i class="bi bi-camera-fill text-blue-600 text-xl"></i>
    <span class="text-sm font-semibold text-slate-600">Wisata</span>
</div>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <!-- <div class="mt-auto p-5 bg-blue-600 rounded-[2rem] text-white">
                            <i class="bi bi-lightbulb-fill text-2xl mb-3 block text-blue-200"></i>
                            <p class="text-xs leading-relaxed opacity-90">
                                Klik pada <strong>Marker</strong> atau <strong>Wilayah Kecamatan</strong> untuk melihat detail informasi laporan fasilitas.
                            </p>
                        </div> -->
                    </div>
                </div>

                <!-- MAP AREA -->
                <div id="map" class="bg-slate-100"></div>
            </div>
        </div>
    </section>

    @include('user.footer')

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.9.0/proj4.js"></script>

<script>

    // =========================
    // INIT MAP
    // =========================
var map = L.map('map').setView(
    [-2.9678, 120.1248],
    13
);

    // =========================
    // BASEMAP
    // =========================
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '© OpenStreetMap'
        }
    ).addTo(map);

    // =========================
    // LOAD JSON
    // =========================
    fetch("{{ asset('assets/js/Batas_Wilayah_KelurahanDesa_.json') }}")


    .then(response => response.json())

    .then(data => {

        data.features.forEach(feature => {

            // nama kelurahan
            const nama =
                feature.attributes.WADMKD;

            // ambil rings polygon
            const rings =
                feature.geometry.rings;

            // convert koordinat
            const latlngs = rings.map(ring =>

                ring.map(coord => [

                    coord[1], // latitude
                    coord[0]  // longitude

                ])

            );



            // buat polygon
            const polygon = L.polygon(latlngs, {

                color: '#fff700',
                weight: 3,

                fillColor: '#ffffff',
                fillOpacity: 0.2

            }).addTo(map);

            // popup
            polygon.bindPopup(`

                <div style="padding:5px">

                    <b>${nama}</b>

                </div>

            `);

        });

    });

</script>





   <script>
    

        L.control.zoom({ position: 'topright' }).addTo(map);

        // Tile Layers
        var osmStandard = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        });

        var esriSatelit = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: '© Esri Satelite'
        });

        var darkMode = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '© CARTO'
        });

        osmStandard.addTo(map);

        var baseMaps = {
            "Peta Standar": osmStandard,
            "Satelit": esriSatelit,
            "Mode Gelap": darkMode
        };

        L.control.layers(baseMaps, null, { position: 'bottomright' }).addTo(map);

        // Icons
// Icons
// =========================
// CUSTOM ICON
// =========================

var icons = {

    "UMKM": L.divIcon({
        html: `
            <div style="
                background:#FF9421;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:10px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-shop"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    }),

    "Wisata": L.divIcon({
        html: `
            <div style="
                background:#2563eb;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:10px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi-camera-fill"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    })


};

        // Marker Data Loop (Blade Template)
@foreach($potensi as $potensi)
    @php
        $koordinat = explode(',', $potensi->lat_long);
        $lat = trim($koordinat[0] ?? 0);
        $lng = trim($koordinat[1] ?? 0);
    @endphp

    var jenis = "{{ $potensi->kategori }}";
    var icon = icons[jenis] || icons["UMKM"];

    L.marker([{{ $lat }}, {{ $lng }}], { icon: icon }).addTo(map)
    .bindPopup(`
<div style="min-width:220px">

    <!-- Gambar -->
    @if($potensi->gambar)
        <img src="{{ asset('storage/' . $potensi->gambar) }}"
             style="width:100%; height:140px; object-fit:cover; border-radius:8px; margin-bottom:10px;">
    @else
        <div style="width:100%; height:140px; background:#eee; border-radius:8px; margin-bottom:10px;
                    display:flex; align-items:center; justify-content:center; color:#777;">
            Tidak ada gambar
        </div>
    @endif

    <h4 style="margin:0 0 8px 0; font-size:16px; font-weight:bold; color:#333;">
         {{ $potensi->nama }}
    </h4>

    <div style="display:inline-block; padding:4px 8px; background:#e3f2fd; color:#1565c0; border-radius:12px; font-size:12px; margin-bottom:10px;"> 
            ${jenis}

     </div>


</div>
    `);

@endforeach


    </script>
</body>
</html>
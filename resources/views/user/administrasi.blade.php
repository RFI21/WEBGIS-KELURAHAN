<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Administrasi Wilayah | WebGIS Battang Barat</title>
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
                            <span class="text-blue-400 font-bold">Webgis</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title & Description -->
            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown">
                Webgis <br>
                <span class="text-blue-400">Battang Barat</span>
            </h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Peta batas RT/RW, zonasi wilayah, koordinat batas kelurahan, fasilitas umum, potensi  yang akurat sesuai data terbaru.
            </p>
        </div>
    </section>

    <section class="py-12 -mt-8 relative z-20">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 overflow-hidden border border-slate-100 flex flex-col lg:flex-row">
                
                <!-- SIDEBAR LEGENDA -->
                <div class="w-full lg:w-80 bg-white border-b lg:border-b-0 lg:border-r border-slate-100 p-8 flex flex-col">
<form method="GET"  class="mb-8">
<div class="flex items-center gap-3 mb-3">
    <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
        <i class="bi bi-funnel-fill"></i>
    </div>

    <h5 class="font-extrabold text-slate-800 tracking-tight mb-0">
        Filter Data
    </h5>
</div>
    <select class="w-full border rounded-lg p-2" name="filter" onchange="this.form.submit()">
        <option value="administrasi" {{ $filter=='administrasi' ? 'selected' : '' }}>
            Administrasi
        </option>

        <option value="fasilitas" {{ $filter=='fasilitas' ? 'selected' : '' }}>
            Fasilitas
        </option>

        <option value="potensi" {{ $filter=='potensi' ? 'selected' : '' }}>
            Potensi
        </option>
    </select>
</form>

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

                                @if($filter == 'administrasi')

                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl border border-transparent hover:border-red-200 transition-all">
                                    <div class="w-8 h-1.5 bg-yellow-400 rounded-full"></div>
                                    <span class="text-sm font-semibold text-slate-600">Batas Kelurahan</span>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl border border-transparent hover:border-green-200 transition-all">
                                    <div class="w-8 h-1.5 bg-red-500 rounded-full"></div>
                                    <span class="text-sm font-semibold text-slate-600">Batas RW</span>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl border border-transparent hover:border-orange-200 transition-all">
                                    <i class="bi bi-bank2"></i>
                                    <span class="text-sm font-semibold text-slate-600">Kantor Lurah Battang Barat
                                    </span>
                                </div>
                            @elseif($filter == 'fasilitas')
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-mortarboard-fill text-blue-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">Sekolah</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-building text-green-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">Rumah Ibadah</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-heart-pulse-fill text-red-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">Posyandu</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-bank2 text-orange-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">Balai</span>
                                </div>
                                @elseif($filter == 'potensi')
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-shop text-green-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">UMKM Lokal</span>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                                    <i class="bi bi-camera-fill text-blue-600 text-xl"></i>
                                    <span class="text-sm font-semibold text-slate-600">Wisata</span>
                                </div>
                                @endif


                            </div>
                        </div>


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

    // =========================
    // KONVERSI UTM 32751
    // =========================
    proj4.defs(
        "EPSG:32751",
        "+proj=utm +zone=51 +south +datum=WGS84 +units=m +no_defs"
    );

    // =========================
    // FUNCTION LOAD RW
    // =========================
    function loadRW(url, colorLine, popupName) {

        fetch(url)

        .then(response => response.json())

        .then(data => {

            data.features.forEach(feature => {

                const rings =
                    feature.geometry.rings;

                const latlngs = rings.map(ring =>

                    ring.map(coord => {

                        // konversi UTM -> latlng
                        const converted =
                            proj4(
                                "EPSG:32751",
                                "EPSG:4326",
                                coord
                            );

                        return [

                            converted[1], // lat
                            converted[0]  // lng

                        ];

                    })

                );

                const polygon = L.polygon(latlngs, {

                    color: colorLine,
                    weight: 2,

                    fillColor: '#ffffff',
                    fillOpacity: 0.1

                }).addTo(map);

                polygon.bindPopup(`

                    <div style="padding:5px">

                        <b>${popupName}</b>

                    </div>

                `);

            });

        });

    }

    // =========================
    // LOAD RW
    // =========================
    loadRW(
        "{{ asset('assets/js/BatasRW1_FeaturesToJSON.json') }}",
        "#ef4444",
        "RW 1"
    );

    loadRW(
        "{{ asset('assets/js/BatasRW2_FeaturesToJSON.json') }}",
        "#ef4444",
        "RW 2"
    );

    loadRW(
        "{{ asset('assets/js/BatasRW3_FeaturesToJSON.json') }}",
        "#ef4444",
        "RW 3"
    );

</script>

<script>

    // =========================
    // ICON KANTOR
    // =========================
    var kantorIcon = L.divIcon({

        className: '',

        html: `
            <div>
                <i class="bi bi-bank2"
                   style="
                        color:black;
                        font-size:18px;
                   ">
                </i>
            </div>
        `,

        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]

    });


    // =========================
// CUSTOM ICON FASILITAS
// =========================

var icons = {

    "Sekolah": L.divIcon({
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
                font-size:18px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    }),

    "Rumah Ibadah": L.divIcon({
        html: `
            <div style="
                background:#16a34a;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:18px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-building"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    }),

    "Posyandu": L.divIcon({
        html: `
            <div style="
                background:#dc2626;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:18px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    }),

    "Balai": L.divIcon({
        html: `
            <div style="
                background:#ea580c;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:18px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-bank2"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    }),


       "UMKM": L.divIcon({
        html: `
            <div style="
                background:#16a34a;
                width:40px;
                height:40px;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:18px;
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
                font-size:18px;
                box-shadow:0 4px 10px rgba(0,0,0,0.3);
            ">
                <i class="bi bi-camera-fill"></i>
            </div>
        `,
        className: '',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -35]
    })


};

    // =========================
    // MARKER 
    // =========================
 @if($filter == 'administrasi')

L.marker(
    [-2.9591691,120.0808239],
    {
        icon: kantorIcon
    }
)
.addTo(map)
.bindPopup(`
    <div style="padding:5px">
        <b>Kantor Lurah Battang Barat</b>
    </div>
`);

@endif

@if($filter == 'fasilitas')

@foreach($fasilitass as $fasilitas)

    @php
        $koordinat = explode(',', $fasilitas->long_lat);
        $lat = trim($koordinat[0] ?? 0);
        $lng = trim($koordinat[1] ?? 0);
    @endphp

    L.marker([{{ $lat }}, {{ $lng }}], {
        icon: icons["{{ $fasilitas->kategori }}"]
    })
    .addTo(map)
    .bindPopup(`
    <div style="min-width:260px; font-family:Arial, sans-serif; line-height:1.4;">

    <!-- Gambar -->
    @if($fasilitas->gambar)
        <img src="{{ asset('storage/' . $fasilitas->gambar) }}"
             style="width:100%; height:140px; object-fit:cover; border-radius:8px; margin-bottom:10px;">
    @else
        <div style="width:100%; height:140px; background:#eee; border-radius:8px; margin-bottom:10px;
                    display:flex; align-items:center; justify-content:center; color:#777;">
            Tidak ada gambar
        </div>
    @endif

    <!-- Judul -->
    <h4 style="margin:0 0 8px 0; font-size:16px; font-weight:bold; color:#333;">
        {{ $fasilitas->nama_fasilitas }}
    </h4>

    <!-- Kategori -->
    <div style="display:inline-block; padding:4px 8px; background:#e3f2fd; color:#1565c0;
                border-radius:12px; font-size:12px; margin-bottom:10px;">
        {{ $fasilitas->kategori }}
    </div>

    <!-- Lokasi -->
    <p style="margin:8px 0;">
        <b>Lokasi :</b><br>
        {{ $fasilitas->lokasi }}
    </p>

    <!-- Jumlah -->
    <p style="margin:8px 0;">
        <b>
            @if($fasilitas->kategori == 'Sekolah')
                Jumlah Siswa :
            @else
                Daya Tampung
            @endif
        </b><br>

        {{ $fasilitas->jumlah }}

        @if($fasilitas->kategori == 'Sekolah')
            Siswa
        @else
            Orang
        @endif
    </p>

</div>
    `);

@endforeach

@endif

@if($filter == 'potensi')

@foreach($potensis as $potensi)

    @php
        $koordinat = explode(',', $potensi->lat_long);
        $lat = trim($koordinat[0] ?? 0);
        $lng = trim($koordinat[1] ?? 0);
    @endphp

    L.marker([{{ $lat }}, {{ $lng }}], {
        icon: icons["{{ $potensi->kategori }}"]
    })
    .addTo(map)
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
            {{ $potensi->kategori }}

     </div>


</div>
    `);

@endforeach

@endif

</script>
</body>
</html>
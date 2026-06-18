
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Penduduk | WebGIS Battang Barat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Chart.js (Untuk Diagram Lingkaran) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        /* Container khusus chart agar responsif */
        .chart-container {
            position: relative;
            height: 70vh;
            min-height: 500px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
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
                            <span class="text-blue-400 font-bold">Demografi Penduduk</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title & Description -->
            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown">
                Demografi Penduduk <br>
                <span class="text-blue-400">Battang Barat</span>
            </h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Visualisasi perbandingan jenis kelamin, total penduduk, serta jumlah kepala keluarga berdasarkan data terbaru.
            </p>
        </div>
    </section>

    <section class="py-12 -mt-8 relative z-20">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-900/5 overflow-hidden border border-slate-100 flex flex-col lg:flex-row">
                
                <!-- SIDEBAR INFORMASI PENDUDUK (PENGGANTI LEGENDA) -->
                <div class="w-full lg:w-80 bg-white border-b lg:border-b-0 lg:border-r border-slate-100 p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h5 class="font-extrabold text-slate-800 tracking-tight">Informasi Penduduk</h5>
                        </div>

                        <div class="space-y-6">
                            <!-- Card Jumlah Penduduk -->
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 transition-all">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Penduduk</p>
                                <div class="flex items-baseline gap-2">
                                    <!-- Silakan sesuaikan angka dummy 2.450 ini dengan data riil -->
                                    <span class="text-3xl font-black text-slate-800">{{ number_format($data->jumlah_penduduk, 0, ',', '.') }}</span>
                                    <span class="text-sm font-semibold text-slate-500">Jiwa</span>
                                </div>
                            </div>

                            <!-- Card Jumlah KK -->
                            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-blue-200 transition-all">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kepala Keluarga (KK)</p>
                                <div class="flex items-baseline gap-2">
                                    <!-- Silakan sesuaikan angka dummy 680 ini dengan data riil -->
                                    <span class="text-3xl font-black text-slate-800">{{ number_format($data->jumlah_kk, 0, ',', '.') }}</span>
                                    <span class="text-sm font-semibold text-slate-500">KK</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keterangan Tambahan -->
                    <div class="mt-8 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                        <p class="text-xs text-blue-700 leading-relaxed">
                            <i class="bi bi-info-circle-fill mr-1"></i> Data di samping menunjukkan persentase perbandingan jumlah penduduk Laki-laki dan Perempuan di Kelurahan Battang Barat.
                        </p>
                    </div>
                </div>

                <!-- DIAGRAM AREA (PENGGANTI MAP) -->
                <div class="flex-1 bg-slate-50 chart-container">
                    <div class="w-full max-w-md h-full flex flex-col justify-center items-center">
                        <canvas id="genderChart"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('user.footer')

    @php
    $data = $penduduk->first();
@endphp
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Plugin Persentase -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
        // ========================================================
        // KONFIGURASI DIAGRAM LINGKARAN (CHART.JS)
        // ========================================================
        
        // SIlakan ganti angka 1280 (Laki-laki) dan 1170 (Perempuan) sesuai data riil Anda
const jumlahLakiLaki = {{ $data->laki_laki }};
const jumlahPerempuan = {{ $data->perempuan }};
const totalUmat = jumlahLakiLaki + jumlahPerempuan;

        const ctx = document.getElementById('genderChart').getContext('2d');
        Chart.register(ChartDataLabels);
        const genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                        labels: [
            'Laki-laki (' + jumlahLakiLaki.toLocaleString('id-ID') + ' Jiwa)',
            'Perempuan (' + jumlahPerempuan.toLocaleString('id-ID') + ' Jiwa)'
        ],

                datasets: [{
                    data: [jumlahLakiLaki, jumlahPerempuan],
                    backgroundColor: [
                        '#3b82f6', // Biru Tailwind (Laki-laki)
                        '#f43f5e'  // Pink/Rose Tailwind (Perempuan)
                    ],
                    borderWidth: 4,
                    borderColor: '#ffffff',
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                                   // PERSENTASE DI DALAM CHART
                datalabels: {
                    color: '#ffffff',
                    font: {
                        weight: 'bold',
                        size: 18
                    },
                    formatter: (value) => {
                        let percentage = ((value / totalUmat) * 100).toFixed(1);
        return [
            percentage + '%',
        ];
                    }
                },

                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                family: "'Plus Jakarta Sans', sans-serif",
                                size: 14,
                                weight: '600'
                            },
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'circle'
                            
                        }
                    },
                    tooltip: {
                        callbacks: {
                            // Menampilkan jumlah absolut dan persentase otomatis saat di-hover
                            label: function(context) {
                                let value = context.raw;
                                let percentage = ((value / totalUmat) * 100).toFixed(1);
                                return ` ${context.label}: ${value.toLocaleString('id-ID')} Jiwa (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
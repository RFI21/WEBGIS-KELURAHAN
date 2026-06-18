<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Penerima BANSOS | WebGIS Battang Barat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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

        .chart-container {
            position: relative;
            height: 180px;
            width: 100%;
            overflow: hidden;
        }

        .card-stats {
            transition: all 0.3s ease;
                display: flex;
    flex-direction: column;
    height: auto;
        }

        .card-stats:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.05);
        }

        canvas {
    max-height: 180px !important;
}

.detail-box {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}
.detail-box:not(.hidden) {
    max-height: 300px;
}

    </style>
</head>

<body class="text-slate-900">

    @include('user.header')


    <section class="hero-inner pt-32 pb-20 text-white">
        <div class="absolute inset-0 pattern-bg "></div>
        <div class="container mx-auto px-6 relative z-10">
            <nav class="flex mb-8 animate__animated animate__fadeIn" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li><a href="/" class="text-slate-300">Beranda</a></li>
                    <li><i class="bi bi-chevron-right text-[10px] mx-2 text-slate-400"></i></li>
                    <li class="text-blue-400 font-bold">Data Bansos</li>
                </ol>
            </nav>

            <h1 class="text-4xl lg:text-5xl font-black mb-4 animate__animated animate__fadeInDown">
                Distribusi Penerima <br>
                <span class="text-blue-400">PKH & BPNT Per RW</span>
            </h1>
            <p class="text-slate-300 max-w-2xl text-lg animate__animated animate__fadeInUp animate__delay-1s">
                Visualisasi data perbandingan jenis bantuan sosial yang disalurkan kepada masyarakat Kelurahan Battang Barat berdasarkan rukun warga.
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
                        <h5 class="font-extrabold text-slate-800 tracking-tight">Keterangan Bantuan</h5>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Jenis BANSOS</p>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-2xl border border-blue-100">
                                    <div class="w-4 h-4 bg-blue-600 rounded-full shadow-lg shadow-blue-200"></div>
                                    <span class="text-sm font-semibold text-blue-700 uppercase">PKH</span>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-emerald-50 rounded-2xl border border-emerald-100">
                                    <div class="w-4 h-4 bg-emerald-500 rounded-full shadow-lg shadow-emerald-200"></div>
                                    <span class="text-sm font-semibold text-emerald-700 uppercase">BPNT</span>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-yellow-50 rounded-2xl border border-yellow-100">
                                    <div class="w-4 h-4 bg-yellow-500 rounded-full shadow-lg shadow-yellow-200"></div>
                                    <span class="text-sm font-semibold text-yellow-700 uppercase">BPJS</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 bg-slate-900 rounded-[2rem] text-white">
                            <h6 class="font-bold mb-2 flex items-center gap-2">
                                <i class="bi bi-lightbulb text-yellow-400"></i> Info
                            </h6>
                            <p class="text-[11px] leading-relaxed opacity-70">
                                Data di samping menunjukkan proporsi penerima manfaat bantuan sosial antara PKH dan BPNT di masing-masing RW (Rukun Warga).
                            </p>
                        </div>
                    </div>
                </div>

<!-- CHARTS AREA -->
<div class="flex-1 p-8 lg:p-12 bg-slate-50/50">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

        @foreach($bansos as $item)

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm card-stats animate__animated animate__fadeIn">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <h3 class="font-black text-slate-800">
                    {{ $item->rw }}
                </h3>

                <span class="bg-slate-100 text-slate-500 text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                    BANSOS
                </span>

            </div>

            <!-- CHART -->
            <div class="chart-container">
                <canvas id="chart{{ $loop->index }}"></canvas>
            </div>

            <!-- FOOTER -->
            <div class="mt-6 flex justify-between text-xs font-bold text-slate-400 px-2">

                <span>
                    Total: {{ $item->total }} KK
                </span>

                <button
                    onclick="toggleDetail({{ $loop->index }})"
                    class="text-blue-600 underline hover:text-blue-800 transition"
                >
                    Detail Data
                </button>

            </div>

            <!-- DETAIL -->
            <div id="detail{{ $loop->index }}"
                class="detail-box hidden mt-5 border-t border-slate-100 pt-4 overflow-hidden">

                <div class="flex items-center justify-between py-2">

                    <span class="text-sm text-slate-600">
                        Penerima PKH
                    </span>

                    <span class="font-bold text-blue-600">
                        {{ $item->pkh }} KK
                    </span>

                </div>

                <div class="flex items-center justify-between py-2">

                    <span class="text-sm text-slate-600">
                        Penerima BPNT
                    </span>

                    <span class="font-bold text-emerald-600">
                        {{ $item->bpnt }} KK
                    </span>

                </div>

                <div class="flex items-center justify-between py-2">

                    <span class="text-sm text-slate-600">
                        Penerima BPJS
                    </span>

                    <span class="font-bold text-yellow-600">
                        {{ $item->bpjs }} KK
                    </span>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>
            </div>
        </div>
    </section>
    @include('user.footer')

 <script>

function toggleDetail(index) {

    const all = document.querySelectorAll('.detail-box');

    all.forEach(el => {
        if (el.id !== 'detail' + index) {
            el.classList.add('hidden');
        }
    });

    const target = document.getElementById('detail' + index);
    target.classList.toggle('hidden');
}

    const chartConfig = (dataPKH, dataBPNT, dataBPJS) => {

        return {

            type: 'doughnut',

            data: {

                labels: ['PKH', 'BPNT', 'BPJS'],

                datasets: [{

                    data: [dataPKH, dataBPNT, dataBPJS],

                    backgroundColor: ['#2563eb', '#10b981', '#f59e0b'],

                    hoverBackgroundColor: ['#1d4ed8', '#059669', '#d97706'],

                    borderWidth: 0,

                    hoverOffset: 15

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '65%',

                plugins: {

                    legend: {

                        display: false

                    }

                }

            }

        };

    };

    window.onload = function() {

        @foreach($bansos as $item)

            new Chart(

                document.getElementById('chart{{ $loop->index }}'),

                chartConfig(

                    {{ $item->pkh }},

                    {{ $item->bpnt }},

                    {{ $item->bpjs }}

                )

            );

        @endforeach

    };

</script>
</body>

</html>
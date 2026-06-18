 
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

 <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3 text-white">
    <div class="text-center mb-5">
<div class="flex flex-col items-center text-center">
    
    <!-- Icon -->
    <div class="bg-blue-600 p-3 rounded-2xl mb-2 shadow-lg">
        <i class="bi bi-geo-fill text-white text-2xl"></i>
    </div>

    <!-- Text -->
    <div>
        <span class="text-xl font-extrabold tracking-tight text-blue-900 block leading-none">
            BATTANG BARAT
        </span>

        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">
            WebGIS Terpadu
        </span>
    </div>

</div>
  </div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="{{ route('admin.index') }}" class="nav-link {{ Request::routeIs('admin.index') ? ' bg-blue-600 text-white rounded-xl' : '' }}  d-flex align-items-center">
          <i class="bi-speedometer2 me-2"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('admin.fasilitas') }}" class="nav-link {{ Request::routeIs('admin.fasilitas') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-clipboard-heart me-2"></i>
           Data Fasilitas
        </a>
      </li>
      <li>
        <a href="{{ route('admin.potensi') }}" class="nav-link {{ Request::routeIs('admin.potensi') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-map-fill me-2"></i>
           Data Potensi
        </a>
      </li>
            <li>
        <a href="{{ route('admin.bansos') }}" class="nav-link {{ Request::routeIs('admin.bansos') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-wallet2 me-2 "></i>
           Data BANSOS
        </a>
      </li>
            <li>
        <a href="{{ route('admin.kelompoktani') }}" class="nav-link {{ Request::routeIs('admin.kelompoktani') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-tree-fill me-2"></i>
           Kelompok Tani
        </a>
      </li>
            <li>
        <a href="{{ route('admin.penduduk') }}" class="nav-link {{ Request::routeIs('admin.penduduk') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-people-fill me-2"></i>
           Data Penduduk
        </a>
      </li>
      <li>
        <a href="{{ route('admin.admin') }}" class="nav-link {{ Request::routeIs('admin.admin') ? ' bg-blue-600 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi-person-badge me-2"></i>
          Admin
        </a>
      </li>
    </ul>
  </div>
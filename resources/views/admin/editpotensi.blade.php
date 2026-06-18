<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Potensi | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

   
</head>
<body>

       {{-- header --}}
      @include('admin.header')
      {{-- header end --}}
  

  <!-- Main Content -->
  <div class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm rounded mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h4">WEBGIS TERPADU KELURAHAN BATTANG BARAT</span>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
          
            <i class="bi bi-person-circle text-secondary "></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            @foreach ($admins as $admin)
            <li><h6 class="dropdown-header">{{ $admin->nama }}</h6></li>
        @endforeach
        
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger " href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

<!-- form edit -->
<div class="container">


<div class="card mb-4">
<div class="card-header bg-dark text-white">
Form Edit Potensi
</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.potensi.update', $potensi->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- Kategori -->
<div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>

    <select name="kategori" id="kategori" class="form-select" required>

        <option value="">-- Pilih Kategori --</option>

        <option value="UMKM"
            {{ $potensi->kategori == 'UMKM' ? 'selected' : '' }}>
            UMKM
        </option>

        <option value="Wisata"
            {{ $potensi->kategori == 'Wisata' ? 'selected' : '' }}>
            Wisata
        </option>

    </select>
</div>

<!-- nama -->
<div class="mb-3">
    <label for="nama" class="form-label">Nama Potensi</label>
    <input type="text" name="nama" id="nama" class="form-control" 
           value="{{ $potensi->nama }}" required>
</div>

<!-- Lokasi -->
<div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>

    <select name="lokasi" id="lokasi" class="form-select" required>

        <option value="">-- Pilih RW --</option>

        <option value="RW 1"
            {{ $potensi->lokasi == 'RW 1' ? 'selected' : '' }}>
            RW 1
        </option>

        <option value="RW 2"
            {{ $potensi->lokasi == 'RW 2' ? 'selected' : '' }}>
            RW 2
        </option>

        <option value="RW 3"
            {{ $potensi->lokasi == 'RW 3' ? 'selected' : '' }}>
            RW 3
        </option>

    </select>
</div>


<div class="mb-3">
    <label>Gambar Lama</label><br>
    <img src="{{ asset('storage/' . $potensi->gambar) }}" width="120">
</div>

<div class="mb-3">
    <label>Ganti Gambar</label>
    <input type="file" name="gambar" class="form-control" accept="image/*">
</div>




            @php
$lat_long = explode(',', $potensi->lat_long);
@endphp

            <div class="row mb-3">
              <div class="col-md-6">
                <label  for="latitude" class="form-label">Latitude</label>
                
                <input id="latitude" type="text" name="latitude"
value="{{ old('latitude', $lat_long[0] ?? '') }}">
 </div>
              <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input id="longitude"  type="text" name="longitude"
value="{{ old('longitude', $lat_long[1] ?? '') }}">
              </div>
            </div>


            <div class="mb-3">
              <label for="map" class="form-label">Pilih Lokasi pada Peta</label>
              <div id="map" style="height: 400px; border-radius: 8px;"></div>
            </div>


<button type="submit" class="btn btn-success mt-3 rounded-pill">
Update
</button>

<a href="{{ route('admin.potensi') }}" class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">
<i class="bi bi-arrow-left-circle me-2"></i> Kembali
</a>

</form>

</div>
</div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

   <script>


    var lat = {{ $lat_long[0] ?? -2.9678}};
    var lng = {{ $lat_long[1] ?? 120.1248}};

    var map = L.map('map').setView([lat, lng], 13);


    // =========================
    // TILE LAYER
    // =========================
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

        // =========================
    // MARKER
    // =========================
    var marker = L.marker([lat, lng]).addTo(map);

    map.on('click', function(e) {

        var latitude = e.latlng.lat.toFixed(6);
        var longitude = e.latlng.lng.toFixed(6);

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

        marker.setLatLng(e.latlng);

    });


  </script>





</body>
</html>
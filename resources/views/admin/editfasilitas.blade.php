<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit fasilitas | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
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
Form Edit Fasilitas
</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- Kategori -->
<div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>

    <select name="kategori" id="kategori" class="form-select" required>

        <option value="">-- Pilih Kategori --</option>

        <option value="Sekolah"
            {{ $fasilitas->kategori == 'Sekolah' ? 'selected' : '' }}>
            Sekolah
        </option>

        <option value="Rumah Ibadah"
            {{ $fasilitas->kategori == 'Rumah Ibadah' ? 'selected' : '' }}>
            Rumah Ibadah
        </option>

        <option value="Posyandu"
            {{ $fasilitas->kategori == 'Posyandu' ? 'selected' : '' }}>
            Posyandu
        </option>

        <option value="Balai"
            {{ $fasilitas->kategori == 'Balai' ? 'selected' : '' }}>
            Balai
        </option>

        <option value="Infrastruktur"
            {{ $fasilitas->kategori == 'Infrastruktur' ? 'selected' : '' }}>
            Infrastruktur
        </option>

    </select>
</div>

<!-- nama_fasilitas -->
<div class="mb-3">
    <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
    <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" 
           value="{{ $fasilitas->nama_fasilitas }}" required>
</div>

<!-- Lokasi -->
<div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>

    <select name="lokasi" id="lokasi" class="form-select" required>

        <option value="">-- Pilih RW --</option>

        <option value="RW 1"
            {{ $fasilitas->lokasi == 'RW 1' ? 'selected' : '' }}>
            RW 1
        </option>

        <option value="RW 2"
            {{ $fasilitas->lokasi == 'RW 2' ? 'selected' : '' }}>
            RW 2
        </option>

        <option value="RW 3"
            {{ $fasilitas->lokasi == 'RW 3' ? 'selected' : '' }}>
            RW 3
        </option>

    </select>
</div>

<!-- Jumlah / Daya Tampung -->
<div class="mb-3">
    <label for="jumlah" class="form-label" id="labeljumlah">
        {{ $fasilitas->kategori == 'Sekolah' ? 'Jumlah Siswa' : 'Daya Tampung' }}
    </label>

    <input 
        type="text" 
        name="jumlah" 
        id="jumlah" 
        class="form-control"
        value="{{ $fasilitas->jumlah }}" 
        required
    >
</div>
    <div class="mb-3">
        <label class="form-label">Gambar Lama</label><br>
        <img src="{{ asset('storage/' . $fasilitas->gambar) }}" width="120">
    </div>

    <div class="mb-3">
        <label class="form-label">Ganti Gambar</label>
        <input type="file" name="gambar" class="form-control">
        <small>Kosongkan jika tidak ingin mengganti gambar</small>
    </div>


            @php
$long_lat = explode(',', $fasilitas->long_lat);
@endphp

            <div class="row mb-3">
              <div class="col-md-6">
                <label  for="latitude" class="form-label">Latitude</label>
                
                <input id="latitude" type="text" name="latitude"
value="{{ old('latitude', $long_lat[0] ?? '') }}">
 </div>
              <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input id="longitude"  type="text" name="longitude"
value="{{ old('longitude', $long_lat[1] ?? '') }}">
              </div>
            </div>


            <div class="mb-3">
              <label for="map" class="form-label">Pilih Lokasi pada Peta</label>
              <div id="map" style="height: 400px; border-radius: 8px;"></div>
            </div>


<button type="submit" class="btn btn-success mt-3 rounded-pill">
Update
</button>

<a href="{{ route('admin.fasilitas') }}" class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">
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


    var lat = {{ $long_lat[0] ?? -2.9678}};
    var lng = {{ $long_lat[1] ?? 120.1248}};

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




<script>

    const kategori = document.getElementById('kategori');
    const labeljumlah = document.getElementById('labeljumlah');

    function ubahLabel() {

        if (kategori.value === 'Sekolah') {

            labeljumlah.innerText = 'Jumlah Siswa';

        } else if (
            kategori.value === 'Rumah Ibadah' ||
            kategori.value === 'Balai' ||
            kategori.value === 'Posyandu'
        ) {

            labeljumlah.innerText = 'Daya Tampung';

        } else {

            labeljumlah.innerText = 'Keterangan';

        }
    }

    // jalankan saat halaman dibuka
    ubahLabel();

    // jalankan saat kategori berubah
    kategori.addEventListener('change', ubahLabel);

</script>
</body>
</html>
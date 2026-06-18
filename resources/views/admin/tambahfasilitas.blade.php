<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Fasilitas | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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
            <i class="bi bi-person-circle text-secondary"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            @foreach ($admins as $admin)
              <li><h6 class="dropdown-header">{{ $admin->nama }}</h6></li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Form Tambah fasilitas -->
    <div class="container">

      <div class="card mb-4">
        <div class="card-header bg-dark text-white">Form Tambah Fasilitas</div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.fasilitas.simpan') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Sekolah">Sekolah</option>
                    <option value="Rumah Ibadah">Rumah Ibadah</option>
                    <option value="Posyandu">Posyandu</option>
                    <option value="Balai">Balai</option>
                    <option value="Infrastruktur">Infrastruktur</option>
                </select>
            </div>

            <div class="mb-3">
              <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
              <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" rows="3" required></input>
            </div>

<div class="mb-3">
    <label for="lokasi" class="form-label">Lokasi</label>

    <select name="lokasi" id="lokasi" class="form-select" required>
        <option value="">-- Pilih RW --</option>

        <option value="RW 1">RW 1</option>
        <option value="RW 2">RW 2</option>
        <option value="RW 3">RW 3</option>

    </select>
</div>

            <div class="mb-3">
              <label for="jumlah" class="form-label" id="labeljumlah">Jumlah Siswa</label>
              <input type="text" name="jumlah" id="jumlah" class="form-control" rows="2" required></input>
            </div>

            <div class="mb-3">
  <label for="gambar" class="form-label">Gambar Fasilitas</label>
  <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
</div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="map" class="form-label">Pilih Lokasi pada Peta</label>
              <div id="map" style="height: 400px; border-radius: 8px;"></div>
            </div>

            <button type="submit" class="btn btn-success mt-3 rounded-pill">Simpan</button>
                  <a href="{{ route('admin.fasilitas') }}" class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">
        <i class="bi bi-arrow-left-circle me-2"></i> Kembali
      </a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  
  <script>
    flatpickr("#jam_mulai", { enableTime: true, noCalendar: true, dateFormat: "H:i", time_24hr: true });
    flatpickr("#jam_selesai", { enableTime: true, noCalendar: true, dateFormat: "H:i", time_24hr: true });

    // Leaflet map
    var map = L.map('map').setView(
    [-2.9678, 120.1248],
    13
);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker;
    map.on('click', function(e) {
      var lat = e.latlng.lat.toFixed(6);
      var lng = e.latlng.lng.toFixed(6);
      document.getElementById('latitude').value = lat;
      document.getElementById('longitude').value = lng;

      if (marker) marker.setLatLng(e.latlng);
      else marker = L.marker(e.latlng).addTo(map);
    });


   
  </script>


<script>

    const kategori = document.getElementById('kategori');
    const label = document.getElementById('labeljumlah');

    kategori.addEventListener('change', function () {

        if (this.value === 'Sekolah') {

            label.innerText = 'Jumlah Siswa';

        } else if (
            this.value === 'Rumah Ibadah' ||
            this.value === 'Balai' ||
            this.value === 'Posyandu'
        ) {

            label.innerText = 'Daya Tampung';

        } else {

            label.innerText = 'Keterangan';

        }

    });

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Potensi | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <!-- Daftar potensi -->
    <div id="wisata">
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold">Daftar Potensi</h5>
          <a href="{{ route('admin.potensi.tambah') }}" class="btn btn-primary">+ Tambah</a>

        </div>
        <table class="table table-bordered table-hover">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Nama Potensi</th>
              <th>Lokasi</th>
              <th>Lat/Long</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($potensi as $index => $potens)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $potens->kategori }}</td>
                <td>{{ $potens->nama }}</td>
                <td>{{ $potens->lokasi }}</td>
                <td>{{ $potens->lat_long}}</td>
                <td>
    <img src="{{ asset('storage/' . $potens->gambar) }}" width="100" class="img-thumbnail">
</td>
                
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <a href="{{ route('admin.potensi.edit', $potens->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.potensi.hapus', $potens->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                         <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>

                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="12" class="text-center">Belum ada data potensi.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
          {{ $potensi->links() }}
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

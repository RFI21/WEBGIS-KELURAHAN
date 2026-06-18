<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Bansos | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
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

    <!-- Daftar bansos -->
    <div id="wisata">
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold">Daftar Bansos</h5>
          <a href="{{ route('admin.bansos.tambah') }}" class="btn btn-primary">+ Tambah</a>

        </div>
        <table class="table table-bordered table-hover">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>RW</th>
              <th>PKH</th>
              <th>BPNT</th>
              <th>BPJS</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($bansos as $index => $banso)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $banso->rw }}</td>
                <td>{{ $banso->pkh }}</td>
                <td>{{ $banso->bpnt }}</td>
                <td>{{ $banso->bpjs }}</td>
                <td>{{ $banso->total}}</td>
                
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <a href="{{ route('admin.bansos.edit', $banso->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.bansos.hapus', $banso->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                         <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>

                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="12" class="text-center">Belum ada data bansos.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
          {{ $bansos->links() }}
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

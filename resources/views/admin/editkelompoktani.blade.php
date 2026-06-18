<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Kelompok Tani | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

</head>

<body>

@include('admin.header')

<div class="content">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm rounded mb-4">

        <div class="container-fluid">

            <span class="navbar-brand mb-0 h4">
                WEBGIS TERPADU KELURAHAN BATTANG BARAT
            </span>

            <div class="dropdown">

                <a href="#"
                   class="d-flex align-items-center text-decoration-none dropdown-toggle"
                   id="dropdownUser"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">

                    <i class="bi bi-person-circle text-secondary"></i>

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    @foreach ($admins as $admin)

                        <li>
                            <h6 class="dropdown-header">
                                {{ $admin->nama }}
                            </h6>
                        </li>

                    @endforeach

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item text-danger"
                           href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- FORM -->
    <div class="container">

        <div class="card mb-4">

            <div class="card-header bg-dark text-white">
                Form Edit Kelompok Tani
            </div>

            <div class="card-body">

 <form method="POST"
      action="{{ route('admin.kelompoktani.update', $kelompoktani->id) }}">

    @csrf
    @method('PUT')

    <!-- RW -->
    <div class="mb-3">

        <label for="rw" class="form-label">
            RW
        </label>

        <select name="rw"
                id="rw"
                class="form-select"
                required>

            <option value="">-- Pilih RW --</option>

            <option value="RW 1"
                {{ $kelompoktani->rw == 'RW 1' ? 'selected' : '' }}>
                RW 1
            </option>

            <option value="RW 2"
                {{ $kelompoktani->rw == 'RW 2' ? 'selected' : '' }}>
                RW 2
            </option>

            <option value="RW 3"
                {{ $kelompoktani->rw == 'RW 3' ? 'selected' : '' }}>
                RW 3
            </option>

        </select>

    </div>

    <!-- Nama Kelompok -->
    <div class="mb-3">

        <label for="nama_kelompok" class="form-label">
            Nama Kelompok
        </label>

        <input type="text"
               name="nama_kelompok"
               id="nama_kelompok"
               class="form-control"
               value="{{ $kelompoktani->nama_kelompok }}"
               required>

    </div>

    <!-- Ketua -->
    <div class="mb-3">

        <label for="ketua" class="form-label">
            Ketua
        </label>

        <input type="text"
               name="ketua"
               id="ketua"
               class="form-control"
               value="{{ $kelompoktani->ketua }}"
               required>

    </div>

    <!-- Jumlah -->
    <div class="mb-3">

        <label for="jumlah" class="form-label">
            Jumlah Anggota
        </label>

        <input type="number"
               name="jumlah"
               id="jumlah"
               class="form-control"
               value="{{ $kelompoktani->jumlah }}"
               required>

    </div>

    <!-- Komoditas -->
    <div class="mb-3">

        <label for="komoditas" class="form-label">
            Komoditas Utama
        </label>

        <input type="text"
               name="komoditas"
               id="komoditas"
               class="form-control"
               value="{{ $kelompoktani->komoditas }}"
               required>

    </div>

    <!-- Status -->
    <div class="mb-3">

        <label for="status" class="form-label">
            Status
        </label>

        <select name="status"
                id="status"
                class="form-select"
                required>

            <option value="">-- Pilih Status --</option>

            <option value="Aktif"
                {{ $kelompoktani->status == 'Aktif' ? 'selected' : '' }}>
                Aktif
            </option>

            <option value="Tidak Aktif"
                {{ $kelompoktani->status == 'Tidak Aktif' ? 'selected' : '' }}>
                Tidak Aktif
            </option>

        </select>

    </div>

    <!-- Button -->
    <button type="submit"
            class="btn btn-success mt-3 rounded-pill">

        Update

    </button>

    <a href="{{ route('admin.kelompoktani') }}"
       class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">

        <i class="bi bi-arrow-left-circle me-2"></i>

        Kembali

    </a>

</form>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
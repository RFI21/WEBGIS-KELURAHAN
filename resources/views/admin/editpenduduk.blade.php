<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Penduduk | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>


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
<!-- FORM -->
<div class="container">

    <div class="card mb-4">

        <div class="card-header bg-dark text-white">
            Form Edit Penduduk
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.penduduk.update', $penduduk->id) }}">

                @csrf
                @method('PUT')

                <!-- Jumlah Penduduk -->
                <div class="mb-3">

                    <label for="jumlah_penduduk" class="form-label">
                        Jumlah Penduduk
                    </label>

                    <input type="number"
                           name="jumlah_penduduk"
                           id="jumlah_penduduk"
                           class="form-control"
                           value="{{ $penduduk->jumlah_penduduk }}"
                           required>

                </div>

                <!-- Jumlah KK -->
                <div class="mb-3">

                    <label for="jumlah_kk" class="form-label">
                        Jumlah KK
                    </label>

                    <input type="number"
                           name="jumlah_kk"
                           id="jumlah_kk"
                           class="form-control"
                           value="{{ $penduduk->jumlah_kk }}"
                           required>

                </div>

                <!-- Laki-laki -->
                <div class="mb-3">

                    <label for="laki_laki" class="form-label">
                        Jumlah Laki-laki
                    </label>

                    <input type="number"
                           name="laki_laki"
                           id="laki_laki"
                           class="form-control"
                           value="{{ $penduduk->laki_laki }}"
                           required>

                </div>

                <!-- Perempuan -->
                <div class="mb-3">

                    <label for="perempuan" class="form-label">
                        Jumlah Perempuan
                    </label>

                    <input type="number"
                           name="perempuan"
                           id="perempuan"
                           class="form-control"
                           value="{{ $penduduk->perempuan }}"
                           required>

                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-success mt-3 rounded-pill">

                    Update

                </button>

                <a href="{{ route('admin.penduduk') }}"
                   class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">

                    <i class="bi bi-arrow-left-circle me-2"></i>

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit BANSOS | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>


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
                Form Edit BANSOS
            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.bansos.update', $bansos->id) }}">

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
                                {{ $bansos->rw == 'RW 1' ? 'selected' : '' }}>
                                RW 1
                            </option>

                            <option value="RW 2"
                                {{ $bansos->rw == 'RW 2' ? 'selected' : '' }}>
                                RW 2
                            </option>

                            <option value="RW 3"
                                {{ $bansos->rw == 'RW 3' ? 'selected' : '' }}>
                                RW 3
                            </option>

                        </select>

                    </div>

                    <!-- PKH -->
                    <div class="mb-3">

                        <label for="pkh" class="form-label">
                            Jumlah Penerima PKH
                        </label>

                        <input type="number"
                               name="pkh"
                               id="pkh"
                               class="form-control"
                               value="{{ $bansos->pkh }}"
                               required>

                    </div>

                    <!-- BPNT -->
                    <div class="mb-3">

                        <label for="bpnt" class="form-label">
                            Jumlah Penerima BPNT
                        </label>

                        <input type="number"
                               name="bpnt"
                               id="bpnt"
                               class="form-control"
                               value="{{ $bansos->bpnt }}"
                               required>

                    </div>

                    <div class="mb-3">
    <label for="bpjs" class="form-label">Jumlah Penerima BPJS</label>
    <input type="number" name="bpjs" id="bpjs" class="form-control" value="{{ $bansos->bpjs }}" required>
</div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn btn-success mt-3 rounded-pill">

                        Update

                    </button>

                    <a href="{{ route('admin.bansos') }}"
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
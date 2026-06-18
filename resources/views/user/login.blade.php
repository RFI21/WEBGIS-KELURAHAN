<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Login | WebGIS Battang Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --dark: #0f172a;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            overflow: hidden;
        }

      


        .login-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at top right, rgba(37, 99, 235, 0.1), transparent),
                        radial-gradient(circle at bottom left, rgba(37, 99, 235, 0.05), transparent);
        }

        .login-card {
            background: white;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            max-width: 1000px;
            width: 95%;
            display: flex;
            min-height: 600px;
        }

.brand-side {
    background: linear-gradient(
        135deg,
        #0f172a 0%,
        #1e293b 100%
    );

    padding: 60px;
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    position: relative;
    text-align: center;
    overflow: hidden;
}

/* Pattern */
.brand-side::before {
    content: "";
    position: absolute;
    inset: 0;

    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cg fill='white' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zM36 4V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");

    background-size: 60px 60px;
    opacity: 1;
    z-index: 0;
}

.brand-content {
    position: relative;
    z-index: 1;
}

        .logo-wrapper {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 24px;
            display: inline-block;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-img {
            width: 80px;
            height: auto;
        }

        .form-side {
            width: 55%;
            padding: 60px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header h2 {
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #64748b;
            margin-bottom: 35px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group-custom i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: color 0.3s;
        }

        .form-control-custom {
            width: 100%;
            padding: 14px 18px 14px 48px;
            background: #f1f5f9;
            border: 2px solid transparent;
            border-radius: 16px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .form-control-custom:focus + i {
            color: var(--primary);
        }

        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 1rem;
            width: 100%;
            margin-top: 10px;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.3);
            color: white;
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .brand-side { display: none; }
            .form-side { width: 100%; padding: 40px; }
            .login-card { max-width: 450px; }
        }
    </style>
</head>

<body>

    <section class="login-section">
        <div class="login-card animate__animated animate__zoomIn">
            
            <!-- Left Side: Branding -->
            <div class="brand-side">
                <div class="brand-content">
                    <div class="logo-wrapper animate__animated animate__fadeInDown">
                            <div class="bg-blue-600 p-3 rounded-2xl mb-2 shadow-lg">
                                    <i class="bi bi-geo-fill text-white text-5xl"></i>
                                </div>
                    </div>
                    <h3 class="fw-800 mb-2">WEBGIS TERPADU</h3>
                    <p class="opacity-75">Sistem Informasi Geografis  <br> Kelurahan Battang Barat</p>
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="form-side">
                <div class="form-header">
                    <h2>Selamat Datang</h2>
                    <p>Silakan masuk menggunakan akun admin Anda.</p>
                </div>

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group-custom">
                            <input type="text" id="username" name="username" class="form-control-custom" placeholder="Masukkan username" required autocomplete="off">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label">Password</label>
                            <!-- <a href="#" class="text-primary text-decoration-none small fw-bold mb-2">Lupa Password?</a> -->
                        </div>
                        <div class="input-group-custom">
                            <input type="password" id="password" name="password" class="form-control-custom" placeholder="••••••••" required>
                            <i class="bi bi-lock-fill"></i>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-login">
                        Masuk ke Dashboard <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </form>

                <div class="back-link">
                    <a href="/">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
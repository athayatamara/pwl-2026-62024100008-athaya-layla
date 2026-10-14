
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Informasi Klinik')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            color: #212529;
            min-height: 100vh;
        }

        .navbar {
            background-color: #0d6efd;
        }

        .navbar-brand {
            font-size: 1.25rem;
            letter-spacing: 0.2px;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            border-radius: 6px;
            margin-left: 4px;
            padding: 8px 14px;
            transition: background-color 0.2s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.15);
        }

        main.container {
            max-width: 1140px;
            padding-top: 32px;
            padding-bottom: 32px;
        }

        .content-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border-radius: 7px;
            padding: 9px 12px;
        }

        .btn {
            border-radius: 7px;
            padding: 8px 16px;
        }

        footer {
            color: #6c757d;
            text-align: center;
            padding: 20px 12px;
            margin-top: 12px;
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                padding-top: 12px;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
                padding: 10px 12px;
            }

            .content-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold"
               href="{{ url('/dashboard') }}">
                Sistem Informasi Klinik
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Buka menu navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('pasien.index') }}">
                            Pasien
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/dokter') }}">
                            Dokter
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/poli') }}">
                            Poli
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="container">
        <div class="content-card">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <small>
            &copy; {{ date('Y') }} Sistem Informasi Klinik
        </small>
    </footer>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

@php
$setting = App\Models\Setting::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Iventaris Barang</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(Storage::url($setting->favicon ?? 'favicons/favicon.ico')) }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(219, 234, 254, 0.8), rgba(254, 202, 202, 0.8)),
                        url('{{ asset('assets/bg-inventaris.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #333;
        }

        .welcome-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .icon-circle {
            background-color: #ffe4e6;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer {
            margin-top: 4rem;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="/" class="d-flex align-items-center">
                <!-- <img src="{{ asset('logo.png') }}" alt="Logo" style="width: 60px;"> -->
            </a>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary me-2">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Daftar</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="welcome-card text-center col-lg-6">
                <h1 class="mb-3">Selamat datang di Sistem Informasi Iventaris Barang</h1>
                <p class="mb-4">Masuk untuk mengakses layanan inventaris barang.</p>

                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="{{ route('login') }}" class="btn btn-light d-flex align-items-center gap-2 px-4 py-2 shadow-sm">
                        <div class="icon-circle">
                            <img src="https://www.svgrepo.com/show/408745/login-sign-in-user-entrance-account.svg" alt="Login" style="width: 24px;">
                        </div>
                        <strong>Masuk</strong>
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-light d-flex align-items-center gap-2 px-4 py-2 shadow-sm">
                        <div class="icon-circle">
                            <img src="https://www.svgrepo.com/show/515135/book.svg" alt="Register" style="width: 24px;">
                        </div>
                        <strong>Daftar</strong>
                    </a>
                </div>
            </div>
        </div>

        <footer class="d-flex justify-content-between align-items-center mt-5">
            <p>&copy; {{ date('Y') }} Sistem Informasi Iventaris Barang. Dibuat dengan ❤️</p>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

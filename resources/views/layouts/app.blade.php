<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InsuranceWise') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Cambo&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 72px;
            background-color: #f8f9fa;
        }

        /* =======================
           Navbar (MATCH IMAGE)
        ======================== */
        .navbar {
            background-color: #ffffff;
            height: 72px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
        }

        .navbar-brand {
            font-weight: 500;
            font-size: 20px;
            color: #7a7a7a;
        }

        .navbar-brand:hover {
            color: #555;
        }

        .navbar-nav .nav-link {
            color: #8a8a8a;
            font-size: 15px;
            margin-left: 28px;
            transition: color 0.2s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #000;
        }

        /* =======================
           Hero Section
        ======================== */
        .hero-section {
            background: url('{{ asset("image/dashboard.jpeg") }}') center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 160px 20px;
            position: relative;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.45);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 850px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 14px;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .hero-content .btn {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 14px 36px;
            font-size: 15px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .hero-content .btn:hover {
            background-color: #e65b50;
        }

        /* =======================
           Category Cards
        ======================== */
        .section-gray {
            background-color: #f1f1f1;
            padding: 80px 0;
        }

        .section-gray .row {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .section-gray .card {
            width: 320px;
            height: 220px;
            border: none;
            border-radius: 10px;
            padding-top: 55px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .section-gray .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(0,0,0,0.18);
        }

        .card .category {
            font-size: 18px;
            font-weight: 600;
            color: #666;
        }

        .card .title {
            font-size: 42px;
            font-weight: 500;
            margin-top: 10px;
        }

        /* =======================
           Get Quote Section
        ======================== */
        .quote-section {
            background: url('{{ asset("image/dashboard.jpeg") }}') center/cover no-repeat;
            padding: 100px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .quote-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.5);
        }

        .quote-content {
            position: relative;
            z-index: 1;
        }

        .quote-content h2 {
            font-size: 34px;
            font-family: 'Cambo', serif;
            margin-bottom: 15px;
        }

        .quote-content p {
            font-size: 14px;
            margin-bottom: 30px;
        }

        .quote-content .btn {
            background-color: #ff6f61;
            border: none;
            padding: 14px 34px;
            color: white;
            font-size: 15px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<!-- =======================
     Navbar
======================== -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ $isAdmin ?? false ? route('admin.dashboard') : route('dashboard') }}">
            InsuranceWise
        </a>

        <ul class="navbar-nav ms-auto align-items-center">
            @if($isAdmin ?? false)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('quote.assignment') }}">Quote Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.manage-plans') }}">Manage Plans</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recommendationform') }}">Get Recommendation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}#category-section">Browse Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/quote-request') }}">Get Quote</a>
                </li>
            @endif

            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="nav-link" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- =======================
     Page Content
======================== -->
<main>
    @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

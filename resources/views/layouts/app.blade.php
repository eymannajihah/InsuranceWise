<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InsuranceWise') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cambo&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 20px;
        }

        /* Hero Section */
        .hero-section {
            background: url('{{ asset("image/dashboard.jpeg") }}') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 150px 20px;
            position: relative;
        }
        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        .hero-content .btn {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 15px 35px;
            font-size: 16px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }
        .hero-content .btn:hover {
            background-color: #e65b50;
        }

        /* Category Cards */
        .section-gray .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        .section-gray .card {
            width: 320px;
            height: 220px;
            padding-top: 50px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            cursor: pointer;
        }
        .section-gray .card:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .card .title {
            font-size: 42px;
        }
        .card .category {
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ $isAdmin ?? false ? route('admin.dashboard') : route('dashboard') }}">
            InsuranceWise
        </a>
        <ul class="navbar-nav ms-auto">
            @if($isAdmin ?? false)
                <li class="nav-item"><a class="nav-link" href="{{ route('quote.assignment') }}">Quote Requests</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.manage-plans') }}">Manage Plans</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('recommendationform') }}">Get Recommendation</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}#category-section">Browse Plan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/quote-request') }}">Get Quote</a></li>
            @endif
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page Content -->
<main class="main-content">
    @yield('content')
</main>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional: smooth scroll for sections -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const browseBtn = document.getElementById("browsePlansBtn");
    if(browseBtn) browseBtn.addEventListener("click", e => {
        e.preventDefault();
        document.querySelector("#category-section").scrollIntoView({ behavior: 'smooth' });
    });

    const quoteBtn = document.getElementById("getQuoteBtn");
    if(quoteBtn) quoteBtn.addEventListener("click", e => {
        e.preventDefault();
        document.querySelector("#get-quote-section").scrollIntoView({ behavior: 'smooth' });
    });
});
</script>
</body>
</html>

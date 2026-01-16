<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InsuranceWise</title>

  <!-- Bootstrap CSS (HTTPS) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; padding-top: 70px; }

    /* Navbar */
    .navbar { min-height: 60px; padding: 5px 0; background-color: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .navbar-brand { font-size: 20px; padding: 10px 15px; }
    .nav-link { font-size: 14px; cursor: pointer; }

    /* Hero Section */
    .hero-section {
      background-size: cover;
      background-position: center;
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
    }

    /* Cards Section */
    .card-hover:hover { transform: scale(1.05); transition: transform 0.2s; }
    .card-title { font-size: 42px; }
    .card-category { font-size: 18px; font-weight: 600; }

  </style>
</head>
<body>

@php
  $user = Session::get('firebase_user');
  $isAdmin = $user && ($user['role'] ?? '') === 'admin';
@endphp

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ $isAdmin ? route('admin.dashboard') : route('dashboard') }}">InsuranceWise</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @if($isAdmin)
          <li class="nav-item"><a class="nav-link" href="{{ route('quote.assignment') }}">Quote Requests</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.manage-plans') }}">Manage Plans</a></li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('recommendationform') }}">Get Recommendation</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}#category-section">Browse Plan</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/quote-request') }}">Get Quote</a></li>
        @endif
        <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
          <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<main class="main-content">
  @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

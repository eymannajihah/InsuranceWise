<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InsuranceWise</title>

  <!-- Gaia CSS -->
  <link href="{{ asset('gaia-assets/css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('gaia-assets/css/gaia.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600" rel="stylesheet">
  <link href="{{ asset('gaia-assets/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
  <link href="{{ asset('gaia-assets/css/fonts/font-awesome.css') }}" rel="stylesheet">

  <style>
    body { font-family: "Poppins", sans-serif; padding-top: 70px; }
    .navbar { min-height: 60px; padding: 5px 0; background-color: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .navbar-brand { font-size: 20px; padding: 10px 15px; }
    .navbar-nav > li > a { padding: 15px 12px; font-size: 14px; cursor: pointer; }
    .hero-section { background-size: cover; background-position: center; color: white; text-align: center; padding: 150px 20px; position: relative; }
    .hero-section::before { content: ""; position: absolute; inset: 0; background-color: rgba(0,0,0,0.5); }
    .hero-content { position: relative; z-index: 1; max-width: 800px; margin: 0 auto; }
    .hero-content .btn { background-color: #ff6f61; color: #fff; border: none; padding: 15px 35px; font-size: 16px; border-radius: 6px; }
  </style>
</head>
<body>

@php
  $user = Session::get('firebase_user');
  $isAdmin = $user && ($user['role'] ?? '') === 'admin';
@endphp

<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">

    <!-- BRAND -->
    <div class="navbar-header">
      <a class="navbar-brand"
         href="{{ $isAdmin ? route('admin.dashboard') : route('dashboard') }}">
        InsuranceWise
      </a>
    </div>

    <!-- MENU -->
    <ul class="nav navbar-nav navbar-right">

      @if($isAdmin)
        <!-- ADMIN NAV -->
         <li><a href="{{ route('quote.assignment') }}">Quote Requests</a></li>
  <li><a href="{{ route('admin.manage-plans') }}">Manage Plans</a></li>

      @else
        <!-- USER NAV -->
        <li><a href="{{ route('recommendationform') }}">Get Recommendation</a></li>
        <li><a href="{{ route('dashboard') }}#category-section">Browse Plan</a></li>
        <li><a href="{{ url('/quote-request') }}">Get Quote</a></li>
      @endif

      <!-- LOGOUT -->
      <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
          @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </li>

    </ul>
  </div>
</nav>

<!-- PAGE CONTENT -->
<main class="main-content">
  @yield('content')
</main>

<!-- Scripts -->
<script src="{{ asset('gaia-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('gaia-assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('gaia-assets/js/gaia.js') }}"></script>

</body>
</html>

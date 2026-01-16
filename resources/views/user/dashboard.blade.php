@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InsuranceWise | Dashboard</title>

  <!-- Gaia Template CSS -->
  <link href="{{ asset('gaia-assets/css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{ asset('gaia-assets/css/gaia.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600" rel="stylesheet">
  <link href="{{ asset('gaia-assets/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
  <link href="{{ asset('gaia-assets/css/fonts/font-awesome.css') }}" rel="stylesheet">

  <style>
  .section-gray .row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
  }
  .section-gray .card {
    width: 320px;
    height: 220px;
    margin: 10px;
    transition: transform 0.2s ease-in-out;
    cursor: pointer;
    padding-top: 50px;
  }
  .section-gray .card:hover {
    transform: scale(1.05);
  }
  .section-gray .card .title {
    font-size: 42px;
  }
  .section-gray .card .category {
    font-size: 18px;
    font-weight: 600;
  }
  .hero-section {
    background-image: url("{{ asset('image/dashboard.jpeg') }}");
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
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
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
  }

  </style>
</head>

<body>
  <!-- Header Section -->
<div class="section section-header">
  <div class="parallax filter filter-color-black hero-section">
    <div class="container">
      <div class="content">
        <h1 class="title-modern text-center">Welcome to InsuranceWise</h1>
        <p class="text-center text-light">Your personalized insurance insight dashboard</p>
        <div class="text-center">
          <a href="{{ route('recommendationform') }}" class="btn btn-danger btn-lg">
            Get Personalized Recommendations
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


 <!-- ✅ Insurance Categories -->
<div id="category-section" class="section section-gray text-center">
    <div class="container">
        <h2 class="section-title">What product or service are you looking for?</h2>
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card card-stats">
                    <a href="{{ route('categories.view', ['category' => 'medical']) }}" class="stretched-link text-decoration-none text-dark">
                        <div class="content text-center">
                            <p class="category">Medical Insurance</p>
                            <h3 class="title">{{ $planCounts['medical'] ?? 0 }}</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stats">
                    <a href="{{ route('categories.view', ['category' => 'critical']) }}" class="stretched-link text-decoration-none text-dark">
                        <div class="content text-center">
                            <p class="category">Critical Illness Insurance</p>
                            <h3 class="title">{{ $planCounts['critical'] ?? 0 }}</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stats">
                    <a href="{{ route('categories.view', ['category' => 'life']) }}" class="stretched-link text-decoration-none text-dark">
                        <div class="content text-center">
                            <p class="category">Life Insurance</p>
                            <h3 class="title">{{ $planCounts['life'] ?? 0 }}</h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


  <!-- ✅ Get Quote Section -->
  <div id="get-quote-section" class="hero-section">
    <div class="hero-content">
      <h2>Do you still feel confused?</h2>
      <p>Get a quote now. We are ready to help you.</p>
      <a href="{{ url('/quote-request') }}" class="btn">Get Quote</a>
    </div>
  </div>

  <script src="{{ asset('gaia-assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('gaia-assets/js/bootstrap.js') }}"></script>
  <script src="{{ asset('gaia-assets/js/gaia.js') }}"></script>
  <script>
    document.getElementById("browsePlansBtn").addEventListener("click", function(e) {
      e.preventDefault();
      document.querySelector("#category-section").scrollIntoView({ behavior: 'smooth' });
    });
    document.getElementById("getQuoteBtn").addEventListener("click", function(e) {
      e.preventDefault();
      document.querySelector("#get-quote-section").scrollIntoView({ behavior: 'smooth' });
    });
  </script>
</body>
</html>
@endsection

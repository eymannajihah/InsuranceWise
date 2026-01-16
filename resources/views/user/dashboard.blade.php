@extends('layouts.app')

@section('content')

<!-- Header Section -->
<div class="section section-header">
  <div class="parallax filter filter-color-black hero-section" 
       style="background-image: url('{{ secure_asset('image/dashboard.jpeg') }}');">
    <div class="container">
      <div class="content hero-content">
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

<!-- Insurance Categories -->
<div id="category-section" class="section section-gray text-center">
  <div class="container">
    <h2 class="section-title">What product or service are you looking for?</h2>
    <div class="row justify-content-center">

      <!-- Medical Insurance -->
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

      <!-- Critical Illness Insurance -->
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

      <!-- Life Insurance -->
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

<!-- Get Quote Section -->
<div id="get-quote-section" class="hero-section">
  <div class="hero-content">
    <h2>Do you still feel confused?</h2>
    <p>Get a quote now. We are ready to help you.</p>
    <a href="{{ url('/quote-request') }}" class="btn">Get Quote</a>
  </div>
</div>

<!-- Smooth scroll JS -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const browsePlansBtn = document.getElementById("browsePlansBtn");
  const getQuoteBtn = document.getElementById("getQuoteBtn");

  if(browsePlansBtn) {
    browsePlansBtn.addEventListener("click", function(e) {
      e.preventDefault();
      document.querySelector("#category-section").scrollIntoView({ behavior: 'smooth' });
    });
  }

  if(getQuoteBtn) {
    getQuoteBtn.addEventListener("click", function(e) {
      e.preventDefault();
      document.querySelector("#get-quote-section").scrollIntoView({ behavior: 'smooth' });
    });
  }
});
</script>

@endsection

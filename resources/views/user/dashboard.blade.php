@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="hero-section" style="background-image: url('{{ secure_asset('image/dashboard.jpeg') }}');">
  <div class="hero-content">
    <h1>Welcome to InsuranceWise</h1>
    <p>Your personalized insurance insight dashboard</p>
    <a href="{{ route('recommendationform') }}" class="btn btn-lg">Get Personalized Recommendations</a>
  </div>
</div>

<!-- Insurance Categories -->
<div id="category-section" class="container my-5">
  <h2 class="text-center mb-4">What product or service are you looking for?</h2>
  <div class="row justify-content-center g-4">
    <div class="col-md-3">
      <div class="card card-hover text-center p-4">
        <a href="{{ route('categories.view', ['category' => 'medical']) }}" class="stretched-link text-decoration-none text-dark">
          <p class="card-category">Medical Insurance</p>
          <h3 class="card-title">{{ $planCounts['medical'] ?? 0 }}</h3>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-hover text-center p-4">
        <a href="{{ route('categories.view', ['category' => 'critical']) }}" class="stretched-link text-decoration-none text-dark">
          <p class="card-category">Critical Illness Insurance</p>
          <h3 class="card-title">{{ $planCounts['critical'] ?? 0 }}</h3>
        </a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card card-hover text-center p-4">
        <a href="{{ route('categories.view', ['category' => 'life']) }}" class="stretched-link text-decoration-none text-dark">
          <p class="card-category">Life Insurance</p>
          <h3 class="card-title">{{ $planCounts['life'] ?? 0 }}</h3>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Get Quote Section -->
<div class="hero-section" style="background-image: url('{{ secure_asset('image/quote-banner.jpeg') }}');">
  <div class="hero-content">
    <h2>Do you still feel confused?</h2>
    <p>Get a quote now. We are ready to help you.</p>
    <a href="{{ url('/quote-request') }}" class="btn">Get Quote</a>
  </div>
</div>

@endsection

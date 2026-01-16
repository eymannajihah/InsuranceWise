@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1>Welcome to InsuranceWise</h1>
        <p>Your personalized insurance insight dashboard</p>
        <a href="{{ route('recommendationform') }}" class="btn btn-lg">Get Personalized Recommendations</a>
    </div>
</div>

<!-- Categories -->
<div id="category-section" class="section section-gray text-center py-5">
    <div class="container">
        <h2>What product or service are you looking for?</h2>
        <div class="row">
            @foreach(['medical' => 'Medical Insurance', 'critical' => 'Critical Illness Insurance', 'life' => 'Life Insurance'] as $key => $label)
            <div class="col-md-4">
                <div class="card card-stats shadow-sm">
                    <a href="{{ route('categories.view', ['category' => $key]) }}" class="stretched-link text-decoration-none text-dark">
                        <div class="content text-center">
                            <p class="category">{{ $label }}</p>
                            <h3 class="title">{{ $planCounts[$key] ?? 0 }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Get Quote Section -->
<div id="get-quote-section" class="hero-section my-5">
    <div class="hero-content">
        <h2>Do you still feel confused?</h2>
        <p>Get a quote now. We are ready to help you.</p>
        <a href="{{ url('/quote-request') }}" class="btn">Get Quote</a>
    </div>
</div>
@endsection

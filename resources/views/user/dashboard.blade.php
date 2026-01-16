@extends('layouts.app')

@section('content')

<!-- =======================
     HERO SECTION
======================== -->
<div class="hero-section">
    <div class="hero-content">
        <h1>Welcome to InsuranceWise</h1>
        <p>YOUR PERSONALIZED INSURANCE INSIGHT DASHBOARD</p>
        <a href="{{ route('recommendationform') }}" class="btn">
            Get Personalized Recommendations
        </a>
    </div>
</div>

<!-- =======================
     CATEGORY SECTION
======================== -->
<section id="category-section" class="section-gray text-center">
    <div class="container">
        <h2 class="mb-5" style="font-family: 'Cambo', serif;">
            What product or service are you looking for?
        </h2>

        <div class="row justify-content-center">
            @foreach([
                'medical' => 'Medical Insurance',
                'critical' => 'Critical Illness Insurance',
                'life' => 'Life Insurance'
            ] as $key => $label)

                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card text-center">
                        <a href="{{ route('categories.view', ['category' => $key]) }}"
                           class="stretched-link text-decoration-none text-dark">
                        </a>

                        <div class="category">
                            {{ $label }}
                        </div>

                        <div class="title">
                            {{ $planCounts[$key] ?? 0 }}
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>

<!-- =======================
     GET QUOTE SECTION
======================== -->
<section id="get-quote-section" class="quote-section">
    <div class="quote-content">
        <h2>Do you still feel confused?</h2>
        <p>Get a quote now. We are ready to help you.</p>
        <a href="{{ url('/quote-request') }}" class="btn">
            Get Quote
        </a>
    </div>
</section>

@endsection

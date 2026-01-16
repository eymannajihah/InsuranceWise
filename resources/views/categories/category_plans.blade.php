@extends('layouts.app')

@section('content')

<!-- Custom Styles -->
<style>
    /* Background wrapper for consistency */
    .content-wrapper {
        background-image: url("{{ asset('image/requestform.jpeg') }}");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        min-height: 100vh;
        padding-top: 120px;
        padding-bottom: 60px;
    }

    .header-section {
        text-align: center;
        margin-bottom: 50px;
        color: #fff;
        text-shadow: 0px 2px 6px rgba(0,0,0,0.6);
    }
    .header-section h1 {
        font-size: 32px;
        font-weight: 700;
    }
    .header-section p {
        font-size: 16px;
        color: #f0f0f0;
    }

    /* Plan Cards */
    .plan-card {
        transition: 0.3s;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        margin-bottom: 30px;
        background: #fff;
    }
    .plan-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    }
    .plan-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .plan-title {
        font-weight: 600;
        font-size: 20px;
        margin-top: 12px;
    }
    .plan-desc {
        font-size: 14px;
        color: #555;
        min-height: 50px;
        margin-bottom: 15px;
    }
    .btn-view {
        background-color: #dc3545;
        color: #fff;
        border-radius: 6px;
        padding: 8px 20px;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-view:hover {
        background-color: #b71c1c;
        color: #fff;
    }

    /* Center the cards row */
    .plans-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
    }

    /* Back Button */
    .back-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 25px;
        border-radius: 6px;
        background: rgba(255,255,255,0.9);
        color: #dc3545;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }
    .back-btn:hover {
        background: #dc3545;
        color: #fff;
    }
</style>

<!-- Page Content Wrapper -->
<div class="content-wrapper">

    <!-- Header Section -->
    <div class="header-section">
        <h1 class="text-capitalize">{{ $category }} Insurance Plans</h1>
        <p>Choose the best plan for your protection needs</p>
    </div>

    <!-- Plans Grid -->
    <div class="container">
        <div class="plans-row">
            @foreach ($plans as $id => $plan)
                <div class="col-md-4" style="max-width: 350px; flex: 1 1 auto;">
                    <div class="plan-card text-center">
                        @if(!empty($plan['banner_image']) && file_exists(public_path('image/plans/'.$plan['banner_image'])))
                            <img src="{{ asset('image/plans/'.$plan['banner_image']) }}" alt="{{ $plan['name'] }}">
                        @else
                            <img src="{{ asset('image/default.jpg') }}" alt="No image">
                        @endif
                        <div class="p-3">
                            <h4 class="plan-title">{{ $plan['name'] }}</h4>
                            <p class="plan-desc">
                                {{ $plan['highlight'] ?? ($plan['overview'] ? explode('.', $plan['overview'])[0] : 'Insurance plan for better protection.') }}
                            </p>
                            <a href="{{ route('plans.view', $id) }}" class="btn-view">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="back-btn">← Back to Dashboard</a>
        </div>
    </div>
</div>

@endsection

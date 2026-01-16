@extends('layouts.app')

@section('content')

@php
 $details = [
    'PRUTerm' => [
        'price' => 'RM100/month',
        'desc'  => 'Basic term life insurance plan.'
    ],
    'PRUWith You Plus' => [
        'price' => 'Varies by age & options',
        'desc'  => 'Flexible investment-linked insurance for lifetime protection and long-term savings.'
    ],
    'PRUMy Critical Care' => [
        'price' => 'Varies — contact us for a quote',
        'desc'  => 'Covers 160 types of critical illnesses with multiple claim opportunities and recovery support.'
    ],
    'PRULady' => [
        'price' => 'Varies — contact us for a personalised quote',
        'desc'  => 'Comprehensive women’s protection covering female illnesses, maternity, and recovery benefits.'
    ],
    'PRUMan' => [
        'price' => 'Varies — contact us for a personalised quote',
        'desc'  => 'Comprehensive men’s protection covering male illnesses and critical conditions.'
    ],
    'PRUMillion Med' => [
        'price' => 'Price varies — depends on plan, deductible & age',
        'desc'  => 'Comprehensive hospitalisation protection with cashless admission and flexible benefits.'
    ],
    'PRUMillion Med Active' => [
        'price' => '-',
        'desc'  => 'Active lifestyle hospitalisation plan with flexible benefits.'
    ],
    'PRUValue Med' => [
        'price' => 'Price varies — depends on options and age',
        'desc'  => 'Flexible long-term hospitalisation and surgical plan with high coverage limits.'
    ],
    'PRULive Well' => [
        'price' => 'Price varies — depends on options selected',
        'desc'  => 'Life insurance with wellness rewards and lifestyle benefits for health-conscious individuals.'
    ],
];

@endphp

<style>
    body {
        background-image: url("{{ asset('image/requestform.jpeg') }}");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        min-height: 100vh;
    }

    .recommendation-section {
        padding: 80px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        min-height: 100vh;
    }

    .recommendation-header h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #2c3e50;
        text-align: center;
    }

    .recommendation-header p {
        font-size: 16px;
        color: #7f8c8d;
        margin-bottom: 40px;
        text-align: center;
    }

    .recommendation-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        width: 100%;
        max-width: 1200px;
    }

    .plan-card {
        background: #fff;
        color: #333;
        border-radius: 15px;
        padding: 35px 25px;
        width: 340px;
        min-height: 420px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        text-align: center;
        flex-shrink: 0;
    }

    .plan-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.18);
    }

    .plan-card h4 {
        color: #e74c3c;
        font-weight: 700;
        font-size: 22px;
        margin-bottom: 12px;
    }

    .plan-card h5 {
        font-weight: 600;
        font-size: 14px;
        color: #555;
        margin-bottom: 12px;
    }

    .plan-card p {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
        min-height: 50px;
    }

    .btn-quote {
        background-color: #e74c3c;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 22px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .btn-quote:hover {
        background-color: #c0392b;
        color: white;
    }

    .btn-secondary {
        background: #fff;
        color: #e74c3c;
        border: 1px solid #e74c3c;
        padding: 10px 22px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        margin: 8px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background: #e74c3c;
        color: white;
    }

    .footer-btns {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    @media (max-width: 400px) {
        .plan-card {
            width: 90%;
            padding: 30px 20px;
        }
    }
</style>

<div class="recommendation-section">
    <div class="recommendation-header">
        <h2>Recommended Plans for You</h2>
        <p>We’ve matched your answers with the most suitable insurance plans.</p>
    </div>

   <div class="recommendation-wrapper">
    @if(!empty($plansToShow))
        @foreach($plansToShow as $singlePlan)
            @php $p = trim($singlePlan); @endphp
            @if(isset($details[$p]))
                <div class="plan-card">
                    <h4>{{ $p }}</h4>
                    <h5>{{ $details[$p]['price'] }}</h5>
                    <p>{{ $details[$p]['desc'] }}</p>
                    <a href="{{ route('quote.request') }}" class="btn-quote">Get Quote</a>
                </div>
            @endif
        @endforeach
    @else
        <p>No recommended plans for you.</p>
    @endif
</div>



</div>

    <div class="footer-btns">
        <a href="{{ route('recommendationform') }}" class="btn-secondary">← Try Again</a>
        <a href="{{ route('plans') }}" class="btn-secondary">Fetch All Plans</a>
    </div>
</div>

@endsection

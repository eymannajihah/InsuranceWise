@extends('layouts.app')

@section('content')

<style>
  /* Container row for cards */
  .section-gray .row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
  }

  /* Base card style */
  .section-gray .card {
    width: 320px;
    height: 220px;
    margin: 10px;
    transition: transform 0.2s ease-in-out;
    cursor: pointer;
    position: relative;
  }

  .section-gray .card:hover {
    transform: scale(1.05);
  }

  /* Make whole card clickable */
  .card-link {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10;
    text-decoration: none;
    color: inherit;
  }

  /* Background for header */
  .admin-dashboard-bg {
    background-image: url("/image/admindashboard.jpeg");
    background-size: cover;
    background-position: center;
  }

  /* Improved spacing & typography for stat cards */
  .section-gray .card-stats {
      width: 320px;
      height: 220px;
      margin: 15px;
      padding: 30px 20px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    /* Prominent title above number */
    .section-gray .card-stats .category {
      font-size: 22px; /* slightly bigger */
      font-weight: 700;
      margin-bottom: 15px;
      text-transform: uppercase; /* optional: uppercase for clarity */
      letter-spacing: 0.5px;
    }

    /* Big number/icon */
    .section-gray .card-stats .title {
      font-size: 48px;
      font-weight: 600;
    }
</style>

<!-- HEADER -->
<div class="section section-header">
  <div class="parallax filter filter-color-black">
    <div class="image admin-dashboard-bg"></div>
    <div class="container">
      <div class="content">
        <h1 class="title-modern text-center">Admin Control Panel</h1>
        <p class="text-center text-light">
          Manage system data, review quote requests, and update insurance plans
        </p>
      </div>
    </div>
  </div>
</div>

<!-- ADMIN ACTIONS CARDS -->
<div class="section section-gray text-center">
  <div class="container">
    <h2 class="section-title">Quick Statistic</h2>

    <div class="row justify-content-center">

      <!-- Pending Quote Requests Card -->
      <div class="col-md-3">
        <div class="card card-stats" style="background: linear-gradient(135deg, #FF6B6B, #FF8787);">
          <a href="{{ route('quote.assignment') }}" class="card-link"></a>
          <div class="content text-center">
            <p class="category">Pending Quote Requests</p>
            <h3 class="title">{{ $pendingCount ?? 0 }}</h3>
          </div>
        </div>
      </div>

      <!-- Registered Users Card -->
      <div class="col-md-3">
        <div class="card card-stats" style="background: linear-gradient(135deg, #4D96FF, #7AB3FF);">
          <a href="#" class="card-link"></a>
          <div class="content text-center">
            <p class="category">Registered Users</p>
            <h3 class="title">{{ $userCount ?? 0 }}</h3>
          </div>
        </div>
      </div>

      <!-- Insurance Plans Card -->
      <div class="col-md-3">
        <div class="card card-stats" style="background: linear-gradient(135deg, #00C49F, #48E6C3);">
          <a href="{{ route('admin.manage-plans') }}" class="card-link"></a>
          <div class="content text-center">
            <p class="category">Insurance Plans</p>
            <h3 class="title">{{ $planCount ?? 0 }}</h3>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

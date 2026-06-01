@extends('layout')
@section('title', 'User Dashboard')
<?php session()->put('operationname', 'dashboard'); ?>
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Dashboard</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/style.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

  <div class="container">
    <div class="row g-4">
      
      <!-- Book Sales Card -->
      <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body d-flex align-items-center justify-content-between p-4">
            <div>
              <h6 class="text-muted text-uppercase mb-2 font-monospace small">Book Sales</h6>
              <h2 class="display-6 fw-bold mb-0">12,450</h2>
              <span class="text-success small fw-medium mt-1 d-inline-block">
                <i class="fa-solid fa-arrow-trend-up me-1"></i>+12% this month
              </span>
            </div>
            <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
              <i class="fa-solid fa-book fa-2xl"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Movie Sales Card -->
      <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body d-flex align-items-center justify-content-between p-4">
            <div>
              <h6 class="text-muted text-uppercase mb-2 font-monospace small">Movie Sales</h6>
              <h2 class="display-6 fw-bold mb-0">8,120</h2>
              <span class="text-success small fw-medium mt-1 d-inline-block">
                <i class="fa-solid fa-arrow-trend-up me-1"></i>+8% this month
              </span>
            </div>
            <div class="bg-video bg-opacity-10 text-danger rounded-3 p-3" style="background-color: rgba(220, 53, 69, 0.1);">
              <i class="fa-solid fa-film fa-2xl"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
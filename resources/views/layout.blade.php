<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>

  <body style="background-color: #212529; color: #ffffff;">

    <style>     <style>
        .sidebar-menu .nav-link {
            color: #333;
            transition: all 0.2s ease;
        }

        .sidebar-menu .nav-link.active {
            background-color: #000;
            color: #fff !important;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 8px;
            transform: scale(1.05);
        }

        .sidebar-menu .nav-link:hover {
            background-color: #212529;
            color: #fff;
            border-radius: 8px;
        }
    </style>

    
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Library Record</a>
            
            <div class=" justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <div class="container py-4 bg-dark text-light">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3 bg-dark" style="background-color: #1a233a !important;">
                        <ul class="nav sidebar-menu flex-column fw-bold gap-2">


                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                                    <span>User</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('movies') ? 'active' : '' }}" href="/movies">
                                    <span>Movies</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('books') ? 'active' : '' }}" href="/books">
                                    <span>Book</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">

                <h3> @yield('title') </h3>

                    @section('content')
                    @show
            </div>

        </div>
    </div>  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
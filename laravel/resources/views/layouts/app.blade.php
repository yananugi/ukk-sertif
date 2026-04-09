<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard PKL')</title>
    <link rel="icon" type="image/x-icon" href="/img/brand.jpg">
    <!-- Bootstrap 5.3.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5.1 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            background: #f5f6fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
        }
        .sidebar .brand {
            padding: 25px 20px;
            color: #fff;
            font-size: 1.3rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 14px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .sidebar .nav-link i {
            width: 28px;
            text-align: center;
        }
        .main-content {
            padding: 30px;
        }
        .card-stat {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        .card-stat .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .card-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .top-bar {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            padding: 15px 25px;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- 📱 Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0 d-none d-md-block">
                <div class="brand">
                    <i class="fas fa-certificate me-2"></i> E-Sertifikat
                </div>
                <nav class="nav flex-column mt-3">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                    <a class="nav-link {{ request()->routeIs('sertifikat') ? 'active' : '' }}" href="{{ route('sertifikat') }}">
                        <i class="fas fa-download"></i> Unduh Sertifikat
                    </a>
                    <hr class="mx-3 my-3" style="border-color: rgba(255,255,255,0.1);">
                    <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </nav>
            </div>

            <!-- 📄 Main Content -->
            <div class="col-md-9 col-lg-10 p-0">
                <!-- Top Bar -->
                <div class="container-fluid">
                    <div class="top-bar d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-muted">
                            <i class="fas fa-user-circle me-2"></i>
                            <span id="currentDate"></span>
                        </h5>
                        <div>
                            <span class="text-muted small">Halo, </span>
                            <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="container-fluid main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tampilkan tanggal hari ini
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', options);
    </script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login UKK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/brand.jpg') }}"> {{-- Asset helper biar path-nya bener --}}
    <style>
        .icon-fix { margin-right: 8px; }
    </style>
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1 class="text-dark mb-5 text-center" style="font-size: 50px;">Sistem Pengunduhan Sertifikat PKL</h1>
        <div class="card shadow-sm w-100" style="max-width: 420px;">
            <div class="card-body p-4">
                <h1 class="h4 mb-3 fs-2 text-center text-primary fw-bold">
                    <i class="fas fa-user-shield icon-fix"></i>Login
                </h1>

                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-sm py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success alert-sm py-2">{{ session('status') }}</div>
                @endif

                {{-- Sesuaikan Action ke Route Login --}}
                <form method="POST" action="{{ route('login') }}"> 
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small">Email address</label>
                        {{-- Tambahkan old('email') biar kalau gagal emailnya gak ilang --}}
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm" required autofocus placeholder="name@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small">Password</label>
                        <input id="password" type="password" name="password" class="form-control form-control-sm" required autocomplete="current-password" placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
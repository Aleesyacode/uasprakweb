<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'S.H.I.E.L.D. Your Mood') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
      .custom-login {
           background-color: transparent;
           border: 2px solid #8BBBD4;
           color: #8BBBD4;
           font-weight: 600;
        }

     .custom-login:hover {
           background-color: #8BBBD4;
           color: white;
        }

     .custom-signup {
            background-color: #8BBBD4;
            color: white;
            font-weight: 600;
            border: none;
        }

     .custom-signup:hover {
            background-color: #74a6c4;
            color: white;
        }

      body {
            background-color: #8BBBD4;
            font-family: 'Poppins', sans-serif;
            color: #1f2937;
        }
    </style>
    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="{{ url('/') }}">S.H.I.E.L.D. Your Mood</a>

            <div class="d-flex">
                @guest
                    <a href="{{ route('login') }}" class="btn custom-login me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn custom-signup">Sign Up</a>


                @else
                    <span class="me-3 mt-2">Halo, {{ Auth::user()->username }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
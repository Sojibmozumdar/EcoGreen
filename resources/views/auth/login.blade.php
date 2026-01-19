<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #52b788, #7cb49a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }




        .login-card {
            background: #ffffff;
            padding: 40px 35px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .login-card h2 {
            text-align: center;
            color: #1b4b1d;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px 20px;
            border: 1px solid #a5ecac;
        }

        .form-control:focus {
            border-color: #57c263;
            box-shadow: 0 0 5px rgba(87, 194, 99, 0.5);
        }

        .btn-login {
            width: 100%;
            background: #52b788;;
            border: none;
            color: #051c06;
            font-weight: 600;
            border-radius: 30px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #193c2c;;
            color: #fff;
        }

        .error-text {
            font-size: 0.9rem;
            color: #9b0909;
            margin-top: 6px;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .footer-text a {
            color: #1f4f39;
            text-decoration: none;
            font-weight: 600;
            margin: 0 5px;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="login-card">
    <h2>User Login</h2>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Email Address</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter your email"
                   required autofocus>

            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter your password"
                   required>

            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
            <label class="form-check-label" for="remember_me">
                Remember Me
            </label>
        </div>

        <!-- Submit -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-login">
                Login
            </button>
        </div>
    </form>

    <div class="footer-text">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        @endif
        |
        <a href="{{ url('/') }}">← Back to Home</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

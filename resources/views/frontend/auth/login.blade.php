<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e6f4ea, #c8e6d7);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Card Design */
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 850px;
        }

        /* Left Design Panel */
        .login-left {
            background: linear-gradient(135deg, #1a5d42, #52b788);
            color: white;
            padding: 60px 40px;
        }

        .login-left h2 {
            font-weight: 700;
        }

        /* Right Form */
        .login-right {
            padding: 50px;
            background: white;
        }

        /* Input Style */
        .form-control {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #52b788;
            box-shadow: none;
        }

        /* Button Style */
        .btn-login {
            background: #1a5d42;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #062c21;
            color: white;
        }

        /* Register Link */
        .register-link {
            text-decoration: none;
            color: #1a5d42;
            font-weight: 600;
        }

        .register-link:hover {
            color: #52b788;
        }

        /* Mobile */
        @media(max-width:768px) {
            .login-left {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card login-card mx-auto">

            <div class="row g-0">

                <!-- Left Panel -->
                <div class="col-md-5 login-left d-flex flex-column justify-content-center">
                    <h2>EcoGreen</h2>
                    <p class="mt-3">
                        Welcome back! Login to continue your eco friendly shopping journey.
                    </p>
                </div>

                <!-- Login Form -->
                <div class="col-md-7 login-right">

                    <h4 class="fw-bold mb-3">Login Account</h4>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('danger') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('user.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-login">Login</button>
                        </div>

                        <div class="text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="{{ route('user.register') }}" class="register-link">Create New Account</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</body>

</html>

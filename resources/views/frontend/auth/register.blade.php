<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

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

        /* Card */
        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 900px;
        }

        /* Left Panel */
        .register-left {
            background: linear-gradient(135deg, #1a5d42, #52b788);
            color: white;
            padding: 60px 40px;
        }

        /* Right Form */
        .register-right {
            padding: 50px;
            background: white;
        }

        /* Input */
        .form-control {
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #52b788;
            box-shadow: none;
        }

        /* Button */
        .btn-register {
            background: #1a5d42;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-register:hover {
            background: #062c21;
            color: white;
        }

        /* Login Link */
        .login-link {
            text-decoration: none;
            color: #1a5d42;
            font-weight: 600;
        }

        .login-link:hover {
            color: #52b788;
        }

        /* Mobile */
        @media(max-width:768px) {
            .register-left {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card register-card mx-auto">

            <div class="row g-0">


                <!-- Left Panel -->
                <div class="col-md-5 register-left d-flex flex-column justify-content-center">
                    <h2>EcoGreen</h2>
                    <p class="mt-3">
                        Join our eco-friendly community and explore sustainable products.
                    </p>
                </div>

                <!-- Register Form -->
                <div class="col-md-7 register-right">

                    <h4 class="fw-bold mb-3">Create Account</h4>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form action="{{ route('user.register.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name">
                            </div>

                            <div class="mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label>Mobile Number</label>
                                <input type="number" name="mobile" class="form-control"
                                    placeholder="Enter mobile number">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password">
                            </div>

                            <div class="mb-4">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm password">
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-register">Register</button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">Already have an account?</span>
                                <a href="{{ route('user.login') }}" class="login-link">Login</a>
                            </div>

                        </form>

                </div>

            </div>

        </div>
    </div>

</body>

</html>

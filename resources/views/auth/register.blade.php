<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | EcoGreen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #52b788, #7cb49a);
            --deep-green: #0f2b1e;
        }

        body {
            background: #f4faf4;
            font-family: 'Poppins', sans-serif;
        }

        .form-top-header {
            background: #fff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0eee0;
        }

        .reg-wrapper {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-reg-card {
            background: #fff;
            border-radius: 40px;
            display: flex;
            width: 1050px;
            max-width: 100%;
            box-shadow: 0 40px 80px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .reg-side-banner {
            background: var(--primary-gradient);
            flex: 1;
            padding: 60px;
            color: var(--deep-green);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feature-item {
            background: rgba(255,255,255,0.35);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 15px;
        }

        .reg-form-area {
            flex: 1.2;
            padding: 60px 80px;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box label {
            font-weight: 600;
            font-size: 0.8rem;
            color: var(--deep-green);
            margin-bottom: 5px;
            display: block;
        }

        .input-box input {
            width: 100%;
            padding: 13px 20px 13px 50px;
            border-radius: 18px;
            border: 2px solid #f0f5f0;
            background: #fbfdfb;
        }

        .input-box input:focus {
            border-color: #90de8b;
            outline: none;
            box-shadow: 0 8px 20px rgba(144,222,139,0.15);
        }

        .input-box i {
            position: absolute;
            left: 20px;
            top: 38px;
            color: #7ab87f;
        }

        .submit-btn {
            background: var(--deep-green);
            color: #fff;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 18px;
            font-weight: 600;
            margin-top: 15px;
        }

        .submit-btn:hover {
            background: #2a5c2d;
        }
    </style>
</head>

<body>

<div class="form-top-header">
    <h5 class="fw-bold text-success mb-0">EcoGreen Store</h5>
    <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm rounded-pill px-4">
        Login
    </a>
</div>

<div class="reg-wrapper">
    <div class="glass-reg-card">

        <!-- LEFT SIDE -->
        <div class="reg-side-banner d-none d-lg-flex">
            <div>
                <h2 class="fw-bold mb-4">Eco-Friendly <br> Shopping</h2>

                <div class="feature-item">
                    <h6 class="fw-bold">
                        <i class="bi bi-bag-check me-2"></i> Easy Shopping
                    </h6>
                    <small>Buy eco products with ease</small>
                </div>

                <div class="feature-item">
                    <h6 class="fw-bold">
                        <i class="bi bi-truck me-2"></i> Fast Delivery
                    </h6>
                    <small>Quick & reliable shipping</small>
                </div>

                <div class="feature-item">
                    <h6 class="fw-bold">
                        <i class="bi bi-shield-lock me-2"></i> Secure Payment
                    </h6>
                    <small>100% secure checkout system</small>
                </div>
            </div>

            <div>
                <p class="small mb-0">© 2026 EcoGreen E-commerce</p>
                <p class="small fw-bold">Green Products, Green Future</p>
            </div>
        </div>

        <!-- FORM -->
        <div class="reg-form-area">
            <h3 class="fw-bold mb-1">Create Account</h3>
            <p class="text-muted small mb-4">
                Join EcoGreen & start eco-friendly shopping
            </p>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-box">
                    <label>FULL NAME</label>
                    <i class="bi bi-person-circle"></i>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="input-box">
                    <label>EMAIL ADDRESS</label>
                    <i class="bi bi-envelope-at"></i>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="input-box">
                    <label>PASSWORD</label>
                    <i class="bi bi-lock-fill"></i>
                    <input type="password" name="password" required>
                </div>

                <div class="input-box">
                    <label>CONFIRM PASSWORD</label>
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="submit-btn">
                    Create Account
                </button>
            </form>
        </div>

    </div>
</div>

</body>
</html>

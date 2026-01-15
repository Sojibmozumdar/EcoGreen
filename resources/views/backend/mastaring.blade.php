<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EcoGreen Dashboard | Premium</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');

        :root {
            --green-dark: #062c21;
            --green-main: #1a5d42;
            --green-accent: #52b788;
            --green-soft: #f0f7f4;
            --white: #ffffff;
        }

        body {
            background: #86b8a1;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2d3436;
        }

        /* Improved Sidebar */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: var(--green-dark);
            position: fixed;
            color: #fff;
            padding: 20px;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.05);
        }

        .sidebar .brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--green-accent);
            padding: 10px 15px 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: #a3c1b7;
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .sidebar a i {
            font-size: 1.2rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--green-main);
            color: var(--white);
            transform: translateX(5px);
        }

        /* Refined Main Area */
        .main {
            margin-left: 280px;
            padding: 40px;
        }

        /* Search & Profile Bar */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .search-box {
            background: #fff;
            padding: 8px 20px;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            width: 400px;
            display: flex;
            align-items: center;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            margin-left: 10px;
            font-size: 0.9rem;
        }

        /* Modern Stat Cards */
        .stat-card {
            border: none;
            border-radius: 24px;
            padding: 30px;
            background: var(--white);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h6 {
            color: #636e72;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .stat-card h2 {
            font-weight: 700;
            margin: 10px 0;
        }

        .trend-up {
            color: #2ecc71;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .icon-shape {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .bg-light-green {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .bg-light-blue {
            background: #e3f2fd;
            color: #1565c0;
        }

        /* Table Design */
        .table-box {
            background: var(--white);
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .table thead th {
            background: transparent;
            border-bottom: 1px solid #f1f1f1;
            color: #b5b5c3;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding-bottom: 15px;
        }

        .badge-soft-success {
            background: #e6fffa;
            color: #00b894;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
        }

        .badge-soft-warning {
            background: #fff9db;
            color: #f1c40f;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="brand">
            <i class="bi bi-leaf-fill"></i> EcoGreen
        </div>

        <a href="/" class="active"><i class="bi bi-grid-1x2-fill"></i> Overview</a>

        <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            href="{{ route('category.index') }}" role="button" aria-expanded="false">
            <span><i class="bi bi-tags-fill me-2"></i> Categories</span>

        </a>


        <a href="#"><i class="bi bi-cart3"></i> Orders</a>
        <a href="#"><i class="bi bi-box-seam"></i> Inventory</a>
        <a href="#"><i class="bi bi-people"></i> Customers</a>
        <a href="#"><i class="bi bi-bar-chart-line"></i> Marketing</a>

        <hr style="border-color: rgba(255,255,255,0.1)">

        <a href="#"><i class="bi bi-gear"></i> Settings</a>
        <a href="#" class="text-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </div>

    <div class="main">
        <div class="top-nav">
    <div class="search-box">
        <i class="bi bi-search text-muted"></i>
        <input type="text" placeholder="Search orders, products...">
    </div>
    <div class="d-flex align-items-center">
        <div class="me-4 position-relative">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="text-end d-none d-sm-block">
                <p class="mb-0 fw-bold" style="font-size: 0.85rem; line-height: 1.2;">Sojib Mozumder</p>
                <small class="text-muted" style="font-size: 0.75rem;">Eco Manager</small>
            </div>
            <div style="width: 45px; height: 45px;">
                <img src="{{asset('img')}}/sojib.jpg"
                     class="rounded-circle border border-2 border-white shadow-sm"
                     style="width: 100%; height: 100%; object-fit: cover; display: block;">
            </div>
        </div>
    </div>
</div>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'EcoGreen',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#2e8b57'
                });
            </script>
        @endif

        @if (session('danger'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'EcoGreen',
                    text: '{{ session('danger') }}',
                    confirmButtonColor: '#b42318'
                });
            </script>
        @endif



        @yield('content')




</body>

</html>
<style>
    .ecogreen-alert {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        font-size: 14px;
    }

    .ecogreen-alert.success {
        background: #e6f6ee;
        color: #1f7a4d;
        border: 1px solid #cfead9;
    }

    .ecogreen-alert.danger {
        background: #fdecea;
        color: #b42318;
        border: 1px solid #f5c2c0;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This category will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b42318',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>

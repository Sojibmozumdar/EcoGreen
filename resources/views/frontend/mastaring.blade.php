<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoGreen | sustainable Shopping</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

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





    @include('frontend.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.footer')


    <script>
        const menu = document.querySelector('#mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        menu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This Feild will be permanently deleted!",
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

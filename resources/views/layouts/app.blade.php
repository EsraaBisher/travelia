<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'E-Travel')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background-color: #f0e8f4;
            overflow-x: hidden;
        }

        .text-orange {
            color: #5f3475 !important;
        }

        .text-purple {
            color: #893172 !important;
        }

        .btn-purple {
            background-color: #5f3475;
            color: #fff;
            border: 1px solid #5f3475;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-purple:hover {
            background-color: #893172;
            border-color: #893172;
            color: #fff;
        }

        .btn-outline-purple {
            background-color: transparent;
            color: #5f3475;
            border: 1px solid #5f3475;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-outline-purple:hover {
            background-color: #5f3475;
            border-color: #5f3475;
            color: #fff;
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .card {
            background-color: #ffffff;
        }

    </style>

</head>

<body>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
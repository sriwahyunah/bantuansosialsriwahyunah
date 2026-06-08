<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Petugas</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: #f4f6f9;
        }

        .sidebar{
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #1f2937;
            color: white;
        }

        .sidebar h4{
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar a{
            display: block;
            color: #d1d5db;
            padding: 15px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover{
            background: #374151;
            color: white;
        }

        .main-content{
            margin-left: 250px;
            padding: 20px;
        }

        .card-dashboard{
            border: none;
            border-radius: 15px;
            color: white;
            overflow: hidden;
            transition: 0.3s;
        }

        .card-dashboard:hover{
            transform: translateY(-5px);
        }

        .icon-card{
            font-size: 50px;
            opacity: 0.3;
            position: absolute;
            right: 20px;
            top: 20px;
        }

    </style>

</head>

<body>
  <!-- Sidebar -->
    <div class="sidebar">

    <div class="sidebar-header">

        <h3>
            <i class="bi bi-person-badge-fill"></i>
        </h3>

        <h4>PETUGAS</h4>

    </div>

    <a href="{{ url('/petugas/dashboard') }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="{{ url('/petugas/pengambilan') }}">
        <i class="bi bi-box-seam"></i>
        Pengambilan
    </a>

    <a href="{{ url('/petugas/penyaluran') }}">
        <i class="bi bi-truck"></i>
        Penyaluran
    </a>

    <a href="{{ url('/petugas/event') }}">
        <i class="bi bi-calendar-event"></i>
        Event Bantuan
    </a>

    <form action="{{ url('/logout') }}"
          method="POST"
          class="m-3">

        @csrf

        <button class="btn btn-danger w-100">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </button>

    </form>

</div>

<div class="main-content">

    <div class="header-card">

        <div class="d-flex justify-content-between">

            <div>

                <h3>Dashboard Petugas</h3>

                <small>
                    Sistem Bantuan Sosial Masyarakat
                </small>

            </div>

            <div>

                <span class="badge bg-primary">
                    Petugas
                </span>

            </div>

        </div>

    </div>

    @yield('content')

</div>

</body>
</html>
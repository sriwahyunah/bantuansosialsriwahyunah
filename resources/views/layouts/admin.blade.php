<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f6f9;
            font-family: Arial, Helvetica, sans-serif;
        }

        /*
        |--------------------------------------------------------------------------
        | SIDEBAR
        |--------------------------------------------------------------------------
        */

        .sidebar {

            width: 260px;

            height: 100vh;

            position: fixed;

            top: 0;

            left: 0;

            background: linear-gradient(180deg, #0d6efd, #0a58ca);

            padding-top: 20px;

            overflow-y: auto;

            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);

        }

        .sidebar .logo {

            text-align: center;

            margin-bottom: 10px;

            color: white;

            font-size: 35px;

        }

        .sidebar h3 {

            color: white;

            text-align: center;

            font-weight: bold;

            margin-bottom: 30px;

        }

        .menu-title {

            color: rgba(255, 255, 255, 0.7);

            margin: 20px;

            font-size: 12px;

            letter-spacing: 1px;

        }

        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            text-decoration: none;

            color: white;

            padding: 14px 18px;

            margin: 6px 12px;

            border-radius: 14px;

            transition: 0.3s;

            font-size: 15px;

            font-weight: 500;

        }

        .sidebar a:hover {

            background: rgba(255, 255, 255, 0.2);

            transform: translateX(5px);

        }

        .sidebar a.active {

            background: white;

            color: #0d6efd;

            font-weight: bold;

        }

        .logout-btn {

            width: 100%;

            border: none;

            background: #dc3545;

            color: white;

            padding: 12px;

            border-radius: 12px;

            font-weight: bold;

            transition: 0.3s;

        }

        .logout-btn:hover {

            background: #bb2d3b;

        }

        /*
        |--------------------------------------------------------------------------
        | CONTENT
        |--------------------------------------------------------------------------
        */

        .content {

            margin-left: 260px;

            padding: 25px;

        }

        .topbar {

            background: white;

            padding: 20px;

            border-radius: 20px;

            margin-bottom: 25px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);

            display: flex;

            justify-content: space-between;

            align-items: center;

        }
    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <div class="logo">
            <i class="fa fa-hand-holding-heart"></i>
        </div>

        <h3>Bantuan Sosial</h3>

        <div class="menu-title">
            MENU ADMIN
        </div>

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}">

            <i class="fa fa-home"></i>

            Dashboard

        </a>

        {{-- BANTUAN --}}
        <a href="{{ route('admin.bantuan.index') }}">

            <i class="fa fa-hand-holding-heart"></i>

            Bantuan

        </a>

        {{-- EVENT --}}
        <a href="{{ route('admin.event.index') }}">

            <i class="fa fa-calendar-days"></i>

            Event Bantuan

        </a>

        {{-- MASYARAKAT --}}
        <a href="{{ route('admin.masyarakat.index') }}">

            <i class="fa fa-users"></i>

            Masyarakat

        </a>


        {{-- VERIFIKASI --}}
        <a href="{{ route('admin.verifikasi.index') }}">

            <i class="fa fa-circle-check"></i>

            Verifikasi

        </a>

        {{-- LAPORAN --}}
        <a href="{{ route('admin.laporan.index') }}">

            <i class="fa fa-chart-line"></i>

            Laporan

        </a>

        <li class="nav-item">
            <a href="{{ url('admin/pengajuan') }}" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Pengajuan</p>
            </a>
        </li>
        
        <li>
            <a href="{{ route('admin.penyaluran.index') }}">
                <i class="fas fa-truck"></i>
                Penyaluran
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pengambilan.index') }}">
                <i class="fas fa-box-open"></i>
                Pengambilan
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>Manajemen User</p>
            </a>
        </li>

        <div class="px-3 mt-4">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="logout-btn">

                    <i class="fa fa-right-from-bracket"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="content">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div>

                <h4 class="fw-bold mb-1">
                    Dashboard Admin
                </h4>

                <small class="text-muted">
                    Sistem Bantuan Sosial Masyarakat
                </small>

            </div>

            <div>

                <span class="badge bg-primary p-2">

                    <i class="fa fa-user-shield"></i>

                    Admin

                </span>

            </div>

        </div>

        {{-- CONTENT --}}
        @yield('content')

    </div>

</body>

</html>
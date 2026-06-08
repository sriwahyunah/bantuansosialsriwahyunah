<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Bantuan Sosial</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        /* =======================
           SIDEBAR
        ======================= */

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:280px;
            height:100vh;
            background:linear-gradient(180deg,#198754,#146c43);
            overflow-y:auto;
            z-index:999;
        }

        .brand{
            padding:25px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.15);
        }

        .brand h3{
            color:white;
            font-weight:700;
            margin-bottom:5px;
        }

        .brand small{
            color:rgba(255,255,255,.8);
        }

        .menu{
            padding:20px 15px;
        }

        .menu-title{
            color:rgba(255,255,255,.6);
            font-size:12px;
            text-transform:uppercase;
            margin-bottom:10px;
            padding-left:10px;
        }

        .menu a{
            display:flex;
            align-items:center;
            gap:12px;
            padding:14px 18px;
            text-decoration:none;
            color:white;
            border-radius:12px;
            margin-bottom:8px;
            transition:.3s;
        }

        .menu a:hover{
            background:rgba(255,255,255,.15);
            transform:translateX(5px);
        }

        .menu a.active{
            background:white;
            color:#198754;
            font-weight:600;
        }

        .menu i{
            font-size:18px;
        }

        /* =======================
           CONTENT
        ======================= */

        .main-content{
            margin-left:280px;
            padding:25px;
        }

        /* =======================
           TOPBAR
        ======================= */

        .topbar{
            background:white;
            border-radius:20px;
            padding:20px 25px;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
            margin-bottom:25px;
        }

        .topbar-title{
            font-size:24px;
            font-weight:700;
            margin-bottom:5px;
        }

        .topbar-subtitle{
            color:#6c757d;
            margin:0;
        }

        .user-badge{
            background:#198754;
            color:white;
            padding:10px 18px;
            border-radius:50px;
            font-size:14px;
        }

        /* =======================
           CARD
        ======================= */

        .card{
            border:none;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
        }

        .card-header{
            background:white;
            border-bottom:1px solid #f1f1f1;
            border-radius:20px 20px 0 0 !important;
        }

        .card:hover{
            transition:.3s;
            transform:translateY(-2px);
        }

        /* =======================
           BUTTON
        ======================= */

        .btn{
            border-radius:12px;
        }

        /* =======================
           TABLE
        ======================= */

        .table th{
            font-weight:600;
            background:#f8f9fa;
        }

        .table td,
        .table th{
            vertical-align:middle;
        }

        /* =======================
           BADGE
        ======================= */

        .badge{
            padding:8px 12px;
            font-size:12px;
        }

        /* =======================
           LOGOUT
        ======================= */

        .logout-box{
            position:absolute;
            bottom:20px;
            width:100%;
            padding:0 15px;
        }

        .logout-btn{
            width:100%;
            border:none;
            background:#dc3545;
            color:white;
            padding:12px;
            border-radius:12px;
            font-weight:600;
        }

        .logout-btn:hover{
            background:#bb2d3b;
        }

        /* =======================
           MOBILE
        ======================= */

        @media(max-width:991px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main-content{
                margin-left:0;
            }

            .logout-box{
                position:relative;
                margin-top:20px;
            }

            .topbar{
                text-align:center;
            }
        }
    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <div class="brand">

            <h3>
                <i class="bi bi-people-fill"></i>
                Bantuan Sosial
            </h3>

            <small>
                Sistem Informasi Penerima Bantuan
            </small>

        </div>

        <div class="menu">

            <div class="menu-title">
                Menu Utama
            </div>

            <a href="{{ route('masyarakat.dashboard') }}"
                class="{{ request()->routeIs('masyarakat.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <a href="{{ route('masyarakat.pengajuan.index') }}"
                class="{{ request()->routeIs('masyarakat.pengajuan.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                Pengajuan Bantuan
            </a>

            <a href="{{ route('masyarakat.status.index') }}"
                class="{{ request()->routeIs('masyarakat.status.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check"></i>
                Status Pengajuan
            </a>

            <a href="{{ route('masyarakat.event.index') }}"
                class="{{ request()->routeIs('masyarakat.event.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i>
                Event Bantuan
            </a>

        </div>

        <div class="logout-box">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>

            </form>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="main-content">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h4 class="topbar-title">
                        Dashboard Penerima Bantuan
                    </h4>

                    <p class="topbar-subtitle">
                        Sistem Bantuan Sosial Masyarakat
                    </p>

                </div>

                <div>

                    <span class="user-badge">
                        <i class="bi bi-person-circle"></i>
                        {{ auth()->user()->nama ?? 'User' }}
                    </span>

                </div>

            </div>

        </div>

        {{-- FLASH MESSAGE --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>

        @endif

        {{-- PAGE CONTENT --}}
        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
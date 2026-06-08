<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Bantuan Sosial</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #f4f7fc;
            overflow-x: hidden;
        }

        /* ================= NAVBAR ================= */

        .navbar{
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            transition: 0.3s;
        }

        .navbar-brand{
            font-weight: 700;
            color: white !important;
            font-size: 24px;
        }

        .nav-link{
            color: white !important;
            margin-left: 15px;
            transition: 0.3s;
        }

        .nav-link:hover{
            color: #ffd369 !important;
        }

        .btn-login{
            background: white;
            color: #0d6efd;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #ffd369;
            color: black;
        }

        /* ================= HERO ================= */

        .hero{
            min-height: 100vh;
            background:
            linear-gradient(rgba(13,110,253,0.8), rgba(0,198,255,0.7)),
            url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1600&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
        }

        .hero-content{
            text-align: center;
        }

        .hero h1{
            font-size: 60px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p{
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 35px;
        }

        .hero-btn{
            padding: 14px 35px;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            background: white;
            color: #0d6efd;
            border: none;
            transition: 0.3s;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .hero-btn:hover{
            transform: translateY(-5px);
            background: #ffd369;
            color: black;
        }

        /* ================= STATS ================= */

        .stats-section{
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }

        .stat-card{
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 35px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
        }

        .stat-card:hover{
            transform: translateY(-10px);
        }

        .stat-icon{
            width: 70px;
            height: 70px;
            line-height: 70px;
            border-radius: 50%;
            margin: auto;
            margin-bottom: 20px;
            font-size: 28px;
            color: white;
        }

        .bg-blue{
            background: linear-gradient(45deg,#0d6efd,#3fa9ff);
        }

        .bg-green{
            background: linear-gradient(45deg,#00b894,#55efc4);
        }

        .bg-orange{
            background: linear-gradient(45deg,#fd7e14,#ffb347);
        }

        .bg-red{
            background: linear-gradient(45deg,#dc3545,#ff7675);
        }

        .stat-card h2{
            font-weight: 700;
            margin-bottom: 10px;
        }

        /* ================= FITUR ================= */

        .section-title{
            font-size: 40px;
            font-weight: 700;
            color: #0d1b2a;
            margin-bottom: 15px;
        }

        .section-subtitle{
            color: #6c757d;
            margin-bottom: 50px;
        }

        .feature-card{
            background: white;
            border-radius: 25px;
            padding: 40px 30px;
            text-align: center;
            transition: 0.4s;
            height: 100%;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .feature-card:hover{
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .feature-icon{
            width: 90px;
            height: 90px;
            line-height: 90px;
            border-radius: 25px;
            margin: auto;
            margin-bottom: 25px;
            font-size: 35px;
            color: white;
            background: linear-gradient(45deg,#0d6efd,#00c6ff);
        }

        .feature-card h4{
            font-weight: 600;
            margin-bottom: 15px;
        }

        .feature-card p{
            color: #6c757d;
        }

        /* ================= FOOTER ================= */

        footer{
            background: #0d1b2a;
            color: white;
            padding: 30px 0;
            margin-top: 100px;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            .hero h1{
                font-size: 38px;
            }

            .hero p{
                font-size: 16px;
            }

            .section-title{
                font-size: 30px;
            }

            .stat-card{
                margin-bottom: 20px;
            }

        }

    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-hand-holding-heart"></i>
                Bantuan Sosial
            </a>

            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Fitur</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a href="/login" class="btn btn-login">
                            Login
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    {{-- HERO --}}
    <section class="hero">

        <div class="container">

            <div class="hero-content">

                <h1>
                    Sistem Bantuan Sosial 
                </h1>

                <p>
                    Membantu penyaluran bantuan masyarakat secara cepat,
                    transparan, efisien dan tepat sasaran.
                </p>

                <a href="/login" class="btn hero-btn">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Masuk Sistem
                </a>

            </div>

        </div>

    </section>

    {{-- STATISTIK --}}
    <section class="stats-section pb-5">

        <div class="container">

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="stat-card">

                        <div class="stat-icon bg-blue">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <h2>150+</h2>
                        <p>Penerima Bantuan</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">

                        <div class="stat-icon bg-green">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <h2>20+</h2>
                        <p>Event Bantuan</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">

                        <div class="stat-icon bg-orange">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>

                        <h2>Rp 50JT</h2>
                        <p>Total Bantuan</p>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card">

                        <div class="stat-icon bg-red">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>

                        <h2>10+</h2>
                        <p>Petugas Aktif</p>

                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- FITUR --}}
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    Fitur Sistem
                </h2>

                <p class="section-subtitle">
                    Sistem modern untuk pengelolaan bantuan sosial masyarakat
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>

                        <h4>Bantuan Sosial</h4>

                        <p>
                            Mengelola data bantuan sosial dengan cepat,
                            aman dan transparan.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-users-viewfinder"></i>
                        </div>

                        <h4>Verifikasi Data</h4>

                        <p>
                            Memastikan penerima bantuan sesuai
                            dengan kriteria yang telah ditentukan.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>

                        <h4>Event Bantuan</h4>

                        <p>
                            Mengatur jadwal penyaluran bantuan
                            secara terstruktur dan efisien.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    <footer>

        <div class="container text-center">

            <h5 class="mb-3">
                Sistem Bantuan Sosial
            </h5>

            <p class="mb-0">
                © {{ date('Y') }} Semua Hak Dilindungi
            </p>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@extends('layouts.masyarakat')

@section('content')

<style>
    body {
        background: #f4f7fb;
    }

    .hero-card {
        background: linear-gradient(135deg, #198754, #20c997);
        border-radius: 25px;
        color: white;
        overflow: hidden;
        position: relative;
    }

    .hero-card::before {
        content: '';
        position: absolute;
        right: -50px;
        top: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, .1);
        border-radius: 50%;
    }

    .hero-card::after {
        content: '';
        position: absolute;
        right: 80px;
        bottom: -60px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, .08);
        border-radius: 50%;
    }

    .dashboard-card {
        border: none;
        border-radius: 20px;
        transition: .3s;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, .08);
    }

    .stat-icon {
        font-size: 50px;
        opacity: .2;
    }

    .pengajuan-card {
        border: none;
        border-radius: 20px;
        transition: .3s;
    }

    .pengajuan-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    .status-badge {
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-menunggu {
        background: #fff3cd;
        color: #856404;
    }

    .status-disetujui {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-ditolak {
        background: #f8d7da;
        color: #842029;
    }

    .status-diproses {
        background: #cfe2ff;
        color: #084298;
    }

    .progress {
        height: 12px;
        border-radius: 20px;
    }

    .empty-state {
        padding: 80px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 120px;
        color: #198754;
    }

    .btn-modern {
        border-radius: 12px;
        padding: 10px 20px;
    }

    .info-box {
        background: #e8f7ff;
        border-radius: 15px;
        padding: 20px;
    }
</style>

<div class="container-fluid">

    {{-- HERO --}}
    <div class="card border-0 shadow-lg hero-card mb-4">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <span class="badge bg-light text-success mb-3">
                        Sistem Bantuan Sosial
                    </span>

                    <h2 class="fw-bold mb-3">
                        Halo, {{ auth()->user()->nama ?? 'Penerima Bantuan' }} 👋
                    </h2>

                    <p class="mb-4">
                        Kelola pengajuan bantuan sosial Anda dengan mudah,
                        cepat, dan transparan.
                    </p>

                    <a href="{{ route('masyarakat.pengajuan.create') }}"
                        class="btn btn-light btn-modern">

                        <i class="bi bi-plus-circle"></i>
                        Ajukan Bantuan

                    </a>

                </div>

                <div class="col-md-4 text-center">

                    <i class="bi bi-people-fill"
                        style="font-size:120px;opacity:.25"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted">
                                Total Pengajuan
                            </h6>

                            <h2 class="fw-bold text-primary">
                                {{ $pengajuans->count() }}
                            </h2>
                        </div>

                        <i class="bi bi-file-earmark-text-fill stat-icon text-primary"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted">
                                Disetujui
                            </h6>

                            <h2 class="fw-bold text-success">
                                {{ $pengajuans->where('status','Disetujui')->count() }}
                            </h2>
                        </div>

                        <i class="bi bi-check-circle-fill stat-icon text-success"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h6 class="text-muted">
                                Menunggu
                            </h6>

                            <h2 class="fw-bold text-warning">
                                {{ $pengajuans->where('status','Menunggu')->count() }}
                            </h2>
                        </div>

                        <i class="bi bi-hourglass-split stat-icon text-warning"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- PROGRESS --}}
    <div class="card dashboard-card shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Progress Pengajuan
            </h5>

            @php
            $total = $pengajuans->count();
            $disetujui = $pengajuans->where('status','Disetujui')->count();

            $persen = $total > 0
            ? ($disetujui / $total) * 100
            : 0;
            @endphp

            <div class="progress mb-2">

                <div class="progress-bar bg-success"
                    style="width: {{ $persen }}%">
                </div>

            </div>
            <small class="text-muted">
                {{ number_format($persen,0) }}% pengajuan telah disetujui
            </small>

        </div>

    </div>

    {{-- LIST PENGAJUAN --}}
    <div class="card dashboard-card shadow-lg">

        <div class="card-header bg-white border-0 py-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h4 class="fw-bold mb-1">
                        <i class="bi bi-file-earmark-text text-success"></i>
                        Pengajuan Bantuan
                    </h4>

                    <small class="text-muted">
                        Riwayat pengajuan bantuan Anda
                    </small>

                </div>

                <a href="{{ route('masyarakat.pengajuan.create') }}"
                    class="btn btn-success btn-modern">

                    <i class="bi bi-plus-circle"></i>
                    Ajukan Bantuan

                </a>

            </div>

        </div>

        <div class="card-body">

            <div class="info-box mb-4">

                <i class="bi bi-info-circle-fill"></i>

                Pastikan data yang Anda masukkan benar dan sesuai kondisi sebenarnya.

            </div>

            @if($pengajuans->count())

            @foreach($pengajuans as $item)

            <div class="card pengajuan-card shadow-sm mb-3">

                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <h5 class="fw-bold mb-1">

                                {{ $item->bantuan->nama_bantuan ?? '-' }}

                            </h5>

                            <small class="text-muted">

                                <i class="bi bi-calendar-event"></i>

                                {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}

                            </small>

                        </div>

                        <div class="col-md-3 mt-3 mt-md-0">

                            @if($item->status == 'Menunggu')

                            <span class="status-badge status-menunggu">
                                Menunggu
                            </span>

                            @elseif($item->status == 'Disetujui')

                            <span class="status-badge status-disetujui">
                                Disetujui
                            </span>

                            @elseif($item->status == 'Diproses')

                            <span class="status-badge status-diproses">
                                Diproses
                            </span>

                            @else

                            <span class="status-badge status-ditolak">
                                Ditolak
                            </span>

                            @endif

                        </div>

                        <div class="col-md-3 text-md-end mt-3 mt-md-0">

                            <a href="{{ route('masyarakat.pengajuan.show',$item->id) }}"
                                class="btn btn-outline-primary btn-modern">

                                <i class="bi bi-eye"></i>
                                Detail

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

            @else

            <div class="empty-state">

                <i class="bi bi-folder2-open"></i>

                <h3 class="fw-bold mt-4">
                    Belum Ada Pengajuan
                </h3>

                <p class="text-muted">
                    Anda belum pernah mengajukan bantuan.
                </p>

                <a href="{{ route('masyarakat.pengajuan.create') }}"
                    class="btn btn-success btn-lg btn-modern">

                    <i class="bi bi-plus-circle"></i>
                    Ajukan Sekarang

                </a>

            </div>

            @endif

        </div>

    </div>

    {{-- BANTUAN --}}
    <div class="card dashboard-card shadow-sm mt-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h5 class="fw-bold">

                        <i class="bi bi-headset text-success"></i>

                        Butuh Bantuan?

                    </h5>

                    <p class="text-muted mb-0">

                        Jika mengalami kendala saat melakukan pengajuan,
                        silakan hubungi admin atau petugas bantuan sosial.

                    </p>

                </div>

                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <a href="#"
                        class="btn btn-outline-success btn-modern">

                        <i class="bi bi-telephone"></i>
                        Hubungi Admin

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
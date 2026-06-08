@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-4">

        <div class="col-md-12">

            <h2 class="fw-bold">
                Dashboard Petugas
            </h2>

            <p class="text-muted">
                Sistem Bantuan Sosial Masyarakat
            </p>

        </div>

    </div>

    {{-- CARD STATISTIK --}}
    <div class="row">

        {{-- Pengambilan --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-primary shadow position-relative">

                <div class="card-body">

                    <h5>Total Pengambilan</h5>

                    <h1 class="fw-bold">
                        {{ $totalPengambilan }}
                    </h1>

                    <i class="bi bi-box-seam icon-card"></i>

                </div>

            </div>

        </div>

        {{-- Penyaluran --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-success shadow position-relative">

                <div class="card-body">

                    <h5>Total Penyaluran</h5>

                    <h1 class="fw-bold">
                        {{ $totalPenyaluran }}
                    </h1>

                    <i class="bi bi-truck icon-card"></i>

                </div>

            </div>

        </div>

        {{-- Event --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-danger shadow position-relative">

                <div class="card-body">

                    <h5>Total Event</h5>

                    <h1 class="fw-bold">
                        {{ $totalEventBantuan }}
                    </h1>

                    <i class="bi bi-calendar-event icon-card"></i>

                </div>

            </div>

        </div>

        {{-- Pengajuan --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-warning shadow position-relative">

                <div class="card-body">

                    <h5>Total Pengajuan</h5>

                    <h1 class="fw-bold">
                        {{ $totalPengajuan ?? 0}}
                    </h1>

                    <i class="bi bi-folder-check icon-card"></i>

                </div>

            </div>

        </div>

        {{-- Verifikasi --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-info shadow position-relative">

                <div class="card-body">

                    <h5>Total Verifikasi</h5>

                    <h1 class="fw-bold">
                        {{ $totalVerifikasi ?? 0}}
                    </h1>

                    <i class="bi bi-check-circle icon-card"></i>

                </div>

            </div>

        </div>

        {{-- Laporan --}}
        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card card-dashboard bg-dark shadow position-relative">

                <div class="card-body">

                    <h5>Total Laporan</h5>

                    <h1 class="fw-bold">
                        {{ $totalLaporan ?? 0 }}
                    </h1>

                    <i class="bi bi-file-earmark-text icon-card"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- TABEL AKTIVITAS --}}
    <div class="row mt-4">

        <div class="col-lg-12">

            <div class="card shadow border-0">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Aktivitas Bantuan Terbaru
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-hover">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Fitur</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Pengambilan Bantuan</td>
                                <td>
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                </td>
                                <td>2026-05-29</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Verifikasi Pengajuan</td>
                                <td>
                                    <span class="badge bg-warning">
                                        Diproses
                                    </span>
                                </td>
                                <td>2026-05-29</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
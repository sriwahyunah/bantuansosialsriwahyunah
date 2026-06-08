@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold">
            Dashboard Admin
        </h2>

        <p class="text-muted">
            Selamat datang di Sistem Bantuan Sosial
        </p>

    </div>

    {{-- CARD STATISTIK --}}
    <div class="row">

        {{-- BANTUAN --}}
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg bg-primary text-white rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Total Bantuan</h6>

                            <h2 class="fw-bold">
                                {{ $totalBantuan }}
                            </h2>

                        </div>

                        <div>
                            <i class="fa fa-hand-holding-heart fa-3x"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- EVENT --}}
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg bg-success text-white rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Total Event</h6>

                            <h2 class="fw-bold">
                                {{ $totalEvent }}
                            </h2>

                        </div>

                        <div>
                            <i class="fa fa-calendar fa-3x"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- MASYARAKAT --}}
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg bg-warning text-white rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Total Masyarakat</h6>

                            <h2 class="fw-bold">
                                {{ $totalMasyarakat }}
                            </h2>

                        </div>

                        <div>
                            <i class="fa fa-users fa-3x"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- PENGAJUAN --}}
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg bg-danger text-white rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6>Total Pengajuan</h6>

                            <h2 class="fw-bold">
                                {{ $totalPengajuan }}
                            </h2>

                        </div>

                        <div>
                            <i class="fa fa-file-alt fa-3x"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ROW 2 --}}
    <div class="row">

        {{-- PENGAMBILAN --}}
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-box fa-3x text-primary mb-3"></i>

                    <h5>Total Pengambilan</h5>

                    <h1 class="fw-bold">
                        {{ $totalPengambilan }}
                    </h1>

                </div>

            </div>

        </div>

        {{-- USER --}}
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-user-shield fa-3x text-success mb-3"></i>

                    <h5>Total User</h5>

                    <h1 class="fw-bold">
                        {{ $totalUser }}
                    </h1>

                </div>

            </div>

        </div>

        {{-- LAPORAN --}}
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body text-center">

                    <i class="fa fa-chart-line fa-3x text-danger mb-3"></i>

                    <h5>Total Laporan</h5>

                    <h1 class="fw-bold">
                        {{ $totalLaporan }}
                    </h1>

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 pt-4">

            <h5 class="fw-bold">
                Pengajuan Terbaru
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>ID Pengajuan</th>
                            <th>Tanggal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pengajuanTerbaru as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->id }}
                            </td>

                            <td>
                                {{ $item->created_at }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center">
                                Tidak ada data
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
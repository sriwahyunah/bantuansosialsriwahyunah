@extends('layouts.masyarakat')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <h3 class="fw-bold text-success">
                Halo, {{ auth()->user()->name }} 👋
            </h3>

            <p class="text-muted mb-0">
                Selamat datang di Sistem Informasi Bantuan Sosial.
                Pantau pengajuan dan bantuan yang tersedia.
            </p>

        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Total Pengajuan
                    </h6>

                    <h2 class="fw-bold text-primary">
                        {{ $totalPengajuan }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Disetujui
                    </h6>

                    <h2 class="fw-bold text-success">
                        {{ $disetujui }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Menunggu
                    </h6>

                    <h2 class="fw-bold text-warning">
                        {{ $menunggu }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Event Aktif
                    </h6>

                    <h2 class="fw-bold text-info">
                        {{ $eventAktif }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        {{-- PENGAJUAN TERBARU --}}
        <div class="col-md-8">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-success text-white">
                    Pengajuan Terbaru
                </div>

                <div class="card-body">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Bantuan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($pengajuanTerbaru as $item)

                            <tr>
                                <td>
                                    {{ $item->bantuan->nama_bantuan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->tanggal_pengajuan }}
                                </td>

                                <td>

                                    @if($item->status == 'disetujui')
                                        <span class="badge bg-success">
                                            Disetujui
                                        </span>

                                    @elseif($item->status == 'ditolak')
                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>

                                    @else
                                        <span class="badge bg-warning">
                                            Menunggu
                                        </span>
                                    @endif

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="3" class="text-center">
                                    Belum ada pengajuan.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        {{-- PROFIL --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-primary text-white">
                    Profil Pengguna
                </div>

                <div class="card-body">

                    <p>
                        <strong>Nama :</strong><br>
                        {{ auth()->user()->name }}
                    </p>

                    <p>
                        <strong>Username :</strong><br>
                        {{ auth()->user()->username }}
                    </p>

                    <p>
                        <strong>Role :</strong><br>
                        Penerima Bantuan
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- BANTUAN AKTIF --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-success text-white">
            Bantuan yang Sedang Dibuka
        </div>

        <div class="card-body">

            <div class="row">

                @forelse($bantuanAktif as $bantuan)

                <div class="col-md-4 mb-3">

                    <div class="border rounded p-3 h-100">

                        <h5>
                            {{ $bantuan->nama_bantuan }}
                        </h5>

                        <p class="text-muted">
                            {{ Str::limit($bantuan->deskripsi, 100) }}
                        </p>

                        <small>
                            Kuota :
                            {{ $bantuan->kuota_penerima }}
                        </small>

                    </div>

                </div>

                @empty

                <div class="col-md-12">
                    Tidak ada bantuan aktif.
                </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- EVENT --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-info text-white">
            Event Bantuan Terdekat
        </div>

        <div class="card-body">

            <ul class="list-group">

                @forelse($eventTerbaru as $event)

                <li class="list-group-item">

                    <strong>
                        {{ $event->nama_event }}
                    </strong>

                    <br>

                    {{ $event->tanggal_event }}
                    - {{ $event->lokasi }}

                </li>

                @empty

                <li class="list-group-item">
                    Belum ada event bantuan.
                </li>

                @endforelse

            </ul>

        </div>

    </div>

</div>

@endsection
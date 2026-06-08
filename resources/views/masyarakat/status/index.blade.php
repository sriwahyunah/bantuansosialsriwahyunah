@extends('layouts.masyarakat')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="card border-0 shadow-lg mb-4">
        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <span class="badge bg-primary mb-2">
                        Monitoring Pengajuan
                    </span>

                    <h2 class="fw-bold">
                        Status Pengajuan Bantuan
                    </h2>

                    <p class="text-muted mb-0">
                        Pantau perkembangan seluruh pengajuan bantuan yang telah Anda kirim.
                    </p>

                </div>

                <div class="col-md-4 text-center">

                    <i class="bi bi-clipboard-check text-primary"
                       style="font-size:100px"></i>

                </div>

            </div>

        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <i class="bi bi-file-earmark-text text-primary fs-1"></i>

                    <h3 class="fw-bold mt-2">
                        {{ $pengajuans->count() }}
                    </h3>

                    <p class="text-muted mb-0">
                        Total Pengajuan
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <i class="bi bi-hourglass-split text-warning fs-1"></i>

                    <h3 class="fw-bold mt-2">
                        {{ $pengajuans->where('status','Pending')->count() }}
                    </h3>

                    <p class="text-muted mb-0">
                        Pending
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <i class="bi bi-check-circle text-success fs-1"></i>

                    <h3 class="fw-bold mt-2">
                        {{ $pengajuans->where('status','Disetujui')->count() }}
                    </h3>

                    <p class="text-muted mb-0">
                        Disetujui
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <i class="bi bi-x-circle text-danger fs-1"></i>

                    <h3 class="fw-bold mt-2">
                        {{ $pengajuans->where('status','Ditolak')->count() }}
                    </h3>

                    <p class="text-muted mb-0">
                        Ditolak
                    </p>

                </div>
            </div>
        </div>

    </div>

    {{-- TABEL --}}
    <div class="card border-0 shadow-lg">

        <div class="card-header bg-white py-3">

            <h4 class="fw-bold mb-0">
                Riwayat Status Pengajuan
            </h4>

        </div>

        <div class="card-body">

            @if($pengajuans->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Jenis Bantuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pengajuans as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>
                                    {{ $item->bantuan->nama_bantuan ?? '-' }}
                                </strong>
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}
                            </td>

                            <td>

                                @if($item->status == 'Pending')

                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Pending
                                </span>

                                @elseif($item->status == 'Disetujui')

                                <span class="badge bg-success px-3 py-2">
                                    Disetujui
                                </span>

                                @elseif($item->status == 'Diproses')

                                <span class="badge bg-primary px-3 py-2">
                                    Diproses
                                </span>

                                @else

                                <span class="badge bg-danger px-3 py-2">
                                    Ditolak
                                </span>

                                @endif

                            </td>

                            <td>

                                @if($item->status == 'Pending')
                                    Menunggu verifikasi petugas.
                                @elseif($item->status == 'Diproses')
                                    Sedang diproses oleh petugas.
                                @elseif($item->status == 'Disetujui')
                                    Pengajuan telah disetujui.
                                @else
                                    Pengajuan tidak memenuhi syarat.
                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="text-center py-5">

                <i class="bi bi-inbox text-secondary"
                   style="font-size:120px"></i>

                <h3 class="fw-bold mt-3">
                    Belum Ada Pengajuan
                </h3>

                <p class="text-muted">
                    Anda belum memiliki riwayat pengajuan bantuan.
                </p>

                <a href="{{ route('masyarakat.pengajuan.create') }}"
                   class="btn btn-success">

                    <i class="bi bi-plus-circle"></i>
                    Ajukan Bantuan

                </a>

            </div>

            @endif

        </div>

    </div>

</div>

@endsection
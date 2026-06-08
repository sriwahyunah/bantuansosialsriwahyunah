@extends('layouts.masyarakat')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
        <h2 class="fw-bold text-dark">
            Event Bantuan Sosial
        </h2>

        <p class="text-muted mb-0">
            Informasi kegiatan penyaluran bantuan sosial untuk penerima bantuan.
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Total Event</h6>
                    <h2 class="fw-bold text-success">
                        {{ $events->count() }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Akan Datang</h6>
                    <h2 class="fw-bold text-primary">
                        {{ $events->where('status','akan_datang')->count() }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Sedang Berlangsung</h6>
                    <h2 class="fw-bold text-warning">
                        {{ $events->where('status','berlangsung')->count() }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Selesai</h6>
                    <h2 class="fw-bold text-danger">
                        {{ $events->where('status','selesai')->count() }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        {{-- LIST EVENT --}}
        <div class="col-lg-9">

            @forelse($events as $event)

            <div class="card border-0 shadow-sm rounded-4 mb-3">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h5 class="fw-bold">
                                {{ $event->nama_event }}
                            </h5>

                            <p class="text-muted mb-2">
                                {{ $event->deskripsi }}
                            </p>

                            <div class="small text-secondary">

                                <span class="me-3">
                                    📍 {{ $event->lokasi }}
                                </span>

                                <span class="me-3">
                                    📅
                                    {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                                </span>

                                <span>
                                    🎁 {{ $event->jenis_bantuan }}
                                </span>

                            </div>

                        </div>

                        <div class="text-end">

                            @if($event->status == 'akan_datang')
                                <span class="badge bg-primary">
                                    Akan Datang
                                </span>
                            @elseif($event->status == 'berlangsung')
                                <span class="badge bg-warning">
                                    Berlangsung
                                </span>
                            @else
                                <span class="badge bg-success">
                                    Selesai
                                </span>
                            @endif

                            <br><br>

                            <a href="#"
                               class="btn btn-success rounded-pill">
                                Detail Event
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center py-5">

                    <h5 class="text-muted">
                        Belum ada event bantuan
                    </h5>

                </div>
            </div>

            @endforelse

        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h5 class="fw-bold text-success">
                        Informasi
                    </h5>

                    <hr>

                    <p class="small text-muted">

                        Event bantuan merupakan kegiatan
                        penyaluran bantuan sosial kepada
                        penerima bantuan yang telah terdaftar.

                    </p>

                    <p class="small text-muted">

                        Pastikan mengikuti jadwal dan lokasi
                        yang telah ditentukan.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
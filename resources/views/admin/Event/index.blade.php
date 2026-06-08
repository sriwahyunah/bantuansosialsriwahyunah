@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h3 class="fw-bold">
            Data Event Bantuan
        </h3>

        <p class="text-muted">
            Daftar seluruh event bantuan sosial masyarakat
        </p>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4">

        {{-- CARD HEADER --}}
        <div class="card-header bg-white border-0 pt-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        Tabel Event Bantuan
                    </h5>

                    <small class="text-muted">
                        Data event bantuan sosial terbaru
                    </small>

                </div>

                <a href="#"
                    class="btn btn-primary rounded-3">

                    <i class="fa fa-plus"></i>

                    Tambah Event

                </a>

            </div>

        </div>

        {{-- CARD BODY --}}
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    {{-- TABLE HEAD --}}
                    <thead class="table-light">

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Nama Event</th>

                            <th>Tanggal Event</th>

                            <th>Lokasi</th>

                            <th>Deskripsi</th>

                            <th>Status</th>

                            <th>Dibuat</th>

                        </tr>

                    </thead>

                    {{-- TABLE BODY --}}
                    <tbody>

                        @forelse($events as $event)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            {{-- FOTO --}}
                            <td>

                                @if($event->foto)

                                <img
                                    src="{{ asset('storage/' . $event->foto) }}"
                                    width="90"
                                    height="60"
                                    class="rounded shadow-sm"
                                    style="object-fit:cover;">

                                @else

                                <span class="badge bg-secondary">

                                    Tidak Ada Foto

                                </span>

                                @endif

                            </td>

                            {{-- NAMA EVENT --}}
                            <td>

                                <div class="fw-semibold">

                                    {{ $event->nama_event }}

                                </div>

                            </td>

                            {{-- TANGGAL --}}
                            <td>

                                {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}

                            </td>

                            {{-- LOKASI --}}
                            <td>

                                <span class="text-dark">

                                    {{ $event->lokasi }}

                                </span>

                            </td>

                            {{-- DESKRIPSI --}}
                            <td style="max-width:250px;">

                                {{ $event->deskripsi }}

                            </td>

                            {{-- STATUS --}}
                            <td>

                                @if($event->status == 'Aktif')

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    Tidak Aktif

                                </span>

                                @endif

                            </td>

                            {{-- CREATED --}}
                            <td>

                                {{ $event->created_at->format('d M Y') }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center">

                                Tidak ada data event bantuan

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
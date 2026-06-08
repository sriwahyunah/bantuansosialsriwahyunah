@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

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

                <a
                    href="{{ route('admin.event.create') }}"
                    class="btn btn-primary rounded-3">

                    <i class="fas fa-plus"></i>

                    Tambah Event

                </a>

            </div>

        </div>

        {{-- CARD BODY --}}
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="50">
                                No
                            </th>

                            <th width="120">
                                Foto
                            </th>

                            <th>
                                Nama Event
                            </th>

                            <th width="150">
                                Tanggal Event
                            </th>

                            <th width="200">
                                Lokasi
                            </th>

                            <th>
                                Deskripsi
                            </th>

                            <th width="120">
                                Status
                            </th>

                            <th width="120">
                                Dibuat
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>

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
                                            src="{{ asset('storage/'.$event->foto) }}"
                                            width="90"
                                            height="70"
                                            class="rounded shadow-sm"
                                            style="object-fit:cover;">

                                    @else

                                        <span class="badge bg-secondary">

                                            Tidak Ada Foto

                                        </span>

                                    @endif

                                </td>

                                {{-- NAMA --}}
                                <td>

                                    <strong>

                                        {{ $event->nama_event }}

                                    </strong>

                                </td>

                                {{-- TANGGAL --}}
                                <td>

                                    {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}

                                </td>

                                {{-- LOKASI --}}
                                <td>

                                    {{ $event->lokasi }}

                                </td>

                                {{-- DESKRIPSI --}}
                                <td>

                                    {{ Str::limit($event->deskripsi,80) }}

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

                                {{-- AKSI --}}
                                <td>

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('admin.event.show',$event->id) }}"
                                        class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.event.edit',$event->id) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('admin.event.destroy',$event->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus event ini ?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center py-4">

                                    <div class="text-muted">

                                        Belum ada data event bantuan

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="mt-3">

                {{ $events->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
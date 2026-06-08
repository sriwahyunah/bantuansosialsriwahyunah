@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Data Masyarakat
            </h2>

            <p class="text-muted mb-0">
                Daftar masyarakat penerima bantuan sosial
            </p>
        </div>

        <a href="{{ route('admin.masyarakat.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus-circle"></i>

            Tambah Masyarakat

        </a>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4">

        {{-- HEADER CARD --}}
        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        Tabel Masyarakat
                    </h5>

                    <small class="text-muted">
                        Data masyarakat terbaru
                    </small>

                </div>

                {{-- SEARCH --}}
                <form action="{{ route('admin.masyarakat.index') }}"
                    method="GET">

                    <div class="input-group">

                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari NIK / Nama"
                            value="{{ request('search') }}">

                        <button class="btn btn-primary">

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- BODY --}}
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">No</th>

                            <th>NIK</th>

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>Pekerjaan</th>

                            <th>Gaji</th>

                            <th>Total Harta</th>

                            <th>Kendaraan</th>

                            <th>Status Rumah</th>

                            <th>Status Kelayakan</th>

                            <th>Dibuat</th>

                            <th width="150">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($masyarakats as $masyarakat)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <span class="fw-bold text-dark">
                                    {{ $masyarakat->nik }}
                                </span>
                            </td>

                            <td>
                                {{ $masyarakat->nama }}
                            </td>

                            <td>
                                {{ $masyarakat->alamat }}
                            </td>

                            <td>
                                {{ $masyarakat->pekerjaan }}
                            </td>

                            <td>

                                <span class="fw-bold text-success">

                                    Rp
                                    {{ number_format($masyarakat->gaji,0,',','.') }}

                                </span>

                            </td>

                            <td>

                                <span class="fw-bold text-primary">

                                    Rp
                                    {{ number_format($masyarakat->total_harta,0,',','.') }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-info">

                                    {{ $masyarakat->jumlah_kendaraan }}

                                </span>

                            </td>

                            <td>

                                @if($masyarakat->status_rumah == 'Kontrak')

                                <span class="badge bg-secondary">
                                    Kontrak
                                </span>

                                @elseif($masyarakat->status_rumah == 'Milik Sendiri')

                                <span class="badge bg-success">
                                    Milik Sendiri
                                </span>

                                @else

                                <span class="badge bg-warning text-dark">
                                    Menumpang
                                </span>

                                @endif

                            </td>

                            <td>

                                @if($masyarakat->status_kelayakan == 'Layak')

                                <span class="badge bg-success">

                                    <i class="fas fa-check"></i>

                                    Layak

                                </span>

                                @elseif($masyarakat->status_kelayakan == 'Diproses')

                                <span class="badge bg-warning text-dark">

                                    Diproses

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    <i class="fas fa-times"></i>

                                    Tidak Layak

                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $masyarakat->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <a href="{{ route('admin.masyarakat.show',$masyarakat->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('admin.masyarakat.edit',$masyarakat->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                {{-- DELETE --}}
                                <form
                                    action="{{ route('admin.masyarakat.destroy',$masyarakat->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini ?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="12"
                                class="text-center py-5">

                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                    width="80"
                                    class="mb-3">

                                <h6 class="text-muted">

                                    Belum ada data masyarakat

                                </h6>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="mt-4">

                {{ $masyarakats->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h3 class="fw-bold">
            Data Bantuan Sosial
        </h3>

        <p class="text-muted">
            Daftar seluruh bantuan sosial masyarakat
        </p>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-lg rounded-4">

        {{-- CARD HEADER --}}
        <div class="card-header bg-white border-0 pt-4">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        Tabel Bantuan
                    </h5>

                    <small class="text-muted">
                        Data bantuan sosial terbaru
                    </small>

                </div>

                <a href="{{ route('admin.bantuan.create') }}"
                    class="btn btn-primary rounded-3">

                    <i class="fa fa-plus"></i>
                    Tambah Bantuan

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

                            <th>Nama Bantuan</th>

                            <th>Total Dana</th>

                            <th>Dana Tersisa</th>

                            <th>Kuota</th>

                            <th>Sudah Mengambil</th>

                            <th>Status</th>

                            <th>Deskripsi</th>

                            <th>Dibuat</th>

                        </tr>

                    </thead>

                    {{-- TABLE BODY --}}
                    <tbody>

                        @forelse($bantuans as $bantuan)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            {{-- NAMA --}}
                            <td>

                                <div class="fw-semibold">
                                    {{ $bantuan->nama_bantuan }}
                                </div>

                            </td>

                            {{-- TOTAL DANA --}}
                            <td>

                                <span class="text-success fw-bold">

                                    Rp
                                    {{ number_format($bantuan->total_dana) }}

                                </span>

                            </td>

                            {{-- DANA TERSISA --}}
                            <td>

                                <span class="text-primary fw-bold">

                                    Rp
                                    {{ number_format($bantuan->dana_tersisa) }}

                                </span>

                            </td>

                            {{-- KUOTA --}}
                            <td>

                                <span class="badge bg-info">

                                    {{ $bantuan->kuota_penerima }}

                                </span>

                            </td>

                            {{-- SUDAH MENGAMBIL --}}
                            <td>

                                <span class="badge bg-warning text-dark">

                                    {{ $bantuan->jumlah_sudah_mengambil }}

                                </span>

                            </td>

                            {{-- STATUS --}}
                            <td>

                                @if($bantuan->status == 'Aktif')

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    Tidak Aktif

                                </span>

                                @endif

                            </td>

                            {{-- DESKRIPSI --}}
                            <td style="max-width:250px;">

                                {{ $bantuan->deskripsi }}

                            </td>

                            {{-- CREATED --}}
                            <td>

                                {{ $bantuan->created_at->format('d M Y') }}

                            </td>

                            <td>


                                <a href="{{ route('admin.bantuan.edit',$bantuan->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.bantuan.destroy',$bantuan->id) }}"
                                    method="POST"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>
                        </tr>

                        @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                Tidak ada data bantuan

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
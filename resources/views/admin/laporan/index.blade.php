@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Laporan</h5>

                    <a href="#" class="btn btn-light btn-sm">
                        + Tambah Laporan
                    </a>
                </div>

                <div class="card-body">

                    {{-- Tabel --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi Laporan</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($laporan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->judul }}</td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit($item->isi_laporan, 50) }}
                                        </td>

                                        <td>{{ $item->tanggal_laporan }}</td>

                                        <td>{{ $item->created_at }}</td>

                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Data laporan belum tersedia
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
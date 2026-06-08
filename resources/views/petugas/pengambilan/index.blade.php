@extends('layouts.petugas')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Data Pengambilan</h4>

            <a href="{{ route('petugas.pengambilan.create') }}"
               class="btn btn-light btn-sm">

                <i class="bi bi-plus"></i>
                Tambah Data

            </a>

        </div>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>
                    <th width="60">No</th>
                    <th>Penerima Bantuan</th>
                    <th>Bantuan</th>
                    <th>Jumlah Diterima</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pengambilans as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->masyarakat->nama ?? '-' }}</td>

                    <td>{{ $item->bantuan->nama_bantuan ?? '-' }}</td>

                    <td>{{ $item->jumlah_diterima }}</td>

                    <td>{{ $item->tanggal_pengambilan }}</td>

                    <td>

                        @if($item->status == 'Sudah Diambil')

                            <span class="badge bg-success">
                                {{ $item->status }}
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                {{ $item->status }}
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('petugas.pengambilan.show', $item->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('petugas.pengambilan.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('petugas.pengambilan.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
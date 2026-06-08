@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Data Pengajuan</h4>

        <a href="{{ route('pengajuan.create') }}"
           class="btn btn-primary">
            Tambah Data
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Masyarakat</th>
                    <th>Bantuan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pengajuans as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $item->masyarakat->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $item->bantuan->nama_bantuan ?? '-' }}
                    </td>

                    <td>
                        {{ $item->tanggal_pengajuan }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>

                    <td>

                        <a href="{{ route('pengajuan.show',$item->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('pengajuan.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('pengajuan.destroy',$item->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada data
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
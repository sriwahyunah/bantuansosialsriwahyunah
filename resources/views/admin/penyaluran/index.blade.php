@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Data Penyaluran Bantuan
            </h4>

            <a href="{{ route('admin.penyaluran.create') }}"
                class="btn btn-primary">

                <i class="fas fa-plus"></i>
                Tambah Penyaluran

            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>
                            <th width="50">No</th>
                            <th>ID</th>
                            <th>Penerima</th>
                            <th>Bantuan</th>
                            <th>Jumlah</th>
                            <th>Tanggal Penyaluran</th>
                            <th>Status</th>
                            <th width="220">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($penyalurans as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->id }}</td>

                            <td>
                                {{ $item->masyarakat->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->bantuan->nama_bantuan ?? '-' }}
                            </td>

                            <td>
                                {{ $item->jumlah_disalurkan }}
                            </td>

                            <td>
                                {{ $item->tanggal_penyaluran }}
                            </td>

                            <td>

                                @if($item->status == 'Disalurkan')

                                    <span class="badge bg-success">
                                        Disalurkan
                                    </span>

                                @elseif($item->status == 'Pending')

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('admin.penyaluran.show', $item->id) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a href="{{ route('admin.penyaluran.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.penyaluran.destroy', $item->id) }}"
                                    method="POST"
                                    style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center">

                                Belum ada data penyaluran

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
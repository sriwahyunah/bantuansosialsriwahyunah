@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h3 class="card-title mb-0">
                Data Penyaluran Bantuan
            </h3>
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
                        <th>ID Bantuan</th>
                        <th>ID Penerima</th>
                        <th>Jumlah Disalurkan</th>
                        <th>Tanggal Penyaluran</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($penyalurans as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->bantuan_id }}</td>

                        <td>{{ $item->masyarakat_id }}</td>

                        <td>{{ $item->jumlah_disalurkan }}</td>

                        <td>{{ $item->tanggal_penyaluran }}</td>

                        <td>

                            @if($item->status == 'selesai')
                                <span class="badge bg-success">
                                    Selesai
                                </span>

                            @elseif($item->status == 'proses')
                                <span class="badge bg-warning text-dark">
                                    Proses
                                </span>

                            @else
                                <span class="badge bg-danger">
                                    Ditolak
                                </span>
                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            Data penyaluran belum tersedia
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
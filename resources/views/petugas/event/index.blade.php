@extends('layouts.petugas')

@section('content')

<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Data Event Bantuan
        </h4>

        <a href="{{ route('petugas.event.create') }}"
           class="btn btn-primary">
            Tambah Event
        </a>

    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Jenis</th>
                        <th>Lokasi</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Kuota</th>
                        <th>Peserta</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($events as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_event }}</td>

                    <td>{{ $item->jenis_bantuan }}</td>

                    <td>{{ $item->lokasi }}</td>

                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}</td>

                    <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>

                    <td>{{ $item->kuota }}</td>

                    <td>{{ $item->peserta }}</td>

                    <td>
                        @if($item->status=='akan_datang')
                            <span class="badge bg-primary">
                                Akan Datang
                            </span>
                        @elseif($item->status=='berlangsung')
                            <span class="badge bg-success">
                                Berlangsung
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                Selesai
                            </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('petugas.event.show',$item->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('petugas.event.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
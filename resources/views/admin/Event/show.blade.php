@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-info text-white">

            <h4 class="mb-0">
                Detail Event Bantuan
            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    @if($event->foto)

                        <img
                            src="{{ asset('storage/'.$event->foto) }}"
                            class="img-fluid rounded shadow">

                    @else

                        <div
                            class="alert alert-secondary">

                            Tidak ada foto

                        </div>

                    @endif

                </div>

                <div class="col-md-8">

                    <table
                        class="table table-bordered">

                        <tr>

                            <th width="220">
                                Nama Event
                            </th>

                            <td>
                                {{ $event->nama_event }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tanggal Event
                            </th>

                            <td>
                                {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Lokasi
                            </th>

                            <td>
                                {{ $event->lokasi }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Deskripsi
                            </th>

                            <td>
                                {{ $event->deskripsi }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

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

                        </tr>

                        <tr>

                            <th>
                                Dibuat
                            </th>

                            <td>
                                {{ $event->created_at->format('d F Y H:i') }}
                            </td>

                        </tr>

                    </table>

                    <a
                        href="{{ route('admin.event.edit',$event->id) }}"
                        class="btn btn-warning">

                        Edit

                    </a>

                    <a
                        href="{{ route('admin.event.index') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
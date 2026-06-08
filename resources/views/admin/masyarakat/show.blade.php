@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Detail Data Masyarakat
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">NIK</th>
                    <td>{{ $masyarakat->nik }}</td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td>{{ $masyarakat->nama }}</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>{{ $masyarakat->alamat }}</td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $masyarakat->pekerjaan }}</td>
                </tr>

                <tr>
                    <th>Gaji</th>
                    <td>
                        Rp {{ number_format($masyarakat->gaji,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Total Harta</th>
                    <td>
                        Rp {{ number_format($masyarakat->total_harta,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Jumlah Kendaraan</th>
                    <td>{{ $masyarakat->jumlah_kendaraan }}</td>
                </tr>

                <tr>
                    <th>Status Rumah</th>
                    <td>{{ $masyarakat->status_rumah }}</td>
                </tr>

                <tr>
                    <th>Status Kelayakan</th>
                    <td>

                        @if($masyarakat->status_kelayakan == 'Layak')

                            <span class="badge bg-success">
                                Layak
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Tidak Layak
                            </span>

                        @endif

                    </td>
                </tr>

                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>
                        {{ $masyarakat->created_at->format('d F Y') }}
                    </td>
                </tr>

            </table>

            <a href="{{ route('admin.masyarakat.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

            <a href="{{ route('admin.masyarakat.edit',$masyarakat->id) }}"
               class="btn btn-warning">

                Edit

            </a>

        </div>

    </div>

</div>

@endsection
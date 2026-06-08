@extends('layouts.masyarakat')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Detail Pengajuan
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">
                        Nama Bantuan
                    </th>
                    <td>
                        {{ $pengajuan->bantuan->nama_bantuan ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Tanggal Pengajuan
                    </th>
                    <td>
                        {{ $pengajuan->tanggal_pengajuan }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Status
                    </th>
                    <td>
                        {{ $pengajuan->status }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Kelayakan
                    </th>
                    <td>
                        {{ $pengajuan->layak ? 'Layak' : 'Tidak Layak' }}
                    </td>
                </tr>

            </table>

            <a
                href="{{ route('masyarakat.pengajuan.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection
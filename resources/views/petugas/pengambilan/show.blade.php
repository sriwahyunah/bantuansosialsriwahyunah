@extends('layouts.petugas')

@section('content')

<div class="card shadow">

    <div class="card-header bg-info text-white">
        <h4>Detail Pengambilan</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Nama Masyarakat</th>
                <td>{{ $pengambilan->masyarakat->nama ?? '-' }}</td>
            </tr>

            <tr>
                <th>Nama Bantuan</th>
                <td>{{ $pengambilan->bantuan->nama_bantuan ?? '-' }}</td>
            </tr>

            <tr>
                <th>Jumlah Disalurkan</th>
                <td>{{ $pengambilan->jumlah_disalurkan }}</td>
            </tr>

            <tr>
                <th>Tanggal Penyaluran</th>
                <td>{{ $pengambilan->tanggal_penyaluran }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $pengambilan->status }}</td>
            </tr>

        </table>

        <a href="{{ route('pengambilan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">
        <h4>Detail Pengajuan</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>ID</th>
                <td>{{ $pengajuan->id }}</td>
            </tr>

            <tr>
                <th>Masyarakat</th>
                <td>{{ $pengajuan->masyarakat->nama ?? '-' }}</td>
            </tr>

            <tr>
                <th>Bantuan</th>
                <td>{{ $pengajuan->bantuan->nama_bantuan ?? '-' }}</td>
            </tr>

            <tr>
                <th>Tanggal Pengajuan</th>
                <td>{{ $pengajuan->tanggal_pengajuan }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $pengajuan->status }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $pengajuan->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate</th>
                <td>{{ $pengajuan->updated_at }}</td>
            </tr>

        </table>

        <a href="{{ route('admin.pengajuan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Data Pengambilan Bantuan</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bantuan ID</th>
                <th>Masyarakat ID</th>
                <th>Jumlah Diterima</th>
                <th>Tanggal Pengambilan</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengambilans as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->bantuan_id }}</td>
                    <td>{{ $item->masyarakat_id }}</td>
                    <td>Rp {{ number_format($item->jumlah_diterima,0,',','.') }}</td>
                    <td>{{ $item->tanggal_pengambilan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Data tidak tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.petugas')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Detail Event Bantuan</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">ID</th>
                <td>{{ $event->id }}</td>
            </tr>

            <tr>
                <th>Nama Event</th>
                <td>{{ $event->nama_event }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $event->created_at }}</td>
            </tr>

        </table>

        <a href="{{ route('petugas.event.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection
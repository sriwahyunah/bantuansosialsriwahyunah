@extends('layouts.petugas')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Event Bantuan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('petugas.event.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label>Nama Event</label>

                <input type="text"
                    name="nama_event"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('petugas.event.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection
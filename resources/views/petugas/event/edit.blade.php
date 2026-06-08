@extends('layouts.petugas')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Event Bantuan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('petugas.event.update',$event->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama Event</label>

                <input type="text"
                    name="nama_event"
                    value="{{ $event->nama_event }}"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('petugas.event.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection
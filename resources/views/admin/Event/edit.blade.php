@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Edit Event Bantuan
            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.event.update',$event->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nama Event
                    </label>

                    <input
                        type="text"
                        name="nama_event"
                        class="form-control"
                        value="{{ $event->nama_event }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tanggal Event
                    </label>

                    <input
                        type="date"
                        name="tanggal_event"
                        class="form-control"
                        value="{{ $event->tanggal_event }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        name="lokasi"
                        class="form-control"
                        value="{{ $event->lokasi }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="form-control"
                        required>{{ $event->deskripsi }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Foto Event
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control">

                </div>

                @if($event->foto)

                <div class="mb-3">

                    <img
                        src="{{ asset('storage/'.$event->foto) }}"
                        width="250"
                        class="img-thumbnail">

                </div>

                @endif

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option
                            value="Aktif"
                            {{ $event->status == 'Aktif' ? 'selected' : '' }}>

                            Aktif

                        </option>

                        <option
                            value="Tidak Aktif"
                            {{ $event->status == 'Tidak Aktif' ? 'selected' : '' }}>

                            Tidak Aktif

                        </option>

                    </select>

                </div>

                <button
                    class="btn btn-warning">

                    Update Event

                </button>

                <a
                    href="{{ route('admin.event.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection
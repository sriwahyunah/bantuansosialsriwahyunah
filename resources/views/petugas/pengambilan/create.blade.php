@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">
                Tambah Data Pengambilan
            </h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('pengambilan.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Masyarakat
                    </label>

                    <select name="masyarakat_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Masyarakat --
                        </option>

                        @foreach($masyarakats as $m)

                            <option value="{{ $m->id }}"
                                {{ old('masyarakat_id') == $m->id ? 'selected' : '' }}>

                                {{ $m->nama }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Bantuan
                    </label>

                    <select name="bantuan_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Bantuan --
                        </option>

                        @foreach($bantuans as $b)

                            <option value="{{ $b->id }}"
                                {{ old('bantuan_id') == $b->id ? 'selected' : '' }}>

                                {{ $b->nama_bantuan }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Jumlah Diterima
                    </label>

                    <input type="number"
                           name="jumlah_diterima"
                           class="form-control"
                           value="{{ old('jumlah_diterima') }}"
                           min="1"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Tanggal Pengambilan
                    </label>

                    <input type="date"
                           name="tanggal_pengambilan"
                           class="form-control"
                           value="{{ old('tanggal_pengambilan') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="Belum Diambil"
                            {{ old('status') == 'Belum Diambil' ? 'selected' : '' }}>
                            Belum Diambil
                        </option>

                        <option value="Sudah Diambil"
                            {{ old('status') == 'Sudah Diambil' ? 'selected' : '' }}>
                            Sudah Diambil
                        </option>

                    </select>
                </div>

                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-success">

                        Simpan

                    </button>

                    <a href="{{ route('pengambilan.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
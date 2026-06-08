@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h3>Edit Pengajuan</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('pengajuan.update', $pengajuan->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Tanggal Pengajuan</label>

                    <input type="date"
                           name="tanggal_pengajuan"
                           value="{{ $pengajuan->tanggal_pengajuan }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="pending"
                            {{ $pengajuan->status == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="disetujui"
                            {{ $pengajuan->status == 'disetujui' ? 'selected' : '' }}>
                            Disetujui
                        </option>

                        <option value="ditolak"
                            {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>
                            Ditolak
                        </option>

                    </select>
                </div>

                <button type="submit"
                        class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('admin.pengajuan.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
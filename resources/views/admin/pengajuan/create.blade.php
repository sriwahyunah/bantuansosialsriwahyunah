@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Pengajuan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('pengajuan.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Masyarakat</label>

                <select name="masyarakat_id" class="form-control">

                    @foreach($masyarakats as $m)

                    <option value="{{ $m->id }}">
                        {{ $m->nama }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Bantuan</label>

                <select name="bantuan_id" class="form-control">

                    @foreach($bantuans as $b)

                    <option value="{{ $b->id }}">
                        {{ $b->nama_bantuan }}
                    </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal Pengajuan</label>

                <input type="date"
                       name="tanggal_pengajuan"
                       class="form-control">
            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="pending">Pending</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>

                </select>

            </div>

            <button class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection
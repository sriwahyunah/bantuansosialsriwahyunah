@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <h3 class="mb-3">Verifikasi Pengajuan Bantuan</h3>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">
            Form Verifikasi
        </div>

        <div class="card-body">

            {{-- FORM VERIFIKASI --}}
            <form method="POST" action="{{ route('admin.verifikasi.index') }}">
                @csrf

                {{-- PENGAJUAN --}}
                <div class="form-group mb-3">
                    <label><b>Data Pengajuan</b></label>
                    <select name="pengajuan_id" class="form-control" required>
                        <option value="">-- Pilih Pengajuan --</option>
                        @foreach($pengajuans as $p)
                            <option value="{{ $p->id }}">
                                ID: {{ $p->id }} - {{ $p->nama ?? 'Tanpa Nama' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STATUS --}}
                <div class="form-group mb-3">
                    <label><b>Status Verifikasi</b></label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                {{-- CATATAN --}}
                <div class="form-group mb-3">
                    <label><b>Catatan</b></label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan verifikasi..."></textarea>
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-success">
                    Simpan Verifikasi
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Bantuan Sosial</h5>
        </div>

        <div class="card-body">

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('admin.bantuan.store') }}" method="POST">
                @csrf

                {{-- NAMA BANTUAN --}}
                <div class="mb-3">
                    <label>Nama Bantuan</label>
                    <input type="text"
                           name="nama_bantuan"
                           class="form-control"
                           placeholder="Contoh: Bantuan Sembako"
                           required>
                </div>

                {{-- TOTAL DANA --}}
                <div class="mb-3">
                    <label>Total Dana</label>
                    <input type="number"
                           name="total_dana"
                           class="form-control"
                           placeholder="Contoh: 1000000"
                           required>
                </div>

                {{-- KUOTA --}}
                <div class="mb-3">
                    <label>Kuota Penerima</label>
                    <input type="number"
                           name="kuota"
                           class="form-control"
                           placeholder="Contoh: 100"
                           required>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              rows="3"
                              placeholder="Deskripsi bantuan..."></textarea>
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary">
                    Simpan Data
                </button>

                <a href="{{ route('admin.bantuan.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
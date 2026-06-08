@extends('layouts.masyarakat')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">
                Pengajuan Bantuan
            </h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>
            @endif

            <form
                action="{{ route('masyarakat.pengajuan.store') }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Jenis Bantuan
                    </label>

                    <select
                        name="bantuan_id"
                        class="form-control"
                        required>

                        <option value="">
                            -- Pilih Bantuan --
                        </option>

                        @foreach($bantuans as $bantuan)

                            <option value="{{ $bantuan->id }}">
                                {{ $bantuan->nama_bantuan }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <a
                    href="{{ route('masyarakat.pengajuan.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-success">

                    Kirim Pengajuan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
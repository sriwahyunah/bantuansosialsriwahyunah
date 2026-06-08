@extends('layouts.petugas')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">
        <h4>Edit Pengambilan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('pengambilan.update', $pengambilan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Masyarakat</label>

                <select name="masyarakat_id" class="form-control">

                    @foreach($masyarakats as $m)

                        <option value="{{ $m->id }}"
                            {{ $m->id == $pengambilan->masyarakat_id ? 'selected' : '' }}>

                            {{ $m->nama }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Bantuan</label>

                <select name="bantuan_id" class="form-control">

                    @foreach($bantuans as $b)

                        <option value="{{ $b->id }}"
                            {{ $b->id == $pengambilan->bantuan_id ? 'selected' : '' }}>

                            {{ $b->nama_bantuan }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah Disalurkan</label>

                <input type="number"
                       name="jumlah_disalurkan"
                       value="{{ $pengambilan->jumlah_disalurkan }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Penyaluran</label>

                <input type="date"
                       name="tanggal_penyaluran"
                       value="{{ $pengambilan->tanggal_penyaluran }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Belum Diambil"
                        {{ $pengambilan->status == 'Belum Diambil' ? 'selected' : '' }}>
                        Belum Diambil
                    </option>

                    <option value="Sudah Diambil"
                        {{ $pengambilan->status == 'Sudah Diambil' ? 'selected' : '' }}>
                        Sudah Diambil
                    </option>

                </select>
            </div>

            <button type="submit"
                    class="btn btn-success">

                Simpan Perubahan

            </button>

            <a href="{{ route('pengambilan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection
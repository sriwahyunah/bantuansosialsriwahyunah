@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header">
        Edit Bantuan
    </div>

    <div class="card-body">

        <form action="{{ route('admin.bantuan.update',$bantuan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama Bantuan</label>

                <input type="text"
                       name="nama_bantuan"
                       value="{{ $bantuan->nama_bantuan }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Total Dana</label>

                <input type="number"
                       name="total_dana"
                       value="{{ $bantuan->total_dana }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Kuota</label>

                <input type="number"
                       name="kuota"
                       value="{{ $bantuan->kuota }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="Aktif"
                        {{ $bantuan->status=='Aktif' ? 'selected':'' }}>
                        Aktif
                    </option>

                    <option value="Tidak Aktif"
                        {{ $bantuan->status=='Tidak Aktif' ? 'selected':'' }}>
                        Tidak Aktif
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    class="form-control">{{ $bantuan->deskripsi }}</textarea>

            </div>

            <button class="btn btn-success">
                Update
            </button>

        </form>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">
        <h4 class="mb-0">Tambah User</h4>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>
            </div>
        @endif

        <form action="/admin/users/store" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama</label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Username</label>

                <input type="text"
                       name="username"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Password</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Role</label>

                <select name="role"
                        class="form-control">

                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="masyarakat">Masyarakat</option>

                </select>

            </div>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

            <a href="/admin/users"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection
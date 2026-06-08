@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">
        <h4 class="mb-0">Edit User</h4>
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

        <form action="/admin/users/{{ $user->id }}/update"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama</label>

                <input type="text"
                       name="nama"
                       value="{{ $user->nama }}"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Username</label>

                <input type="text"
                       name="username"
                       value="{{ $user->username }}"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Password Baru</label>

                <input type="password"
                       name="password"
                       class="form-control">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password
                </small>

            </div>

            <div class="mb-3">

                <label>Role</label>

                <select name="role"
                        class="form-control">

                    <option value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="petugas"
                        {{ $user->role == 'petugas' ? 'selected' : '' }}>
                        Petugas
                    </option>

                    <option value="masyarakat"
                        {{ $user->role == 'masyarakat' ? 'selected' : '' }}>
                        Masyarakat
                    </option>

                </select>

            </div>

            <button type="submit"
                    class="btn btn-warning">

                Update

            </button>

            <a href="/admin/users"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection
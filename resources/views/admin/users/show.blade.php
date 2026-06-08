@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header bg-info text-white">
        <h4 class="mb-0">Detail User</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">ID</th>
                <td>{{ $user->id }}</td>
            </tr>

            <tr>
                <th>Nama</th>
                <td>{{ $user->nama }}</td>
            </tr>

            <tr>
                <th>Username</th>
                <td>{{ $user->username }}</td>
            </tr>

            <tr>
                <th>Role</th>
                <td>

                    <span class="badge bg-primary">
                        {{ ucfirst($user->role) }}
                    </span>

                </td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $user->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate</th>
                <td>{{ $user->updated_at }}</td>
            </tr>

        </table>

        <a href="/admin/users"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="card shadow">

    <div class="card-header bg-dark text-white d-flex justify-content-between">

        <h4 class="mb-0">
            Manajemen User
        </h4>

        <a href="/admin/users/create"
           class="btn btn-success btn-sm">

            Tambah User

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $user->nama }}</td>

                    <td>{{ $user->username }}</td>

                    <td>

                        <span class="badge bg-primary">
                            {{ ucfirst($user->role) }}
                        </span>

                    </td>

                    <td>

                        <a href="/admin/users/{{ $user->id }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="/admin/users/{{ $user->id }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/admin/users/{{ $user->id }}/delete"
                              method="POST"
                              style="display:inline-block">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus user ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Tidak ada data user
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
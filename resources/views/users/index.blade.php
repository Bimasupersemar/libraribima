@extends('layouts.app')
@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Daftar User</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah User</a>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->peran }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Hapus user ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

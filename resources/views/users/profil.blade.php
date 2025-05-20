@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-user me-2"></i>Profil Pengguna</h4>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th width="30%">Username</th>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $user->NamaLengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $user->Alamat ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Peran</th>
                                        <td>
                                            <span class="badge bg-{{ $user->peran == 'admin' ? 'danger' : 'success' }}">
                                                {{ ucfirst($user->peran) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bergabung Sejak</th>
                                        <td>{{ $user->created_at->format('d F Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('users.edit', $user->id) }}" 
                                   class="btn btn-primary">
                                    <i class="fas fa-edit me-1"></i> Edit Profil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
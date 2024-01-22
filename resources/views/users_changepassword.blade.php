@extends('adminlte')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Users Page</h2>
    </div>

    <section class="content">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Password Users</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('users.change', $users->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Username</label>
                <input name="username" type="text" class="form-control" value="{{ $users->username }}" readonly>
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Role</label>
                <input name="role" type="text" class="form-control" value="{{ $users->role }}" readonly>
                @error('role')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input name="new_password" type="password" class="form-control">
                @error('new_password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Ulangi password</label>
                <input name="password_confirm" type="password" class="form-control">
                @error('password_confirm')
                    <p>{{ $message }}</p>
                @enderror
              </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan password baru">
            </form>
        </div>
    </div>
</section> 
@endsection
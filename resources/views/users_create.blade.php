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
            <h5 class="card-title">Add Data Users</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input name="name" type="text" class="form-control" placeholder="Ex. Eben">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Ex. EbenZ">
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control">
                    @error('password')
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
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="owner">Owner</option>
                    </select>
                    @error('role')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Tambah">
            </form>
        </div>
    </div>

</section> 
@endsection

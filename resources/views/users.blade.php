@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
  
    <!-- Default box -->
    <div class="card elevation-2">
        <div class="card-header">
        <h3 class="card-title">Users List</h3>
        </div>
        <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <a href="{{ route('users.create') }}" class="btn btn-success shadow">Tambah Data User <i class="nav-icon fas fa-plus text-home"></i></a>
            <a href="{{ url('users/pdf') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF</a>
            <br><br>
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>username</th>
                        <th>roles</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($usersM) > 0)
                @foreach ($usersM as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning shadow"><i class="nav-icon fas fa-pen text-home"></i>  Edit</a>
                            @csrf
                            @method('delete')
                            <a href="{{ route('users.changepassword', $user->id) }}" class="btn btn-sm btn-success shadow"><i class="nav-icon fas fa-lock text-home"></i>  Change Password</a>
                            <button type="submit" class="btn btn-sm btn-danger shadow" onclick="return confirm('Konfirmasi Hapus Data !?');"><i class="nav-icon fas fa-trash text-home"></i>  Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">Data Tidak Ditemukan</td>
                </tr>
                @endif
                </tbody>
            </table>
            <br>
            {!! $usersM->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    <!-- /.card -->
  
</section>
<!-- /.content -->
@endsection
@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Log page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Log</li>
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
        <h3 class="card-title">Log List</h3>
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('log.index') }}" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" value="{{ $vcari }}">
                    <button type="submit" class="btn btn-primary shadow">Cari</button>
                    <a href="{{ route('log.index') }}">
                        <button type="button" class="btn btn-danger shadow">Reset</button>
                    </a>
                </div>
            </form>
            <br> --}}

            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Aktivitas</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($LogM) > 0)
                @foreach ($LogM as $Log)
                <tr>
                    <td>{{ $Log->name }}</td>
                    <td>{{ $Log->activity }}</td>
                    <td>{{ $Log->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">Data Tidak Ditemukan</td>
                </tr>
                @endif
                </tbody>
            </table>
            <br>
            {!! $LogM->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    <!-- /.card -->
  
</section>
<!-- /.content -->
@endsection
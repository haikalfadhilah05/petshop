@extends('adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transactions page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Transactions</li>
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
            <h3 class="card-title">Transactions List</h3>
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('transaksi.index') }}" method="get">
                <div class="input-group">
                    <input type="text" type="search" name="search" class="form-control" placeholder="Masukan Nama Products" value="{{ $vcari }}">
                    <mr-1>
                    <button type="submit" class="btn btn-primary shadow">Cari</button>
                    <a href="{{ route('transaksi.index') }}">
                        <button type="button" class="btn btn-danger shadow">Reset</button>
                    </a>
                </div>
            </form>
            <br> --}}

            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            @if (Auth::user()->role == 'kasir')
            <a href="{{ route('transaksi.create') }}" class="btn btn-success shadow">Tambah Transactions <i class="nav-icon fas fa-plus text-home"></i></a>
            @endif
            @if (Auth::user()->role !== 'admin')
            <a href="{{ url('transaksi/pdf') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF</a>
            <br><br>
            @endif
            @if (Auth::user()->role == 'owner')
            <a href="{{ url('transaksi/all') }}" class="btn btn-warning shadow"><i class="nav-icon fas fa-file-pdf text-home"></i> Unduh PDF Pertanggal</a>
            <br><br>
            @endif
            <table id="myTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nomor Unik</tah>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Uang Bayar</th>
                        <th>Uang Kembali</th>
                        <th>Tanggal</th> 
                        @if (Auth::user()->role !== 'owner')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @if (count($transaksiM) > 0)
                @foreach ($transaksiM as $transaksi)
                <tr>
                    <td>{{ $transaksi->nomor_unik }}</td>
                    <td>{{ $transaksi->nama_pelanggan }}</td>
                    <td>{{ $transaksi->nama_produk }}</td>
                    <td>{{ $transaksi->harga_produk }}</td>
                    <td>{{ $transaksi->uang_bayar }}</td>
                    <td>{{ $transaksi->uang_kembali }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                    @if (Auth::user()->role !== 'owner')
                    <td>
                        @if (Auth::user()->role == 'kasir')
                        <a href="{{ url('transaksi/pdf2', $transaksi->id_trans) }}" class="btn btn-sm btn-primary shadow"><i class="nav-icon fas fa-file-pdf text-home"></i>  Cetak Struk</a>
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <form action="{{ route('transaksi.delete', $transaksi->id_trans) }}" method="POST">
                            <a href="{{ route('transaksi.edit', $transaksi->id_trans) }}" class="btn btn-sm btn-warning shadow"><i class="nav-icon fas fa-pen text-home"></i>  Edit</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger shadow" onclick="return confirm('Konfirmasi Hapus Data !?');"><i class="nav-icon fas fa-trash text-home"></i>  Hapus</button>
                        </form>
                        @endif
                    </td>
                    @endif
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
        </div>
    </div>
    <!-- /.card -->
  
</section>
<!-- /.content -->
@endsection
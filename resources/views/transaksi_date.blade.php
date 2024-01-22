@extends('adminlte')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Transactions Page</h2>
    </div>

    <section class="content">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Data Transactions</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('transaksi.pertanggal', ['tgl_awal' => '2023-01-01', 'tgl_akhir' => '2023-12-31']) }}" method="GET">
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input name="tgl_awal" type="date" class="form-control" style="border: 1px solid rgb(88, 88, 88);">
                    @error('tgl_awal')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input name="tgl_akhir" type="date" class="form-control" style="border: 1px solid rgb(88, 88, 88);">
                    @error('tgl_akhir')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <h6>*Tanggal Akhir tidak masuk data</h6>
                <button type="submit" class="btn btn-success">Tampilkan Data</button>
              </form>
        </div>
    </div>

</section> 
@endsection
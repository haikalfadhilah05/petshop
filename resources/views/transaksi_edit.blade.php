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

            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
                @method('put')
                <div class="form-group">
                    <label>Nomor Unik</label>
                    <input name="nomor_unik" type="text" class="form-control" placeholder="Ex. Ultra Milk" value="{{ $transaksi->nomor_unik }}" readonly>
                    @error('nomor_unik')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input name="nama_pelanggan" type="text" class="form-control" placeholder="Ex. 5000" value="{{ $transaksi->nama_pelanggan }}">
                    @error('nama_pelanggan')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Produk + Harga</label>
                    <select name="id_produk" class="form-control" required>
                        <option>Pilih Produk</option>
                        @foreach ($productsM as $products)
                        <?php
                        if ($products->id == $transaksi->id_produk):
                            $selected = "selected";
                        else:
                            $selected = "";
                        endif;
                        ?>
                        <option {{ $selected }} value="{{ $products->id }}">
                            {{ $products->nama_produk }} - {{ $products->harga_produk }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_produk')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Uang Bayar</label>
                    <input name="uang_bayar" type="text" class="form-control" placeholder="Ex. 5000" value="{{ $transaksi->uang_bayar }}">
                    @error('uang_bayar')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Tanggal</label>
                    <input name="created_at" type="date" class="form-control">
                    @error('created_at')
                        <p>{{ $message }}</p>
                    @enderror
                </div> --}}
                <input type="submit" name="submit" class="btn btn-success" value="edit">
            </form>
        </div>
    </div>

</section> 
@endsection
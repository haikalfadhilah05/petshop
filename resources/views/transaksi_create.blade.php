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

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div>
                    <label>Nomor Unik</label>
                    <input name="nomor_unik" type="number" class="form-control" value="{{ random_int(1000000000,9999999999); }}"readonly>
                    @error('nomor_unik')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Nama Pelanggan</label>
                    <input name="nama_pelanggan" type="text" class="form-control" placeholder="Ex. Eben">
                    @error('nama_pelanggan')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Nama produk + Harga Produk</label>
                    <select name="id_produk" class="form-control"required>
                        <option>-Pilih Produk-</option>
                        @foreach ($productsM as $products)
                        <option value="{{ $products->id}}">{{ $products->nama_produk}} - {{ $products->harga_produk}}</option>
                        @endforeach
                    </select>
                    @error('id_produk')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Uang Bayar</label>
                    <input name="uang_bayar" type="text" class="form-control" placeholder="Ex. 5000">
                    @error('uang_bayar')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div>
                    <label>Uang Kembali</label>
                    <input name="uang_kembali" type="text" class="form-control" placeholder="...">
                    @error('uang_kembali')
                    <p>{{ $message }}</p>
                    @enderror
                </div> --}}
                <br>
                <input type="submit" name="submit" class="btn btn-success" value="Tambah" />
            </form>
        </div>
    </div>

</section> 
@endsection

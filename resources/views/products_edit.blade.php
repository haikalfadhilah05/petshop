@extends('adminlte')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Products Page</h2>
    </div>

    <section class="content">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Data Products</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('products.update', $products->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Produk</label>
                <input name="nama_produk" type="text" class="form-control" value="{{ $products->nama_produk }}">
                @error('nama_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Harga Products</label>
                <input name="harga_produk" type="number" class="form-control" value="{{ $products->harga_produk }}">
                @error('harga_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Edit">
            </form>
        </div>
    </div>

</section> 
@endsection

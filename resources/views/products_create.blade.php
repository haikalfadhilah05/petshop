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
            <h5 class="card-title">Add Data Products</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            <br><br>

            <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Products</label>
                <input name="nama_produk" type="text" class="form-control" placeholder="Ex. Neko can">
                @error('nama_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Harga Products</label>
                <input name="harga_produk" type="number" class="form-control" placeholder="Ex. 30000">
                @error('harga_produk')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Tambah">
            </form>
        </div>
    </div>

</section> 
@endsection

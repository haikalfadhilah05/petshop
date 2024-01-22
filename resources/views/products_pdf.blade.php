<h1>Products List</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Nama Products</th>
    <th>Harga Products</th>
    <th>Tanggal Masuk</th>
</tr>
@foreach ($productsM as $products)
<tr>
    <td>{{ $products->nama_produk }}</td>
    <td>{{ $products->harga_produk }}</td>
    <td>{{ $products->created_at }}</td>
</tr>
@endforeach
</table>
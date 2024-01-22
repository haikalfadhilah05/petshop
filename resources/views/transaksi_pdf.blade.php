<h1>Transactions List</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>Nomor Unik</th>
    <th>Nama Pelanggan</th>
    <th>Nama Produk</th>
    <th>Harga Produk</th>
    <th>Uang Bayar</th>
    <th>Uang Kembali</th>
    <th>Tanggal</th> 
</tr>
@foreach ($transaksiM as $transaksi)
<tr>
    <td>{{ $transaksi->nomor_unik}}</td>
    <td>{{ $transaksi->nama_pelanggan}}</td>
    <td>{{ $transaksi->nama_produk}}</td>
    <td>{{ $transaksi->harga_produk}}</td>
    <td>{{ $transaksi->uang_bayar}}</td>
    <td>{{ $transaksi->uang_kembali}}</td>
    <td>{{ $transaksi->created_at}}</td>
</tr>
@endforeach
</table>
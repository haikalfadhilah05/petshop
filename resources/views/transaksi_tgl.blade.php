<h1>Transactions List Date</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>No Unik</th>
            <th>Nama Pelaggan</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Uang Bayar</th>
            <th>Uang Kembali</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($p as $product)
        <tr>
            <td>{{ $product->nomor_unik }}</td>
            <td>{{ $product->nama_pelanggan }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>{{ $product->harga_produk }}</td>
            <td>{{ $product->uang_bayar }}</td>
            <td>{{ $product->uang_kembali }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<h4 style="margin-bottom: 5px;"><u>Galih AKbar Maulana., S.I.Kom</u></h4>
<p style="margin-top: 5px;">CEO PT.Petshop</p>
<br>
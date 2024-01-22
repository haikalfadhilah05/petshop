<!DOCTYPE html>
<html>
<head>
    <title>Invoice Transaksi #{{ $transaksi->id_trans }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 10px;
        }
        .header {
            text-align: center;
        }
        .content {
            margin-top: 20px;
            font-size: 14px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
        }
        .barcode {
            text-align: center;
            margin-top: 20px;
        }
        .divider {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3 style="font-size: 24px;">Petshop Lontar</h3>
            <h2 style="font-size: 18px;">Jl.Arief Rahman Hakim No.16, Subang</h2>

            <div class="divider"></div>
            <p style="font-size: 18px;">Invoice Transaksi</p>
            <p style="font-size: 15px;">Tanggal: {{ date('d/m/Y H:i:s') }}</p>
        </div>
        <div class="content">
            <p style="font-size: 15px;">Nomor Unik: {{ $transaksi->nomor_unik }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Nama Pelanggan: {{ $transaksi->nama_pelanggan }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Nama Produk: {{ $transaksi->nama_produk }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Harga Produk: Rp {{ number_format($transaksi->harga_produk, 0, ',', '.') }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Uang Bayar: Rp {{ number_format($transaksi->uang_bayar, 0, ',', '.') }}</p>
            <div class=""></div>
            <p style="font-size: 15px;">Uang Kembali: Rp {{ number_format($transaksi->uang_kembali, 0, ',', '.') }}</p>
            <div class=""></div>
        </div>
        <div class="footer">
            <div class="divider"></div>
            <p style="font-size: 15px;">Terima Kasih Anda Telah Belanja Di Petshop Lontar</p>
            <p style="font-size: 15px;">Barang Yang Sudah Dibeli Tidak bisa dikembalikan!</p>
        </div>
    </div>
</body>
</html>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiM;
use App\Models\productsM;
use App\Models\LogM;
use PDF;

class TransaksiC extends Controller
{
    public function index(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Transaksi'
        ]);

        $query = TransaksiM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')->join('products', 'products.id', '=', 'transactions.id_produk')->orderBy('transactions.id', 'desc');

        if ($request->filled('start_date')) {
            $query->where('transactions.created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->where('transactions.created_at', '<=', $request->end_date);
        }

        $transaksiM = $query->paginate(8);


        $subtittle = "Daftar Transaksi";
        return view('transaksi', compact('subtittle' ,'transaksiM'));
    }

    public function create()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Di halaman Tambah Transaksi'
        ]);

        $subtittle = "Tambah Data Transaksi";
        $productsM = productsM::all();
        return view('transaksi_create', compact('productsM', 'subtittle'));
    }

    public function store(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Proses Tambah Transaksi' . $request->nama_pelanggan
        ]);

        $productsM = productsM::where("id", $request->input('id_produk'))->first();

        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transaksi = new TransaksiM;
        $transaksi->nomor_unik = $request->input('nomor_unik');
        $transaksi->nama_pelanggan = $request->input('nama_pelanggan');
        $transaksi->id_produk = $request->input('id_produk');
        $transaksi->uang_bayar = $request->input('uang_bayar');
        $transaksi->uang_kembali = $request->input('uang_bayar') - $productsM->harga_produk;
        $transaksi->save();

        // TransactionM::create($request->post());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil di tambahkan');
    }

    public function edit($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Di halaman Edit Data Transaksi'
        ]);

        $subtittle = "Edit Data Transactions";
        $transaksi = TransaksiM::find($id);
        $productsM = productsM::all();

        return view('transaksi_edit', compact('subtittle', 'productsM', 'transaksi'));
    }

    public function delete($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Penghapusan Data Transaksi' . $request->nama_pelanggan
        ]);

        TransaksiM::where('id', $id)->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Proses Update Data Transaksi' . $request->nama_pelanggan
        ]);

        $productsM = productsM::where("id", $request->input('id_produk'))->first();

        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transaksi = TransaksiM::find($id);
        $transaksi->nomor_unik = $request->input('nomor_unik');
        $transaksi->nama_pelanggan = $request->input('nama_pelanggan');
        $transaksi->id_produk = $request->input('id_produk');
        $transaksi->uang_bayar = $request->input('uang_bayar');
        $transaksi->uang_kembali = $request->input('uang_bayar') - $productsM->harga_produk;
        $transaksi->save();
        // transaksiM::create($request->post());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil di perbaharui');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mengunduh PDF Transaksi'
        ]);

        $transaksiM = TransaksiM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')->join('products', 'products.id',  '=', 'transactions.id_produk')->get();
        $pdf = PDF::loadview('transaksi_pdf', ['transaksiM' => $transaksiM]);
        return $pdf->stream('transaksi.pdf');
    }
    
    
    public function pdf2($id)
    {
        $LogM = LogM::create([
            'id_user'=> Auth::user()->id,
            'activity'=> 'User Mencetak PDF Struk'
        ]);
        // Ambil data transaksi dan produk berdasarkan ID
        $transaksi = TransaksiM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')->join('products', 'products.id', '=', 'transactions.id_produk')->where('transactions.id', $id)->first();
    
        if ($transaksi) {
            // Jika data ditemukan, buat PDF
            $pdf = PDF::loadView('transaksi_struk', ['transaksi' => $transaksi]);
            return $pdf->stream('transaksi.struk' . $id . '.pdf');
        } else {
            // Jika data tidak ditemukan, Anda dapat mengembalikan respons yang sesuai, misalnya, halaman 404.
            return response('Data transaksi tidak ditemukan', 404);
        }
    }
}

    // public function all()
    // {
    //     $subtittle = "Transaksi PDF Berdasarkan Tanggal";
    //     return view('transaksi_date', compact('subtittle'));
    // }
    // public function pertanggal(Request $request)
    // {
    //     // Gunakan tanggal yang diterima sesuai kebutuhan
    //     $tgl_awal = $request->input('tgl_awal');
    //     $tgl_akhir = $request->input('tgl_akhir');
    //     // dd(["tanggal awal: ".$tgl_awal, "tanggal akhir: ".$tgl_akhir]);
    //     $p = TransaksiM::select('transactions.*', 'products.*', 'transactions.id AS id_tran', 'transactions.created_at AS Tanggal')
    //     ->join('products', 'products.id', '=', 'transactions.id_produk')
    //     ->whereBetween('transactions.created_at',[$tgl_awal, $tgl_akhir])
    //     ->get();
    //     $pdf = PDF::loadview('transaksi_tgl', ['p' => $p]);
    //     return $pdf->stream('stgl.pdf');
    // }
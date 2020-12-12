<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $query = Transaksi::see();
        return view('transaksi')->with('data', $query);
    }

    public function create()
    {
        return view('tadd');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'tipe' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'desc' => 'required'
        ]);

        $query = new Transaksi();
        $query->tipe = $request->get('tipe');
        $query->jenis = $request->get('jenis');
        $query->jumlah = $request->get('jumlah');
        $query->desc = $request->get('desc');
        $query->tanggal = date('Y-m-d');
        $query->save();

        \Session::flash('message','Data telah berhasil ditambahkan.');
        return redirect()->to('/transaksi');
    }

    public function show(Request $request)
    {
        $query = Kategori::ajax($request->type);
        return response()->json($query);
    }

    public function edit($id)
    {
        $query = Transaksi::edt($id);
        return view('tedit')->with('data', $query);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'tipe' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'desc' => 'required'
        ]);

        $query = Transaksi::edt($id);
        $query->tipe = $request->get('tipe');
        $query->jenis = $request->get('jenis');
        $query->jumlah = $request->get('jumlah');
        $query->desc = $request->get('desc');
        $query->tanggal = date('Y-m-d');
        $query->update();

        \Session::flash('message','Data telah berhasil diedit.');
        return redirect()->to('/transaksi');
    }

    public function destroy($id)
    {
    	$query = Transaksi::edt($id);
        $query->delete();
        
        \Session::flash('message','Data telah berhasil dihapus.');
        return redirect()->to('/transaksi');
    }

    public function search(Request $request)
    {
        $from = date($request->from);
        $to = date($request->to);

        $query = Transaksi::fnd($from, $to);
        return view('transaksi')->with('data', $query);
    }
}

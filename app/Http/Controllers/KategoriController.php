<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $query = Kategori::see();
        return view('kategori')->with('data', $query);
    }

    public function create()
    {
    	return view('kadd');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'tipe' => 'required',
            'jenis' => 'required'
        ]);

        $query = new Kategori();
        $query->tipe = $request->get('tipe');
        $query->jenis = $request->get('jenis');
        $query->save();

        \Session::flash('message','Data telah berhasil ditambahkan.');
        return redirect()->to('/kategori');
    }

    public function show()
    {
    	# code...
    }

    public function edit($id)
    {
    	$query = Kategori::edt($id);
        return view('kedit')->with('data', $query);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'tipe' => 'required',
            'jenis' => 'required'
        ]);

        $query = Kategori::edt($id);
        $query->tipe = $request->get('tipe');
        $query->jenis = $request->get('jenis');
        $query->update();
        
        \Session::flash('message','Data telah berhasil diedit.');
        return redirect()->to('/kategori');
    }

    public function destroy($id)
    {
    	$query = Kategori::edt($id);
        $query->delete();
        
        \Session::flash('message','Data telah berhasil dihapus.');
        return redirect()->to('/kategori');
    }
}

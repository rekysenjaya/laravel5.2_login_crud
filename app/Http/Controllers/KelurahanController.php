<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use Illuminate\Support\Facades\Auth;

class KelurahanController extends Controller {

    public function index(Request $request) {
        $role = Auth::user()->role;
        $datas = Kelurahan::orderBy('id', 'DESC')->paginate(5);
        return view('kelurahan.index', compact('datas'), compact('role'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create() {
        return view('kelurahan.create');
    }

    public function store(Request $request) {
        $messsages = array(
            'nama_kel.required' => 'input kelurahan belum di isi',
            'nama_kec.required' => 'input kecamatan belum di isi',
            'nama_kota.required' => 'input kota belum di isi'
        );
        
        $this->validate($request, [
            'nama_kel' => 'required',
            'nama_kec' => 'required',
            'nama_kota' => 'required',
        ],$messsages);
        
        Kelurahan::create($request->all());
        return redirect('kelurahan')
                        ->with('success', 'Tambah Data Berhasil');
    }

    public function show($id) {
        $data = Kelurahan::find($id);
        return view('kelurahan.show', compact('data'));
    }

    public function edit($id) {
        $data = Kelurahan::find($id);
        return view('kelurahan.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $messsages = array(
            'nama_kel.required' => 'input kelurahan belum di isi',
            'nama_kec.required' => 'input kecamatan belum di isi',
            'nama_kota.required' => 'input kota belum di isi'
        );
        
        $this->validate($request, [
            'nama_kel' => 'required',
            'nama_kec' => 'required',
            'nama_kota' => 'required',
        ],$messsages);
        
        Kelurahan::find($id)->update($request->all());
        return redirect('kelurahan')
                        ->with('success', 'Update Data Berhasil');
    }

    public function destroy($id) {
        Kelurahan::find($id)->delete();
        return redirect('kelurahan')
                        ->with('success', 'Hapus Data Berhasil');
    }

}

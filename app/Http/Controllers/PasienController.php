<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pasien;
use App\Kelurahan;

class PasienController extends Controller {

    public function index(Request $request) {
        $role = Auth::user()->role;
        $datas = Pasien::leftJoin('kelurahan', 'kelurahan.id', '=', 'pasien.id_kelurahan')
                        ->select('pasien.*', 'kelurahan.nama_kel', 'kelurahan.nama_kec', 'kelurahan.nama_kota')
                        ->orderBy('pasien.id', 'DESC')->paginate(5);
        return view('pasien.index', compact('datas'), compact('role'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create() {
        $kel = Kelurahan::lists('nama_kel', 'id');
        return view('pasien.create', compact('kel'));
    }

    public function store(Request $request) {
//      message validation
        $messsages = array(
            'required' => ':attribute belum di isi',
            'integer' => ':attribute yang dimasukan harus angka'
        );

//      validation
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required|min:10',
            'no_telepon' => 'required',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'id_kelurahan' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
                ], $messsages);

//      generator id
        $lastnum = Pasien::lists('id');
        $now = date('ym');
        $num = 1;
        if ($lastnum!='[]') {
            echo '1';
            $length = max(json_decode($lastnum));
            if (strlen($length) == 10) {
                $num = substr($length, 4) + 1;
            }
        }
        $generate = sprintf($now . '%06d', $num);
        
//      post insert
        $array = $request->all();

        $pasien = new Pasien;
        $pasien->id = $generate;
        $pasien->nama = $array['nama'];
        $pasien->alamat = $array['alamat'];
        $pasien->no_telepon = $array['no_telepon'];
        $pasien->rt = $array['rt'];
        $pasien->rw = $array['rw'];
        $pasien->id_kelurahan = $array['id_kelurahan'];
        $pasien->tanggal_lahir = $array['tanggal_lahir'];
        $pasien->jenis_kelamin = $array['jenis_kelamin'];
        $pasien->save();

//      message dan redirect
        return redirect('pasien')
                        ->with('success', 'Tambah Data Berhasil');
    }

    public function show($id) {
        $data = Pasien::find($id);
        return view('pasien.show', compact('data'));
    }

    public function edit($id) {
        $data = Pasien::find($id);
        $kel = Kelurahan::lists('nama_kel', 'id');
        return view('pasien.edit', compact('data'), compact('kel'));
    }

    public function update(Request $request, $id) {
        $messsages = array(
            'required' => ':attribute belum di isi',
            'integer' => ':attribute harus angka'
        );

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required|min:10',
            'no_telepon' => 'required',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'id_kelurahan' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
                ], $messsages);

        Pasien::find($id)->update($request->all());
        return redirect('pasien')
                        ->with('success', 'Update Data Berhasil');
    }

    public function destroy($id) {
        Pasien::find($id)->delete();
        return redirect('pasien')
                        ->with('success', 'Hapus Data Berhasil');
    }

}

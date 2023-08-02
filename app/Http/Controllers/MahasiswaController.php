<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kota;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('kotas')->get();
        $kotas = Kota::all();
        return view('mahasiswa.index',compact('mahasiswas','kotas'));
    }

    public function cetakData()
    {
        $cetakData = Mahasiswa::with('kotas')->get();
        return view('cetakPDF.data-mahasiswa',compact('cetakData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:6|unique:mahasiswas',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jeniskelamin' => 'required',
            'kota_id' => 'required',
        ],
        [
            'nim.required'=>"NIM Harus Diisi",
            'nim.min' => "Minimal 6 karakter",
            'nim.unique' => "NIM sudah digunakan",
            'nama.required'=>"Nama Harus Diisi",
            'tanggal_lahir.required'=>"Tanggal Lahir Harus Diisi",
            'jeniskelamin.required'=>"Jenis Kelamin Harus Diisi",
            'kota_id.required'=>"Kota Harus Diisi"
        ]);

        $mhs = new Mahasiswa;

        $mhs->nim = $request->input('nim');
        $mhs->nama = $request->input('nama');
        $mhs->tanggal_lahir = $request->input('tanggal_lahir');
        $mhs->jeniskelamin = $request->input('jeniskelamin');
        $mhs->kota_id = $request->input('kota_id');

        $mhs->save();

        return redirect('/mahasiswa')->with('success', 'Data Tersimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=> 'required',
            'tanggal_lahir'=> 'required',
            'jeniskelamin'=> 'required',
            'kota_id'=> 'required',
        ],
        [
            'nama.required'=>"Nama Harus Diisi",
            'tanggal_lahir.required'=>"Tanggal Lahir Harus Diisi",
            'jeniskelamin.required'=>"Jenis Kelamin Harus Diisi",
            'kota_id.required'=>"Kota Harus Diisi"
        ]);

        $data = Mahasiswa::find($id);
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->kota_id = $request->kota_id;
        $data->update();
        
        return redirect('/mahasiswa')->with('success', 'Data Tersimpan');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect('/mahasiswa')->with('success', 'Data Terhapus');
    }
}

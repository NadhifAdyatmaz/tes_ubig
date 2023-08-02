<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kota;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function cetakData(Request $request){
        $mahasiswas = Mahasiswa::with('kotas')->get();
        $kotas = Kota::all();

        // dd($mahasiswa);
        return view('PDFReport.data-mahasiswa',compact('mahasiswas','kotas'));

        // return $pdf->download('mahasiswa_report.pdf');
        // return $pdf->stream('data-mahasiswa.pdf');
    }
}

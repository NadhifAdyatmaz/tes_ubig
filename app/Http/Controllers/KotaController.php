<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index(){
        $kotas = Kota::all();
        return view('kota.index',compact('kotas'));
    }
}

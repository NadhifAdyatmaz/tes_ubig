<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Mahasiswa;
use App\Charts\MahasiswaChart;
use App\Charts\GenderChart;
use App\Charts\BirthChart;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(
        MahasiswaChart $mahasiswaChart, GenderChart $genderChart, BirthChart $birthChart,
        )
    {
        $mahasiswas = Mahasiswa::with('kotas')->get();
        $kotas = Kota::all();
        $mahasiswa_count = Mahasiswa::count();
        $male_count = Mahasiswa::where('jeniskelamin','Laki-laki')->count();
        $female_count = Mahasiswa::where('jeniskelamin','Perempuan')->count();
        $kota_count = Kota::count();

        $idkota = ['1','2','3','4','5','6','7','8','9','10'];
        $datamhs = [];
        foreach ($idkota as $key => $value) {
            $datamhs[] = Mahasiswa::where('kota_id',$value)->count();
        }
        $labelmhs = [
            'Bangkalan','Gresik','Lamongan','Jombang','Malang','Mojokerto','Pamekasan',
            'Pasuruan','Sampang','Sidoarjo','Sumenep','Surabaya',
        ];
        $data['mahasiswaChart'] = $mahasiswaChart->build($labelmhs,$datamhs);

        $datagender = [
            $male_count,$female_count,
        ];

        $labelgender = [
            'Laki-laki', 'Perempuan'
        ];

        $data['genderChart'] = $genderChart->build($labelgender,$datagender);

        $year = ['2000','2001','2002','2003','2004','2005'];
        $kelahiran = [];
        foreach ($year as $key => $value) {
            $kelahiran[] = Mahasiswa::where(\DB::raw("DATE_FORMAT(tanggal_lahir, '%Y')"),$value)->count();
        }

        $data['birthChart'] = $birthChart->build($year,$kelahiran);
        // 'year',json_encode($year,JSON_NUMERIC_CHECK), 'mahasiswa',json_encode($mahasiswa,JSON_NUMERIC_CHECK),
        return view('dashboard', $data, compact('mahasiswas','kotas','mahasiswa_count', 'male_count', 'female_count', 'kota_count'));
    }
}

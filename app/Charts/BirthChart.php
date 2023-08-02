<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Mahasiswa;

class BirthChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(array $lahir, array $tahun): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setWidth(500)
            ->setHeight(330)
            ->addData('Tahun Kelahiran',$tahun)
            ->setXAxis($lahir);
    }
}

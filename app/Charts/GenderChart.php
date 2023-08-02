<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(array $label, array $data): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
        ->setWidth(450)
        ->setHeight(450)
        ->addData($data)
        ->setLabels($label);
    }
}

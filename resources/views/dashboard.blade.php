@extends('layouts.master')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('topbar')
    @include('layouts.topbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Mahasiswa</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-dark-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">Laki-Laki</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $male_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-3x text-dark-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">Perempuan</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $female_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-3x text-dark-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">Kota</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $kota_count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-3x text-dark-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Presentase Mahasiswa Berdasarkan Asal Kota</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        {!! $mahasiswaChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Presentase Mahasiswa Berdasarkan Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        {!! $genderChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Presentase Mahasiswa Berdasarkan Tahun Kelahiran</h6>
                </div>
                <div class="card-body offset-md-3">
                    <div class="chart-area">
                        {!! $birthChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ $mahasiswaChart->cdn() }}"></script>
{{ $mahasiswaChart->script() }}
{{ $genderChart->script() }}
{{ $birthChart->script() }}

@endsection
@extends('layouts.master')

@section('title', 'Data Kota')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('topbar')
    @include('layouts.topbar')
@endsection

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kota</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-unbordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kotas as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
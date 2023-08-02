@extends('layouts.master')

@section('title', 'Data Mahasiswa')

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
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <a href="#add-mhs" class="btn btn-primary" data-toggle="modal"><i class="bi bi-plus"></i><span>Add</span></a>
            <a href="/cetak-data" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> <span>PDF</span></a> <br> <br>
            <div class="table-responsive">
                <table class="table table-unbordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kota</th>
                            <th>Tombol Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ date('d M Y', strtotime($item->tanggal_lahir)) }}</td>
                                <td>{{ $item->jeniskelamin }}</td>
                                <td>{{ $item->kotas->nama }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit-mhs{{ $item->id }}"><i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#delete-mhs{{ $item->id }}"><i class="bi bi-trash3-fill"></i></a></button>

                                    @include('mahasiswa.modal.create')
                                    @include('mahasiswa.modal.edit')
                                    @include('mahasiswa.modal.delete')
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
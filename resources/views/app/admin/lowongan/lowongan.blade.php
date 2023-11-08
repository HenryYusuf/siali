@extends('layouts.dashboard.dashboard_app')

@section('title', 'Referensi Tahun')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Tables</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lowongan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="/add-lowongan" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Lowongan</a>
                    </div>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lowongan</th>
                                <th>Nama Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Gaji</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getLowongan as $lowongan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lowongan->nama_lowongan }}</td>
                                    <td>{{ $lowongan->nama_perusahaan }}</td>
                                    <td>{{ $lowongan->lokasi }}</td>
                                    <td>{{ $lowongan->gaji }}</td>
                                    <td>{{ $lowongan->email }}</td>
                                    <td>
                                        <a href="/view-lowongan/{{ $lowongan->id }}" title="View">
                                            <i class="fa-regular fa-eye" style="color: #000000;"></i>
                                        </a>
                                        <a href="/edit-lowongan/{{ $lowongan->id }}" title="Edit">
                                            <i class="fa-regular fa-pen-to-square" style="color: #6a6c01;"></i>
                                        </a>
                                        <a href="/delete-lowongan/{{ $lowongan->id }}" title="Delete">
                                            <i class="fa-solid fa-trash" style="color: #7b0000;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $getLowongan->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <h5 class="card-title mb-0">Referensi Tahun</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="/add-referensi-tahun" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Tahun</a>
                    </div>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($refTahun as $tahun)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tahun->ref_tahun }}</td>
                                    <td>
                                        {{-- <a href="/edit-referensi-tahun/{{ $tahun->id }}" title="Edit">
                                            <i class="fa-regular fa-pen-to-square" style="color: #6a6c01;"></i>
                                        </a> --}}
                                        <a href="/delete-referensi-tahun/{{ $tahun->id }}" title="Delete">
                                            <i class="fa-solid fa-trash" style="color: #7b0000;"></i>
                                        </a>
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

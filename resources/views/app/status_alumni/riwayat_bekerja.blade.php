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
                    <h5 class="card-title mb-0">Riwayat Bekerja</h5>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Posisi</th>
                                <th>Tahun Masuk</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatBekerja as $bekerja)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bekerja->nama_perusahaan }}</td>
                                    <td>{{ $bekerja->posisi }}</td>
                                    <td>{{ $bekerja->tahun_masuk }}</td>
                                    <td>
                                        <img src="{{ asset($bekerja->bukti) }}" alt="bukti" class="img-fluid" width="50">
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

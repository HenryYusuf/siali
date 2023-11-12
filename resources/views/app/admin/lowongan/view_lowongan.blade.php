@extends('layouts.dashboard.dashboard_app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Forms</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">View Lowongan</h5>
                </div>
                <div class="card-body">
                    <h4><strong>{{ $viewLowongan->nama_lowongan }} - {{ $viewLowongan->posisi }}</strong></h4>
                    <h4><strong>{{ $viewLowongan->nama_perusahaan }}</strong></h4>
                    <h4>{{ $viewLowongan->lokasi }}</h4>
                    <h4>Diunggah pada {{ Carbon\Carbon::parse($viewLowongan->created_at)->diffForHumans() }}</h4>
                    <hr>
                    <div class="text-center mb-3">
                        <img src="{{ asset('uploads/foto_brosur/' . $viewLowongan->foto_brosur) }}" alt="foto_brosur"
                            class="img-thumbnail" width="500">
                    </div>
                    <div class="mb-5">
                        <h6><strong>Job Description</strong></h6>
                        <div class="px-4">
                            <p>{!! $viewLowongan->deskripsi !!}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h6><strong>Additional Information</strong></h6>
                        <div class="col-md-6">
                            <h6><strong>Gaji</strong></h6>
                            <p>{{ 'Rp ' . number_format($viewLowongan->gaji, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Email</strong></h6>
                            <p>{{ $viewLowongan->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

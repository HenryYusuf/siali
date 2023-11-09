@extends('layouts.user.app')

@section('content')
    <section class="showcase pt-2 pb-2" style="background-color: #f4f4f4">
        <div class="shadow-sm bg-body m-4 p-4 rounded">
            <div class="container-fluid">
                <h3>Your dream career</h3>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-2">{{ $career->nama_lowongan }}</h6>
                        <h6 class="mb-1">{{ $career->nama_perusahaan }}</h6>
                        <p class="mb-1">{{ $career->lokasi }}</p>
                        <p>Diunggah pada {{ Carbon\Carbon::parse($career->created_at)->formatLocalized('%d-%B-%Y') }}
                        </p>
                    </div>
                    <div class="col-md-4 offset-md-4 text-center">
                        <a class="btn btn-outline-primary btn-sm"
                            href="mailto:{{ $career->email }}?subject=Lamaran%20{{ $career->posisi }}%20-%20{{ $career->nama_perusahaan }}">Apply
                            Now</a>
                    </div>
                </div>
                <h6 class="mt-2">Job Information</h6>
                <div class="px-4">
                    <p>{!! $career->deskripsi !!}</p>
                </div>
                <h6 class="mt-4 mb-2">Additional Information</h6>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0"><strong>Gaji</strong></h6>
                        <p>{{ 'Rp ' . number_format($career->gaji, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0"><strong>Email</strong></h6>
                        <p>{{ $career->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-0"><strong>Job Specializations</strong></h6>
                        <p>{{ $career->posisi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

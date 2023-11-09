@extends('layouts.user.app')

@section('content')
    <section class="showcase pt-2 pb-2" style="background-color: #f4f4f4">
        <div class="shadow-sm bg-body m-4 p-4 rounded">
            <div class="container-fluid">
                <h3>Your dream career's</h3>
                <hr>
                <p>Currently <span class="fw-semibold">{{ $totalCareer }} jobs</span> available</p>
                <div class="row mb-2">
                    @foreach ($getCareer as $career)
                        <div class="col-lg-6">
                            <a href="{{ url('/career/' . $career->id) }}"
                                class="text-decoration-none link-primary link-underline-dark">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4 align-self-center">
                                            <img src="{{ asset($career->foto_brosur) }}" class="img-fluid rounded-start"
                                                alt="{{ $career->nama_lowongan }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{ $career->nama_lowongan }}</h5>
                                                <p class="card-text mb-2">
                                                    <small
                                                        class="fw-normal text-muted">{{ $career->nama_perusahaan }}</small>
                                                </p>
                                                <div class="card-text mb-1">
                                                    <i class="bi bi-briefcase text-dark"></i>
                                                    <small class="ms-2 text-muted">{{ $career->posisi }}</small>
                                                </div>
                                                <div class="card-text mb-2">
                                                    <i class="bi bi-geo-alt-fill text-dark"></i>
                                                    <small class="ms-2 text-muted">{{ $career->lokasi }}</small>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Diunggah pada <span
                                                            class="text-black-80 fw-semibold">{{ Carbon\Carbon::parse($career->created_at)->diffForHumans() }}</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {!! $getCareer->links() !!}
            </div>
        </div>
    </section>
@endsection

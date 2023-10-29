@extends('layouts.dashboard.dashboard_app')

@section('title', 'Foto Profil')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Forms</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Foto Profil</h5>
                </div>
                <div class="card-body">
                    <form action="/store-update-foto-profile/{{ $profil == null ? '' : $profil->user_id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($profil == null || $profil->foto_profil == null)
                            <div class="mb-3">
                                <img src="{{ asset('dummy_image/dummy_image.jpg') }}" class="img-fluid" alt="Foto Profil"
                                    width="200" height="200" />
                            </div>
                        @else
                            <div class="mb-3"><img src="{{ asset($profil->foto_profil) }}" class="img-fluid"
                                    alt="Foto Profil" width="200" height="200"></div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Update Foto Profil</label>
                            <input type="file" name="foto_profil" class="form-control">
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

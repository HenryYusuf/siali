@extends('layouts.dashboard.dashboard_app')

@section('title', 'Status Alumni')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Cards</h1>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tidak/Belum Bekerja</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <form action="/status-alumni-tidak-bekerja/{{ Auth::id() }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lanjut Study</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="/form-lanjut-study" class="btn btn-primary">Isi Survey</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Bekerja</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="/form-lanjut-bekerja" class="btn btn-primary">Isi Survey</a>
                </div>
            </div>
        </div>
    </div>
@endsection

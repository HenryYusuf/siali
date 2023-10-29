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
                    <h5 class="card-title mb-0">Tambah Referensi Tahun</h5>
                </div>
                <div class="card-body">
                    <form action="/store-referensi-tahun" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tahun</label>
                            <input type="number" class="form-control" name="ref_tahun">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

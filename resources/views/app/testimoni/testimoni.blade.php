@extends('layouts.dashboard.dashboard_app')

@section('title', 'Testimoni')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Tables</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Testimoni</h5>
                </div>
                <div class="card-body">
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
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Featured</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimoni as $testi)
                                @if ($testi->testimoni == null)
                                @else
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testi->nama }}</td>
                                        <td>{{ $testi->testimoni->deskripsi }}</td>
                                        <td>
                                            @if ($testi->testimoni->is_featured == 1)
                                                <span class="badge bg-success">Featured</span>
                                            @else
                                                <span class="badge bg-warning">Not Featured</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($testi->testimoni->is_featured == 1)
                                                <a href="/set-featured-testimoni/{{ $testi->testimoni->id }}"
                                                    title="Set Featured">
                                                    <i class="fa-solid fa-circle-xmark" style="color: red"></i>
                                                </a>
                                            @else
                                                <a href="/set-featured-testimoni/{{ $testi->testimoni->id }}"
                                                    title="Set Featured">
                                                    <i class="fa-solid fa-check-circle" style="color: green"></i>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {!! $testimoni->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

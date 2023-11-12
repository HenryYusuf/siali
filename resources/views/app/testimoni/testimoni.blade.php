@extends('layouts.dashboard.dashboard_app')

@section('title', 'Testimoni')
{{-- @push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endpush --}}
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

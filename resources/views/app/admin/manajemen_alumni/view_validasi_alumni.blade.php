@extends('layouts.dashboard.dashboard_app')

@section('title', 'View Validasi Alumni')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Detail Alumni</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">View Alumni</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">NISN</label>
                        <input type="text" class="form-control" value="{{ $user->profil->nisn }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Ijazah</label>
                        <input type="text" class="form-control" value="{{ $user->profil->no_ijazah }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $user->profil->jenis_kelamin }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $user->profil->tanggal_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $user->profil->tempat_lahir }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" value="{{ $user->profil->alamat }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No HandPhone</label>
                        <input type="text" class="form-control" value="{{ $user->profil->no_hp }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Lulus</label>
                        <input type="text" class="form-control" value="{{ $user->profil->tahun_lulus }}" disabled>
                    </div>
                    @if ($user->profil->is_validate == 1)
                    @else
                        <a class="btn btn-primary" href="/approve-validasi-alumni/{{ $user->id }}">Validasi</a>
                    @endif
                </div>
            </div>
        </div>
        @if ($user->profil->is_validate == 1)
        @else
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Alumni</h5>
                    </div>
                    <div class="card-body">
                        <form action="/store-komen-validasi-alumni/{{ $user->profil->user_id }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Komentar Admin</label>
                                <textarea class="form-control" name="deskripsi_is_validate" id="" cols="30" rows="5">{{ $user->profil->deskripsi_is_validate }}</textarea>
                            </div>
                            <button class="btn btn-primary">Komen</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@extends('layouts.dashboard.dashboard_app')

@section('title', 'Profil')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Forms</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profil</h5>
                </div>
                <div class="card-body">
                    <form action="/store-update-profile/{{ $user->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">NISN</label>
                            <input type="number" class="form-control" name="nisn" value="{{ $profil->nisn ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Laki-Laki" name="jenis_kelamin"
                                    {{ $profil == null ? '' : ($profil->jenis_kelamin == 'Laki-Laki' ? 'checked' : '') }}>
                                <span class="form-check-label">
                                    Laki-Laki
                                </span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin"
                                    {{ $profil == null ? '' : ($profil->jenis_kelamin == 'Perempuan' ? 'checked' : '') }}>
                                <span class="form-check-label">
                                    Perempuan
                                </span>
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ $profil->tanggal_lahir ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{ $profil->tempat_lahir ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5">{{ $profil->alamat ?? '' }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Ijazah</label>
                            <input type="number" class="form-control" name="no_ijazah" value="{{ $profil->no_ijazah ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No Handphone</label>
                            <input type="number" class="form-control" name="no_hp" value="{{ $profil->no_hp ?? '' }}">
                        </div>
                        {{-- <div>
                            <label for="" class="form-label">Tahun Masuk</label>
                            <select class="form-select mb-3" name="tahun_masuk" id="tahun_masuk">
                                <option disabled selected>Pilih Tahun Masuk</option>
                                @foreach ($refTahun as $tahun)
                                    <option value="{{ $tahun->ref_tahun }}"
                                        {{ $profil == null ? '' : ($tahun->ref_tahun == $profil->tahun_masuk ? 'selected' : '') }}>
                                        {{ $tahun->ref_tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="" class="form-label">Tahun Lulus</label>
                            <select class="form-select mb-3" name="tahun_lulus" id="tahun_lulus">
                                <option disabled selected>Pilih Tahun Lulus</option>
                                @foreach ($refTahun as $tahun)
                                    <option value="{{ $tahun->ref_tahun }}"
                                        {{ $profil == null ? '' : ($tahun->ref_tahun == $profil->tahun_lulus ? 'selected' : '') }}>
                                        {{ $tahun->ref_tahun }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

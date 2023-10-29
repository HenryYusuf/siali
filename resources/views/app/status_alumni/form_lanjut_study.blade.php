@extends('layouts.dashboard.dashboard_app')

@section('title', 'Form Lanjut Study')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Forms</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Form Lanjut Study</h5>
                </div>
                <div class="card-body">
                    <form action="/store-lanjut-study/{{Auth::id()}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tahun Masuk</label>
                            <select class="form-select mb-3" name="tahun_masuk">
                                <option selected>Pilih Tahun Masuk</option>
                                @foreach ($refTahun as $tahun)
                                    <option>{{$tahun->ref_tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Tahun Lulus</label>
                            <select class="form-select mb-3">
                                <option selected>Pilih Tahun Lulus</option>
                                @foreach ($refTahun as $tahun)
                                    <option>{{$tahun->ref_tahun}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Bukti</label>
                            <input type="file" name="bukti" class="form-control">
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

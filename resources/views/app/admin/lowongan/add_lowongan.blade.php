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
                    <h5 class="card-title mb-0">Tambah Lowongan</h5>
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
                    <form action="/store-lowongan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lowongan</label>
                            <input type="text" class="form-control" name="nama_lowongan">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto Brosur</label>
                            <input type="file" class="form-control" name="foto_brosur">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Posisi</label>
                            <input type="text" class="form-control" name="posisi">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gaji</label>
                            <input type="number" class="form-control" name="gaji">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('deskripsi', {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush

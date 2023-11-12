@extends('layouts.user.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Search Alumni</h1>
                        <form action="{{ url('/search-alumni') }}" class="form-subscribe" id="searchForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="search" name="search" type="text"
                                        placeholder="Search... e.g., Nama, Tahun Lulus, etc" required />
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center pb-8">
        <div class="container">
            <div class="row">
                @if ($alumni === '')
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                            <h3>Aksesibilitas</h3>
                            <p class="lead mb-0">Memberikan akses yang mudah kepada alumni untuk terhubung dengan institusi!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                            <h3>Pemasaran dan jaringan</h3>
                            <p class="lead mb-0">Membantu institusi pendidikan untuk mempromosikan prestasi alumni!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Pengelolaan data efisien</h3>
                            <p class="lead mb-0">Mempermudah pengelolaan data alumni, seperti informasi kontak, pencapaian,
                                dan riwayat pendidikan!</p>
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <h3 class="text-center">List Alumni</h3>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Tahun Lulus</th>
                                    <th>Tempat Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $alm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alm->profil->nisn }}</td>
                                        <td>{{ $alm->nama }}</td>
                                        <td>{{ $alm->profil->tahun_lulus }}</td>
                                        <td>{{ $alm->profil->tempat_lahir }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $alumni->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    {{-- <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('{{ $showcaseURL[0] }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Fully Responsive Design</h2>
                    <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will
                        look great on any device, whether it's a phone, tablet, or desktop the page will behave
                        responsively!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ $showcaseURL[1] }}')">
                </div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Updated For Bootstrap 5</h2>
                    <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the
                        way in mobile responsive web development! All of the themes on Start Bootstrap are now using
                        Bootstrap 5!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('{{ $showcaseURL[2] }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Easy to Use & Customize</h2>
                    <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand
                        some deeper customization options. Out of the box, just add your content and images, and your
                        new landing page will be ready to go!</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Testimonials-->
    <section class="testimonials text-center bg-light pt-4">
        <div class="container">
            <h2 class="mb-5">Apa yang mereka katakan...</h2>
            <div class="row">
                @foreach ($testimoni as $testi)
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            @if ($testi->profil->foto_profil == null)
                                <img src="{{ asset('dummy_image/dummy_image.jpg') }}" class="img-fluid rounded-circle mb-3"
                                    alt="Foto User" />
                            @else
                                <img class="img-fluid rounded-circle mb-3"
                                    src="{{ asset('uploads/foto_profil/' . $testi->profil->foto_profil) }}" alt="Foto User" />
                            @endif
                            <h5>{{ $testi->nama }}</h5>
                            <p class="font-weight-light mb-0">"{{ $testi->testimoni->deskripsi }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('script')
    @if (session('message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('message') }}"
            });
        </script>
    @endif
@endpush

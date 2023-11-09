<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">SIAli</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Main Menu</li>

            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }} ">
                <a class="sidebar-link" href="{{ url('/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('profil/*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/profil', ['id' => Auth::id()]) }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('update-foto-profil/*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/update-foto-profil', ['id' => Auth::id()]) }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Tambah Foto Profil</span>
                </a>
            </li>

            <li class="sidebar-header">Status Alumni</li>

            <li
                class="sidebar-item {{ Request::is('status-alumni') ? 'active' : (Request::is('form-lanjut-study') ? 'active' : (Request::is('form-lanjut-bekerja') ? 'active' : '')) }}">
                <a class="sidebar-link" href="{{ url('/status-alumni') }}">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Isi Status Alumni</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('riwayat-lanjut-study') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/riwayat-lanjut-study') }}">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Riwayat Lanjut Study</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('riwayat-bekerja') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/riwayat-bekerja') }}">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Riwayat Bekerja</span>
                </a>
            </li>

            @if (Auth::user()->roles->first()->nama_role == 'Administrator')
                <li class="sidebar-header">Master Data Alumni</li>

                <li
                    class="sidebar-item {{ Request::is('validasi-alumni') ? 'active' : (Request::is('view-validasi-alumni/*') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/validasi-alumni') }}">
                        <i class="align-middle" data-feather="loader"></i>
                        <span class="align-middle">Validasi Alumni</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('alumni-verified') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('/alumni-verified') }}">
                        <i class="align-middle fa-solid fa-users"></i>
                        <span class="align-middle">Alumni Verified</span>
                    </a>
                </li>

                <li class="sidebar-header">Master Extra</li>

                <li
                    class="sidebar-item {{ Request::is('lowongan') ? 'active' : (Request::is('add-lowongan') ? 'active' : (Request::is('view-lowongan/*') ? 'active' : (Request::is('edit-lowongan/*') ? 'active' : ''))) }}">
                    <a class="sidebar-link" href="{{ url('/lowongan') }}">
                        <i class="align-middle" data-feather="file"></i>
                        <span class="align-middle">Lowongan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('testimonial') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('/testimoni') }}">
                        <i class="align-middle" data-feather="file"></i>
                        <span class="align-middle">Testimoni</span>
                    </a>
                </li>

                <li class="sidebar-header">Master Data Referensi</li>

                <li
                    class="sidebar-item {{ Request::is('referensi-tahun') ? 'active' : (Request::is('add-referensi-tahun') ? 'active' : '') }}">
                    <a class="sidebar-link" href="{{ url('/referensi-tahun') }}">
                        <i class="align-middle" data-feather="file"></i>
                        <span class="align-middle">Referensi Tahun</span>
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>

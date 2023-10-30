<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">SIAli</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Main Menu</li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/profil/{{ Auth::id() }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/update-foto-profil/{{ Auth::id() }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Tambah Foto Profil</span>
                </a>
            </li>

            <li class="sidebar-header">Status Alumni</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/status-alumni">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Isi Status Alumni</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/riwayat-lanjut-study">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Riwayat Lanjut Study</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/riwayat-bekerja">
                    <i class="align-middle" data-feather="loader"></i>
                    <span class="align-middle">Riwayat Bekerja</span>
                </a>
            </li>

            @if (Auth::user()->roles->first()->nama_role == 'Administrator')
                <li class="sidebar-header">Master Data Alumni</li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/validasi-alumni">
                        <i class="align-middle" data-feather="loader"></i>
                        <span class="align-middle">Validasi Alumni</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle fa-solid fa-users"></i>
                        <span class="align-middle">Alumni Verified</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="fa-solid fa-users-gear"></i>
                        <span class="align-middle">Alumni Un-Verified</span>
                    </a>
                </li>

                <li class="sidebar-header">Master Extra</li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/lowongan">
                        <i class="align-middle" data-feather="file"></i>
                        <span class="align-middle">Lowongan</span>
                    </a>
                </li>

                <li class="sidebar-header">Master Data Referensi</li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/referensi-tahun">
                        <i class="align-middle" data-feather="file"></i>
                        <span class="align-middle">Referensi Tahun</span>
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>

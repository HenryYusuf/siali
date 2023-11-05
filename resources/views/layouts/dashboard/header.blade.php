<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                    data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                    data-bs-toggle="dropdown">
                    @if (Auth::user()->profil == null)
                        <img src="{{ asset('dummy_image/dummy_image.jpg') }}" class="avatar img-fluid rounded me-1"
                            alt="User" />
                    @else
                        <img src="{{ asset(Auth::user()->profil->foto_profil) }}"
                            class="avatar img-fluid rounded me-1" alt="User" />
                    @endif
                    <span class="text-dark">{{ Auth::user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profil/{{ Auth::id() }}"><i class="align-middle me-1"
                            data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ '/logout' }}">
                        <i class="align-middle me-1" data-feather="power"></i>
                        Log out
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

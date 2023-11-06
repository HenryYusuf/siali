<div class="container">
    <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <a class="navbar-brand align-items-center col-md-3 mb-2 mb-md-0" href="{{ url('/') }}">SIAli</a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ url('/') }}" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="{{ url('/career') }}" class="nav-link px-2 link-dark">Career</a></li>
            <li><a href="{{ url('/faq') }}" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="{{ url('/about') }}" class="nav-link px-2 link-dark">About</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <a class="btn btn-outline-primary me-2" href="{{ url('/login') }}">Sign In</a>
            <a class="btn btn-primary" href="{{ url('/register') }}">Sign Up</a>
        </div>
    </nav>
</div>

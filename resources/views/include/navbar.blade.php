<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    {{-- <a class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a> --}}
    <a href="#" style="text-decoration: none;" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">
        {{-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all message</a>
            </div>
        </div> --}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i style="position: relative;" class="fa fa-bell me-lg-2"><span
                        style="position: absolute; top: 1px; right: -3px;"
                        class="badge rounded-pill badge-notification bg-danger">{{ count($data['last']) }}</span></i>
                <span class="d-none d-lg-inline-flex">Notificatin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                @foreach ($data['last'] as $lastproject)
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">{{ $lastproject->NAME_PROJECT }}</h6>
                        <small></small>
                    </a>
                    <hr class="dropdown-divider">
                @endforeach
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2"
                    src="{{ Auth::user()->Profile->IMG ? asset('images/') . '/' . Auth::user()->Profile->IMG : asset('images/') . '/' . 'profile/no_img.png' }}"
                    alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->NAME }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('profile') }}" class="dropdown-item">My Profile</a>
                {{-- <a href="#" class="dropdown-item">Settings</a> --}}
                <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>

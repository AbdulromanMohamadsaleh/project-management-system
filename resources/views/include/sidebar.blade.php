<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <b style="text-align: " class="text-primary">
                {{-- <i class="fa fa-hashtag me-2"></i> --}}
                Project Managment
            </b>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('images/') . '/' . Auth::user()->IMG }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->NAME }}</h6>
                <span>{{ Auth::user()->POSITION }}</span>
            </div>
        </div>
        <div class="navbar-nav  nav w-100">
            @switch(Auth::user()->POSITION)
                @case('Admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Employee')
                    <a href="{{ route('employee.dashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Project Manager')
                    <a href="{{ route('projectManager.dashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Manager')
                    <a href="{{ route('manager.dashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @default
            @endswitch

            {{-- <div class="nav-item dropdown">
                <a href="{{ route('create') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Save Project</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('login') }}" class="dropdown-item">login</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div> --}}
            @if (Auth::user()->POSITION == 'Employee' ||
                    Auth::user()->POSITION == 'Project Manager' ||
                    Auth::user()->POSITION == 'Admin')
                <a href="{{ route('create') }}" class="nav-item nav-link"><i class='fas fa-save'></i></i>Create
                    Project</a>
                <a href="{{ route('table') }}" class="nav-item nav-link"><i class='fas fa-database'></i></i>
                    Projects</a>
            @endif
            @if (Auth::user()->POSITION == 'Manager')
                <a href="{{ route('approve') }}" class="nav-item nav-link"><i class="fa fa-check "
                        aria-hidden="true"></i>
                    Approve Project</a>
            @endif
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Report</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-cog"></i>Seting</a>
                <div class="dropdown-menu bg-transparent border-0">
                    @if (Auth::user()->POSITION == 'Admin')
                        <a href="{{ route('dateholyday.Index') }}" class="dropdown-item ms-4"><i
                                class="fa fa-calendar me-2"></i>Date Holyday</a>
                        <a href="{{ route('category') }}" class="dropdown-item ms-4"><i class="fa fa-list-alt me-2"
                                aria-hidden="true"></i>Category</a>
                        <a href="{{ route('createuser') }}" class="dropdown-item ms-4"><i class="fa fa-user-plus me-2"
                                aria-hidden="true"></i>Add user</a>
                    @endif
                    <a href="{{ route('profile') }}" class="dropdown-item ms-4"><i class="fa fa-user me-2"
                            aria-hidden="true"></i>Profile</a>
                </div>
            </div>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                </div>
            </div> --}}
        </div>
    </nav>
</div>

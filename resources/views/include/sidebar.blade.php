<div class="sidebar  pb-3">
    <nav class="navbar bg-light navbar-light">
        <a  class="navbar-brand mx-4 mb-3">
            <b style="text-align: " class="text-primary">
                Project Managment
            </b>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ Auth::user()->Profile->IMG ? asset('images/') . '/' . Auth::user()->Profile->IMG : asset('images/') . '/' . 'profile/no_img.png' }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->NAME }}</h6>
                <span>{{ Auth::user()->Profile->Position->POS_NAME }}</span>
            </div>
        </div>
        <div class="navbar-nav  nav w-100">
            @switch(Auth::user()->Privilege->PRI_NAME)
                @case('Admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link  {{$routename=='admin.dashboard'?'active':''}}"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Employee')
                    <a href="{{ route('employee.dashboard') }}" class="nav-item nav-link {{$routename=='employee.dashboard'?'active':''}}"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Project Manager')
                    <a href="{{ route('projectManager.dashboard') }}" class="nav-item nav-link {{$routename=='projectManager.dashboard'?'active':''}}"><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @case('Manager')
                    <a href="{{ route('manager.dashboard') }}" class="nav-item nav-link "><i
                            class="fa fa-dashboard"></i></i>Dashboard
                    </a>
                @break

                @default
            @endswitch

            @if (Auth::user()->Privilege->PRI_NAME == 'Employee' ||
                    Auth::user()->Privilege->PRI_NAME == 'Project Manager' ||
                    Auth::user()->Privilege->PRI_NAME == 'Admin')
                <a href="{{ route('create') }}" class="nav-item nav-link {{$routename=='create'?'active':''}}"><i class='fas fa-save'></i></i>Create
                    Project</a>
                <a href="{{ route('table') }}" class="nav-item nav-link {{$routename=='table'?'active':''}}"><i class='fas fa-database'></i></i>
                    Projects</a>
            @endif
            @if (Auth::user()->Privilege->PRI_NAME == 'Manager')
                <a href="{{ route('approve') }}" class="nav-item nav-link"><i class="fa fa-check "
                        aria-hidden="true"></i>
                    Approve Project</a>
            @endif
            <a href="{{ route('report.report') }}" class="{{ $routename=='report.report'?'active':'' }} nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Report</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-cog"></i>Seting</a>
                <div class="dropdown-menu bg-transparent border-0">
                    @if (Auth::user()->Privilege->PRI_NAME == 'Admin')
                        <a href="{{ route('dateholyday.Index') }}" class="dropdown-item ms-4  {{ $routename=='dateholyday.Index'?'active':'' }}"><i
                                class="fa fa-calendar me-2"></i>Date Holiday</a>
                        <a href="{{ route('category') }}" class="dropdown-item ms-4 {{ $routename=='category'?'active':'' }}"><i class="fa fa-list-alt me-2"
                                aria-hidden="true"></i>Category</a>
                        <a href="{{ route('createuser') }}" class="dropdown-item ms-4 {{ $routename=='createuser'?'active':'' }}"><i class="fa fa-user-plus me-2"
                                aria-hidden="true"></i>Add user</a>
                    @endif
                    <a href="{{ route('profile') }}" class="dropdown-item ms-4"><i class="fa fa-user me-2"
                            aria-hidden="true"></i>Profile</a>
                </div>
            </div>

        </div>
    </nav>
</div>

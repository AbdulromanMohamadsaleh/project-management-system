@switch(Auth::user()->Privilege->PRI_NAME)
    @case('Admin')
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <center><i class="fas fa-user-clock" style="color:#825d09;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>Pending Projects
                            <div class="badge text-bg-primary">{{ $data['totalPendingProject'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
            @include('Admin.modal_view.modal_project_panding_approve')
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal3">
                    <div class="wrimagecard-topimage_header" style="background-color:rgb(255 219 191 / 62%)">
                        <center><i class="fas fa-tasks" style="color:orange;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>In Progress Projects
                            <div class="badge text-bg-primary">{{ $data['totalInProggressProject'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Admin.modal_view.modal_projectprogress')
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal2">
                    <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                        <center><i class="fas fa-clipboard-check" style="color:#16A085;font-size:70px;"></i>
                        </center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>
                            Completed Projects
                            <div class="badge text-bg-primary">{{ $data['totalInCompleteProject'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Admin.modal_view.modal_projectcomplate')
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal4">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <center><i class="fas fa-user" style="color:#825d09;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>Total Users

                            <div class="badge text-bg-primary">{{ $data['totalUsers'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Admin.modal_view.modal_user')
            </div>
        </div>
    @break

    @case('Project Manager')
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <center><i class="fas fa-database" style="color:#825d09;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>My Projects
                            <div class="badge text-bg-primary">{{ $data['userInProjects'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Dashboard.include.modal_projectall')
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgb(255 219 191 / 62%)">
                        <center><i class="fas fa-tasks" style="color:orange;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>In Progress Projects
                            <div class="badge text-bg-primary">{{ $data['userInProggressProjects'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
            @include('Dashboard.include.modal_projectprogress')
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal2">
                    <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                        <center><i class="fas fa-clipboard-check" style="color:#16A085;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>
                            Completed Projects
                            <div class="badge text-bg-primary">{{ $data['userInCompletedProjects'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
        </div>
        @include('Dashboard.include.modal_projectcomplate')
    @break

    @case('Manager')
        <div class="col col-sm-4 col-md-3">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <center><i class="fas fa-user-clock" style="color:#825d09;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>Pending Projects
                            <div class="badge text-bg-primary">{{ $data['totalPendingProject'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col col-sm-3 col-md-3">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(79, 36, 187, 0.1) ">

                        <center><i class="fa fa-money" style="color:#093382;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>Total Budget
                            <div class="badge text-bg-primary">{{ $data['totalbudget'] }} Baht</div>
                        </h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col col-sm-3 col-md-3">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal3">
                    <div class="wrimagecard-topimage_header" style="background-color:rgb(255 219 191 / 62%)">
                        <center><i class="fas fa-tasks" style="color:orange;font-size:70px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>In Progress Projects
                            <div class="badge text-bg-primary">{{ $data['totalInProggressProject'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Admin.modal_view.modal_projectprogress')
            </div>
        </div>
        <div class="col col-sm-3 col-md-3">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal2">
                    <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                        <center><i class="fas fa-clipboard-check" style="color:#16A085;font-size:70px;"></i>
                        </center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>
                            Completed Projects
                            <div class="badge text-bg-primary">{{ $data['totalInCompleteProject'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Admin.modal_view.modal_projectcomplate')
            </div>
        </div>
    @break

    @case('Employee')
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                        <center><i class="fas fa-database" style="color:#825d09;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>My Projects
                            <div class="badge text-bg-primary">{{ $data['userInProjects'] }}</div>
                        </h4>
                    </div>
                </a>
                @include('Dashboard.include.modal_projectall')
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal">
                    <div class="wrimagecard-topimage_header" style="background-color:rgb(255 219 191 / 62%)">
                        <center><i class="fas fa-tasks" style="color:orange;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>In Progress Projects
                            <div class="badge text-bg-primary">{{ $data['userInProggressProjects'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
            @include('Dashboard.include.modal_projectprogress')
        </div>

        <div class="col-md-4 col-sm-4">
            <div class="wrimagecard wrimagecard-topimage">
                <a data-bs-toggle="modal" data-bs-target="#modal2">
                    <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                        <center><i class="fas fa-clipboard-check" style="color:#16A085;font-size:100px;"></i></center>
                    </div>
                    <div class="wrimagecard-topimage_title">
                        <h4>
                            Completed Projects
                            <div class="badge text-bg-primary">{{ $data['userInCompletedProjects'] }}</div>
                        </h4>
                    </div>
                </a>
            </div>
        </div>
        @include('Dashboard.include.modal_projectcomplate')
    @break

    @default
@endswitch

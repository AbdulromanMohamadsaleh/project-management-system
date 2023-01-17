@include('include.header')

<body>
    {{-- <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('include.navbar')<br>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <dt><b class="border-bottom border-primary mt-1">View Project</b></dt>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">
            <!-- Recent Sales Start -->
            <div class="container mt-3 ">
                <div class="stepper-wrapper">
                    <div class="stepper-item {{ in_array('New Release', $status) ? 'completed' : 'active' }}">
                        <div class="step-counter">1</div>
                        <div class="step-name">New Release</div>
                    </div>
                    <div class="stepper-item {{ in_array('Approved', $status) ? 'completed' : 'active' }}">
                        <div class="step-counter">2</div>
                        <div class="step-name">Approved</div>
                    </div>
                    <div class="stepper-item {{in_array('Progress', $status)?"completed": "active"}}">
                        <div class="step-counter">3</div>
                        <div class="step-name">Progress</div>
                    </div>
                    <div class="stepper-item {{ in_array('Completed', $status) ? 'completed' : 'active' }}">
                        <div class="step-counter">4</div>
                        <div class="step-name">Completed</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bd-callout bd-callout-primary">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <dl>
                                                <div>
                                                    <dt><b class="border-bottom border-primary">Project Code</b>
                                                    </dt>
                                                    <dd>{{ $project_detail->DETAIL_ID }}</dd>

                                                    <dt><b class="border-bottom border-primary">Record Name</b></dt>
                                                    <dd>{{ $project_detail->ProjectCreator->NAME }}</dd>
                                                    <dt><b class="border-bottom border-primary">Record Date</b></dt>
                                                    <dd>{{ $project_detail->created_at->format('d/m/Y') }}</dd>
                                                    <dt><b class="border-bottom border-primary">Project Name</b>
                                                    </dt>
                                                    <dd>{{ $project_detail->NAME_PROJECT }}</dd>
                                                    <dt><b class="border-bottom text-break border-primary">Resons</b>
                                                    </dt>
                                                    <dd>{{ $project_detail->REASONS }}</dd>
                                                    <dt><b class="border-bottom border-primary">Objective</b></dt>
                                                    <dd>{{ $project_detail->OBJECTIVE }}</dd>



                                                    {{-- <dt><b class="border-bottom border-primary">Record Date</b>
                                                            </dt>
                                                            <dd>{{ $project_detail->DATE_SAVE }}</dd>
                                                            <dt><b class="border-bottom border-primary">Project Name</b>
                                                            </dt> --}}
                                                    <b class="border-bottom text-break border-primary">Resons</b>
                                                    </dt>
                                                    <dd>{{ $project_detail->REASONS }}</dd>
                                                    <dt>
                                                </div>
                                            </dl>
                                        </div>
                                        <div class="col-sm-6">
                                            <dl>

                                                <dt><b class="border-bottom border-primary">Objective</b>
                                                </dt>
                                                <dd>{{ $project_detail->OBJECTIVE }}</dd>
                                                <dt><b class="border-bottom border-primary">Target</b></dt>
                                                <dd>{{ $project_detail->TARGET }}</dd>
                                                <dt><b class="border-bottom border-primary">Location</b></dt>
                                                <dd>{{ $project_detail->LOCATION }}</dd>
                                                <dt><b class="border-bottom border-primary">Results</b></dt>
                                                <dd>{{ $project_detail->RESULT }}</dd>
                                                <dl>
                                                    <dt><b class="border-bottom border-primary">Start Date</b></dt>
                                                    <dd>{{ $project_detail->DATE_START }}</dd>
                                                    <dt><b class="border-bottom border-primary">End Date</b></dt>
                                                    <dd>{{ $project_detail->DATE_END }}</dd>
                                                    <dt><b class="border-bottom border-primary">Total Date</b></dt>
                                                    <dd>{{ $project_detail->TOTAL_DATE }}</dd>
                                                </dl>
                                                <dt><b class="border-bottom border-primary">Budget</b></dt>
                                                <dd>{{ $project_detail->BUDGET }}</dd>
                                                <dt><b class="border-bottom border-primary">Project Manager</b></dt>
                                                <dd>{{ $project_detail->ProjectManager->NAME }}</dd>

                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container row mt-3 ">
                    <div class="col-md-4">
                        <div class="card card-outline card-lime">
                            <div class="card-header">
                                <span><b>Team Member/s:</b></span>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="users-list clearfix list-group list-group-horizontal justify-content-center"
                                    style="flex-wrap: wrap">
                                    @foreach ($TeamsName as $TeamsName)
                                        <li class="nav-link">
                                            <img class="rounded-circle" src="{{ asset('images/user.jpg') }}"
                                                alt="User Image">
                                            <a style="text-decoration: none; color: black;" class="users-list-name"
                                                href="javascript:void(0)">{{ $TeamsName->NAME }}</a>
                                        </li>
                                    @endforeach
                                    <!-- <span class="users-list-date">Today</span> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row col-8">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-danger me-2"> <i class="fas fa-pencil-alt"
                                        style="font-size: 25;"></i>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-alarm"
                                            style="font-size: 25;"></i></button>
                                    <button type="button" class="btn btn-primary"><i class="bi bi-list-task"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <b>Total Date = {{ $project_detail->TotalDays . ' ' . $project_detail->activity[0]->DAY_WEEK }}
                        </b>
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                    <th>Date Start Task</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                    <th>Quality Work</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody class="tbl-accordion-header">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($project_detail->activity as $act)
                                    @php
                                        $sum = 0;

                                        foreach ($act->tasks as $task) {
                                            $sum += intval($task->DAY);
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <a data-toggle="toggle"><strong><i class='fas fa-angle-down'></i></strong></a>
                                        </td>
                                        <td style="text-align: left">
                                            <strong>{{ $i++ }}.{{ $act->ACTIVITY_NAME }}</strong>
                                            @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                                                </button>
                                            @endif

                                        </td>
                                        <td>{{ $sum }} {{ $act->DAY_WEEK }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>

                                            @if ($act->STATUS == 1)
                                                <b class="text-success"> Completed</b>
                                            @else
                                                <b>-</b>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $o = 1;
                                    @endphp
                            <tbody class="tbl-accordion-body">
                                @foreach ($act->tasks as $task)
                                    <tr>
                                        <td></td>
                                        <td style="margin:10px;text-align: left ">{{ $i - 1 . '.' . $o++ }}
                                            {{ $task->TASK_NAME }} </td>
                                        <td>{{ $task->DAY }} {{ $act->DAY_WEEK }}
                                            @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                    </div>
                    @endif
                    </td>
                    <td>1-1-2566</td>

                    {{-- <td>{{ $task->TASK_NAME }}</td> --}}


                    <td>
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                            @if ($project_detail->IS_APPROVE == 1)
                                @if ($task->STATUS == 0)
                                    <form style="display: inline-block" method="GET"
                                        action="{{ route('task.done', $task->TASK_ID) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="GET">
                                        <button style="color:white" type="submit"
                                            class="btn  btn-warning  show-alert-delete-box " data-toggle="tooltip"
                                            title='Complete'><i class='fas fa-check-circle'></i></button>
                                    </form></a>
                                @else
                                    <a class="btn btn-success" data-toggle="tooltip" title="Completed"><i
                                            class="bi bi-check-circle"></i></a>
                                @endif
                            @else
                            @endif
                        @else
                        @endif
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                        @endif
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class='fas fa-money-check-alt'></i>
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">add budget</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form id="signUpForm" method="post" action="{{ route('category.save') }}">
                                            @csrf
                                            {{-- Project Name / Target --}}
                                            <div class="row mb-5 mb-sm-0">
                                                <div class=" mb-sm-5">
                                                    <label class="label-left fw-bold mb-2"
                                                        for="projectName">budget</label>
                                                    <input type="text" name="category_name" class="form-control"
                                                        id="projectName">
                                                </div>
                                                <button type="submit" name="submit" onclick="success()"
                                                    class="btn btn-success">SAVE</button>
                                            </div>
                                    </div>
                                    <!-- end previous / next buttons -->
                                    </form>
                                </div>


                                <!-- Modal footer -->

                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class='fas fa-book'></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="signUpForm" method="post" action="{{ route('category.save') }}">
                                                @csrf
                                                {{-- Project Name / Target --}}
                                                <div class="row mb-5 mb-sm-0">
                                                    <div class=" mb-sm-5">
                                                        <label class="label-left fw-bold mb-2"
                                                            for="projectName">budget</label>
                                                        <input type="text" name="category_name" class="form-control"
                                                            id="projectName">
                                                    </div>
                                                    <button type="submit" name="submit" onclick="success()"
                                                        class="btn btn-success">SAVE</button>
                                                </div>
                                        </div>
                                        <!-- end previous / next buttons -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                </div>



                </td>
                <td>
                    @if ($task->STATUS == 1)
                        @php
                            $TASK_TRACKER = explode(',', $task->TASK_TRACKER);
                        @endphp
                        <div class="me-3">
                            <div>
                                {{ $TASK_TRACKER[0] }}
                            </div>
                            <div>
                                {{ $TASK_TRACKER[1] }}
                            </div>
                        </div>
                    @endif
                </td>
                <td></td>
                </tr>
                @endforeach

                </tbody>
                @endforeach
                </tbody>

                </tbody>
                </table>
            </div>
            </div>

            <br>

        </div>
    </div>
    </div>

</body>
@include('include.scrip');
<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="toggle"]').click(function() {
            $(this).parents().next(".tbl-accordion-body").toggle();
        });
    });
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to active  this user?",
            text: "If you active this, it will be gone forever.",
            icon: "success",
            type: "success",
            buttons: ["Cancel", "Yes!"],
            cancelButtonColor: '#DD6B55',
            confirmButtonColor: 'blue',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>

</html>
<style>
    table {
        width: 800px;
        border-collapse: collapse;
    }

    th {
        background: #3498db;
        color: white;
        font-weight: bold;
    }

    td,
    th {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-size: 18px;
    }

    .tbl-accordion-header a {
        color: black !important;
    }

    .tbl-accordion-body {
        display: none;
    }

    .tbl-accordion-body td {
        border-bottom: 0px;
    }

    .tbl-accordion-body tr:last-child {
        border-bottom: 1px solid #ccc;
    }

    .bd-callout {
        padding: 1.25rem;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        border: 1px solid #eee;
        border-left-width: .25rem;
        border-radius: .25rem
    }

    .bd-callout-primary {
        border-left-color: #007bff
    }

    dd {
        margin-bottom: 2rem;

    }

    .swal-footer {
        text-align: center;
    }

    .swal-button--confirm {
        background-color: #3AAB20;
        color: white
    }

    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;

        @media (max-width: 768px) {
            font-size: 12px;
        }
    }

    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }

    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }

    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
    }

    .stepper-item.active {
        font-weight: bold;
    }

    .stepper-item.completed .step-counter {
        background-color: #4bb543;
    }

    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #4bb543;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .stepper-item:last-child::after {
        content: none;
    }
</style>

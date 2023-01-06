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
        @include('include.navbar')

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <dt><b class="border-bottom border-primary">View Project</b></dt>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">

            <!-- Recent Sales Start -->
            <div class="container mt-3 ">
                <div class="horizontal-timeline">

                    <ul class="list-inline items">
                        <li class="list-inline-item items-list">
                            <div class="px-5">
                                @if ($project_detail->STATUS == 'New Release')
                                    <div class="event-date badge bg-info"> New Release</div>
                                @endif
                            </div>
                        </li>
                        <li class="list-inline-item items-list">
                            <div class="px-5">
                                <div class="event-date badge bg-success">Approved</div>
                            </div>
                        </li>
                        <li class="list-inline-item items-list">
                            <div class="px-5">
                                <div class="event-date badge bg-danger">Progress</div>
                            </div>
                        </li>
                        <li class="list-inline-item items-list">
                            <div class="px-5">
                                <div class="event-date badge bg-warning">Complete</div>
                            </div>
                        </li>
                    </ul>
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

            </div>
            <br>
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

                <div class="col-md-8 ">
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
                                        <button type="button" class="btn btn-danger"> <i class="fas fa-pencil-alt"
                                                style="font-size: 25;"></i></button>
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
                                    <td>{{ $task->DAY }} {{ $act->DAY_WEEK }} <button type="button"
                                            class="btn btn-warning btn-sm2" data-bs-toggle="modal"
                                            data-bs-target="#Modal{{ $task->TASK_ID }}">
                                            <i class="fas fa-pencil-alt" style="font-size: 15px;">
                                            </i></button>

                                        <!-- The Modal -->
                                        <div class="modal" id="Modal{{ $task->TASK_ID }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Category</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form id="signUpForm" method="post" {{-- action="{{ route('task.update', $task->TASK_ID) }}" --}}>
                                                            @csrf
                                                            {{-- Project Name / Target --}}
                                                            <div class="row mb-5 mb-sm-0">
                                                                <div class="col-md-6 mb-sm-5">
                                                                    <label class="label-left fw-bold mb-2"
                                                                        for="holyday_name">Holyday Name</label>
                                                                    <input type="text" name="holyday_name"
                                                                        class="form-control" id="holyday_name"
                                                                        value="{{ $task->DAY }}">
                                                                </div>
                                                                <div class="col-md-6 mb-sm-5">
                                                                    <label class="label-left fw-bold mb-2"
                                                                        for="target">Date Holyday</label>
                                                                    <input type="date" name="date_holyday"
                                                                        value="{{ $task->DAY }}"
                                                                        class="form-control" id="target">
                                                                </div>
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-success">SAVE</button>
                                                            </div>
                                                    </div>
                                                    <!-- end previous / next buttons -->
                                                    </form>
                                                </div>

                                                <!-- Modal footer -->

                                            </div>
                                        </div>
                </div>
                </td>
                <td>1-1-2566</td>

                {{-- <td>{{ $task->TASK_NAME }}</td> --}}


                <td>
                    @if ($project_detail->IS_APPROVE == 1)
                        @if ($task->STATUS == 0)
                            <a class="btn btn-warning task" data-toggle="tooltip" title="Complete"
                                href="{{ route('task.done', $task->TASK_ID) }}" onclick="submitResult(event)"><i
                                    class="bi bi-check-circle"></i></a>
                        @else
                            <a class="btn btn-success" data-toggle="tooltip" title="Completed"><i
                                    class="bi bi-check-circle"></i></a>
                        @endif
                    @else
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
            </div>



            </td>
            <td>
                @if ($task->STATUS == 1)
                    {{ date('d-m-Y', strtotime($task->COPLATE_TIME)) }}
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
</style>

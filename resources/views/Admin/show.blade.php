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
        <!-- Recent Sales Start -->
        <div class="container mt-3 ">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <dl>
                                                <dt><b class="border-bottom border-primary">Project Code</b></dt>
                                                <dd>{{ $project_detail->DETAIL_ID }}</dd>
                                                <dt><b class="border-bottom border-primary">Record Name</b></dt>
                                                <dd>{{ $project_detail->RECORD_CREATOR }}</dd>
                                                <dt><b class="border-bottom border-primary">Record Date</b></dt>
                                                <dd>{{ $project_detail->DATE_SAVE }}</dd>
                                                <dt><b class="border-bottom border-primary">Project Name</b></dt>
                                                <dd>{{ $project_detail->NAME_PROJECT }}</dd>
                                                <dt><b class="border-bottom text-break border-primary">Resons</b></dt>
                                                <dd>{{ $project_detail->REASONS }}</dd>
                                                <dt><b class="border-bottom border-primary">Objective</b></dt>
                                                <dd>{{ $project_detail->OBJECTIVE }}</dd>
                                            </dl>
                                        </div>
                                        <div class="col-sm-6">
                                            <dl>
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
                                                <dd>{{ $project_detail->PROPONEN_NAME }}</dd>
                                            </dl>
                                        </div>
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
                                    <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt="User Image">
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
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Activity</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody class="tbl-accordion-header">
                        <tr>
                            <td>
                                <a data-toggle="toggle"><strong><i class='fas fa-angle-down'></i></strong></a>
                            </td>
                            <td><strong>1.ข้าวผัด</strong></td>
                            <td>10 Week</td>
                            <td></td>
                            <td>Compete</td>
                        </tr>
                    </tbody>
                    <tbody class="tbl-accordion-body">
                        <tr>
                        <tr>
                            <td></td>
                            <td>1.1.ไข่</td>
                            <td>5 Week</td>
                            <td>
                                <a class="btn btn-success" href=""><i class='fas fa-check-circle'></i></a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-target="#modal1">view</a></li>
                                        <li><a class="dropdown-item" href="#" data-target="#modal2">edit</a></li>
                                    </ul>
                                </div>
                                <!--Modal code -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                    <tbody class="tbl-accordion-header">
                        <tr>
                            <td>
                                <a data-toggle="toggle"><strong>97132598</strong></a>
                            </td>
                            <td>Table Rockefeller</td>
                            <td>IDXPTO</td>
                        </tr>
                    </tbody>
                    <tbody class="tbl-accordion-body">
                        <tr>
                            <td><strong>Category:</strong></td>
                            <td>Furniture</td>
                            <td><strong>Group:</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Profit:</strong></td>
                            <td>$ 350</td>
                        </tr>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



</body>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
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
</style>

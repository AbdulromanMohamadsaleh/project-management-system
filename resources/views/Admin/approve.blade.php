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

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Approve</h6>
                    <a href="">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th style="text-align: center;" scope="col">ID Project</th>
                                <th style="text-align: center;" scope="col">Name Porject</th>
                                <th style="text-align: center;" scope="col">Record Caretor</th>
                                <th style="text-align: center;" scope="col">Date Record</th>
                                <th style="text-align: center;" scope="col">Project Manager</th>
                                <th style="text-align: center;" scope="col">Budget</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project_details as $project_detail)
                                <tr style="text-align:left">
                                    <th scope="row">{{ $project_detail->DETAIL_ID }}</th>
                                    <td>{{ $project_detail->NAME_PROJECT }}</td>
                                    <td>{{ $project_detail->RECORD_CREATOR }}</td>
                                    <td>{{ $project_detail->DATE_SAVE }}</td>
                                    <td>{{ $project_detail->PROPONEN_NAME }}</td>
                                    <td>{{ $project_detail->BUDGET }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                aria-label="Example with label" style="width: 0%;" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                        {{-- <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <center>
                                            <p>50%</p> --}}
                                    </td>
                                    </center>
                                    <td>
                                        @include('Admin.include.show_project_status')
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm3" data-toggle="tooltip" title="view project"
                                            href="{{ route('show', $project_detail->DETAIL_ID) }}">
                                            <i class="bi bi-eye" style="font-size: 25;"></i>
                                        </a>
                                        @if ($project_detail->IS_APPROVE == 0)
                                            <a class="btn btn-success" data-toggle="tooltip" title="approve"
                                                href="{{ route('project.aprove', $project_detail->DETAIL_ID) }}">
                                                <i class='fas fa-check-circle'></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>

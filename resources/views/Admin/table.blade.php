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
                    <h6 class="mb-0">Recent Salse</h6>
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
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                aria-label="Example with label" style="width: 25%;" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100">25%</div>
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
                                        <span
                                            class="badge rounded-pill {{ $project_detail->STATUS == 'New Release' ? 'text-bg-secondary' : 'text-bg-warning' }}">{{ $project_detail->STATUS }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm3" data-toggle="tooltip" title="view project"
                                            href="{{ route('show', $project_detail->DETAIL_ID) }}">
                                            <i class="bi bi-eye" style="font-size: 25;"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm3" data-toggle="tooltip" title="view project"
                                            href="{{ route('timeline', $project_detail->DETAIL_ID) }}">
                                            <i class="bi bi-calendar2-range" style="font-size: 25;"></i>
                                        </a>
                                        @if ($project_detail->IS_APPROVE == 0)
                                            <a class="btn btn-warning btn-sm2" data-toggle="tooltip"
                                                title="edit project" href="">
                                                <i class="fas fa-pencil-alt" style="font-size: 25;">
                                                </i>
                                            </a>
                                        @endif

                                        @if ($project_detail->IS_APPROVE == 0)
                                        <form method="POST" action="{{ route('project.delete',$project_detail->DETAIL_ID)}}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

</html>

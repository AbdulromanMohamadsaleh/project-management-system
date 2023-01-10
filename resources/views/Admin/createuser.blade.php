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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Create User</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="signUpForm" method="post" action="{{ route('holyday.save') }}">
                                        @csrf
                                        {{-- Project Name / Target --}}
                                        <div class="row mb-5 mb-sm-0">
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Emial</label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Password
                                                    </label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Confirm Password
                                                    </label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Name
                                                    </label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Agency
                                                    Name</label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Positon</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected> select Position</option>
                                                    <option value="1">admin</option>
                                                    <option value="2">empoyeee</option>
                                                    <option value="3">project manager</option>
                                                    <option value="3">manager</option>
                                                    <option value="3">member</option>
                                                  </select>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-success">SAVE</button>
                                        </div>
                                </div>
                                <!-- end previous / next buttons -->
                                </form>
                            </div>

                            <!-- Modal footer -->

                        </div>
                    </div>
                </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Nickname</th>
                                <th scope="col">Card_id</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Agency</th>
                                <th scope="col">Position</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($login as $logins)
                                <tr style="text-align:left">
                                    <td>{{ $logins->LOGIN_ID }}</td>
                                    <td>{{ $logins->EMAIL }}</td>
                                    <td>{{ $logins->NAME }}</td>
                                    <td>{{ $logins->NICKNAME }}</td>
                                    <td>{{ $logins->CARD_ID }}</td>
                                    <td>{{ $logins->TELEPHONE }}</td>
                                    <td>{{ $logins->AGENCY }}</td>
                                    <td>{{ $logins->POSITION }}
                                    <td>
                                        @if ($logins->IS_ACTIVE == 0)
                                        <form style="display: inline-block" method="POST"
                                                action="{{ route('activeuser', $logins->LOGIN_ID) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="POST">
                                                <button type="submit"
                                                    class="btn  btn-success  show-alert-delete-box "
                                                    data-toggle="tooltip" title='ACTIVE'><i class='fas fa-check-circle'></i></button>
                                         </form>
                                    @else
                                    <span class="badge bg-success">Active</span>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
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
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            text-align: 'center',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>

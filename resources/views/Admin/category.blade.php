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
                    <h6 class="mb-0">Category</h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Open modal
                      </button>

                      <!-- The Modal -->
                      <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Create Category</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form id="signUpForm" method="post" action="{{ route('category.save') }}">
                                    @csrf
                                        {{-- Project Name / Target --}}
                                        <div class="row mb-5 mb-sm-0" style="color: black">
                                            <div class=" mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Category Name</label>
                                                <input type="text" name="category_name" class="form-control" id="projectName">
                                            </div>
                                            <button type="submit" name="submit"  class="btn btn-success">SAVE</button>
                                        </div>
                                    </div>
                                    <!-- end previous / next buttons -->
                                </form>
                            </div>

                            <!-- Modal footer -->

                          </div>
                        </div>
                      </div>
                    {{-- <a href="{{route('createcategory')}}"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="add category"><i class="fa fa-plus" aria-hidden="true"></i></button></a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th style="text-align: center;" scope="col">ID</th>
                                <th style="text-align: center;" scope="col">Name Category</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                                @foreach ( $Category as $Categorys )
                                <tr style="text-align: center">
                                    <td >{{$Categorys->CATEGORY_ID}}</td>
                                    <td>{{$Categorys->NAME_CATEGORY}}</td>
                                    <td class="">
                                        <a class="btn btn-warning btn-sm2" data-toggle="tooltip" title="edit project"
                                        href="">
                                        <i class="fas fa-pencil-alt" style="font-size: 20;">
                                        </i>
                                         </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete project"
                                        href="">
                                        <i class="fas fa-trash" style="font-size: 20;">
                                        </i>
                                         </a>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $('.btn-sm2').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        Swal.fire({
            title: 'Edit ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })

</script>

</html>

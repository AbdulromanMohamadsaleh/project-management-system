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
                        <i class="fa fa-plus" aria-hidden="true"></i>
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
                                        <div class="row mb-5 mb-sm-0">
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
                                        <button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal" data-bs-target="#Modal{{$Categorys->CATEGORY_ID}}">
                                            <i class="fas fa-pencil-alt" style="font-size: 15px;">
                                            </i></button>

                                          <!-- The Modal -->
                                          <div class="modal" id="Modal{{$Categorys->CATEGORY_ID}}">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Edit Category</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form id="signUpForm" method="post" action="{{ route('category.update',$Categorys->CATEGORY_ID) }}">
                                                        @csrf
                                                            {{-- Project Name / Target --}}
                                                            <div class="row mb-5 mb-sm-0">
                                                                <div class=" mb-sm-5">
                                                                    <label class="label-left fw-bold mb-2" for="projectName">Category Name</label>
                                                                    <input value="{{$Categorys->NAME_CATEGORY}}" type="text" name="category_name" class="form-control" id="projectName">
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
                                         <form style="display: inline-block" method="POST"
                                                action="{{ route('category.delete', $Categorys->CATEGORY_ID) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                                                    data-toggle="tooltip" title='Delete'><i class="bi bi-trash"  style="font-size: 15px;"></i></button>
                                            </form>
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


@include('include.scrip');
<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel", "Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
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

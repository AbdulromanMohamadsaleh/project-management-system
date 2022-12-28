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
                    <h6 class="mb-0">Holyday</h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fa fa-plus" aria-hidden="true"></i></button>
                    </button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Holyday</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="signUpForm" method="post" action="{{ route('holyday.save') }}">
                                        @csrf
                                        {{-- Project Name / Target --}}
                                        <div class="row mb-5 mb-sm-0">
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="projectName">Holyday
                                                    Name</label>
                                                <input type="text" name="holyday_name" class="form-control"
                                                    id="projectName">
                                            </div>
                                            <div class="col-md-6 mb-sm-5">
                                                <label class="label-left fw-bold mb-2" for="target">Date
                                                    Holyday</label>
                                                <input type="date" name="date_holyday" class="form-control"
                                                    id="target">
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
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th style="text-align: center;" scope="col">Holyday Name</th>
                                <th style="text-align: center;" scope="col">Date Holyday</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holydays as $Holyday)
                                <tr>
                                    <td style="text-align:left">{{ $Holyday->HOLYDAY_NAME }}</td>
                                    <td style="text-align:center">{{ $Holyday->HOLYDAY_DATE }}</td>
                                    </center>
                                    <td class="project-actions text-right">
                                        <button type="button" class="btn btn-warning btn-sm2" data-bs-toggle="modal"
                                            data-bs-target="#Modal{{ $Holyday->HOLYDAY_ID }}">
                                            <i class="fas fa-pencil-alt" style="font-size: 15px;">
                                            </i></button>

                                        <!-- The Modal -->
                                        <div class="modal" id="Modal{{ $Holyday->HOLYDAY_ID }}">
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
                                                        <form id="signUpForm" method="post"
                                                            action="{{ route('holyday.update', $Holyday->HOLYDAY_ID) }}">
                                                            @csrf
                                                            {{-- Project Name / Target --}}
                                                            <div class="row mb-5 mb-sm-0">
                                                                <div class="col-md-6 mb-sm-5">
                                                                    <label class="label-left fw-bold mb-2"
                                                                        for="holyday_name">Holyday Name</label>
                                                                    <input type="text" name="holyday_name"
                                                                        class="form-control" id="holyday_name"
                                                                        value="{{ $Holyday->HOLYDAY_NAME }}">
                                                                </div>
                                                                <div class="col-md-6 mb-sm-5">
                                                                    <label class="label-left fw-bold mb-2"
                                                                        for="target">Date Holyday</label>
                                                                    <input type="date" name="date_holyday"
                                                                        value="{{ $Holyday->HOLYDAY_DATE }}"
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

                <form style="display: inline-block" method="POST"
                    action="{{ route('holyday.delete', $Holyday->HOLYDAY_ID) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm"
                        data-toggle="tooltip" title='Delete'><i class="bi bi-trash"
                            style="font-size: 15px;"></i></button>
                </form>

                </td>
                </tr>
                @endforeach


                </tbody>
                </table>
            </div>
            {{-- <a href="{{route('addholyday')}}"><button type="button" class="btn btn-primary" data-toggle="tooltip" title="add holyday"><i class="fa fa-plus" aria-hidden="true"></i></button></a> --}}
        </div>
    </div>
    </div>
    <!-- Recent Sales End -->



</body>
@include('include.scrip');


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
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
    // $('.btn-sm2').on('click', function(e) {
    //     e.preventDefault();
    //     const href = $(this).attr('href')
    //     Swal.fire({
    //         title: 'Edit ?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'OK',
    //         cancelButtonText: 'CANCEL'
    //     }).then((result) => {
    //         if (result.value) {
    //             document.location.href = href;
    //         }
    //     })
    // })
</script>

</html>

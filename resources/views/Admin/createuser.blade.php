@extends('layouts.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
         <h1 class="fw-bold text-center fs-4">Users</h1>
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                {{-- <h6 class="mb-0">Recent Salse</h6> --}}
                @include('createuser.include.createuser')
            </div>
            <div class="table-responsive">
                @include('createuser.include.tableuser')
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('include.scrip')

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
                text - align: 'center',
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
    @include('alert.alert')
@endsection

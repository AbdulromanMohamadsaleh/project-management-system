@extends('layouts.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="fw-bold text-center fs-4">Projects</h1>

        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
            </div>
            <div class="table-responsive">
                @include('table_project.table_project')
            </div>
        </div>
    </div>
@endsection


@section('script')
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
    @include('alert.alert');
@endsection

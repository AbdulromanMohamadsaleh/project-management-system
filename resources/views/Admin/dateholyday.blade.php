@include('include.header')

<body>
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
                    @include('holyday.inlude.ceateholyday')
                </div>
                <div class="table-responsive">
                    @include('holyday.inlude.tableholyday')
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
    // }


    //  Create Holy Day

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var createHolyDayForm = document.querySelector('#createHolyDayForm');

    $("#submitCreateHolyDay").click(function(e) {

        e.preventDefault();

        var dataform = new FormData(createHolyDayForm);
        $.ajax({
            method: 'POST',
            processData: false,
            contentType: false,
            url: "{{ route('holyday.save') }}",
            data: dataform,
            success: function(response) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.success,
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                })

                let holyDaysResponse = JSON.parse(response.data);
                document.querySelector('#create_holyday_name').value = ""
                document.querySelector('#create_date_holyday').value = ""
                // document.querySelector('#myModal').style.display = "none"
                $('#myModal').modal('hide')
                $('#refresher').load(location.href + ' #refresher')

                setTimeout(() => {
                    $('#example').DataTable()
                }, 1000);

                // document.querySelector('body').classList.remove('modal-open')
                // document.querySelector('.modal-backdrop').remove()
            },

            error: function(error) {


                document.querySelector('#create_holyday_name_error').innerHTML = error.responseJSON
                    .errors.create_holyday_name
                document.querySelector('#create_date_holyday').innerHTML = error.responseJSON.errors
                    .create_date_holyday

            }
        });

    });
</script>

</html>

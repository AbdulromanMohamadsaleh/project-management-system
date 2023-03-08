@extends('layouts.master')

@section('content')
    <div class="container-fluid pt-4 px-4">
           <h1 class="fw-bold text-center fs-4">Holiday</h1>
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="category-filter">
                    <select style="right: -70%;width: 30%;position: relative;top: 10px;" id="categoryFilter"
                        class="form-control">
                        <option value="">Years</option>
                        @foreach ($data['years'] as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <h6 class="mb-0">Holiday</h6> --}}
                @include('holyday.inlude.ceateholyday')
            </div>
            <div class="table-responsive">
                @include('holyday.inlude.tableholyday')
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('include.scrip');
    <!-- Template Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
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

                    $('#myModal').modal('hide')
                    setTimeout(() => {
                       location.reload();
                    }, 2000);
                },

                error: function(error) {
                    let holyDayNameErrorMessage = error.responseJSON.errors.create_holyday_name;
                    let holyDayNameErrorElement = document.querySelector('#create_holyday_name_error');

                    let holyDayDateErrorMessage = error.responseJSON.errors.create_date_holyday;
                    let holyDayDateErrorElement = document.querySelector('#create_date_holyday_error');

                    if (holyDayNameErrorMessage) {

                        holyDayNameErrorElement.innerHTML = holyDayNameErrorMessage
                    }

                    if (holyDayDateErrorMessage) {
                        holyDayDateErrorElement.innerHTML = holyDayDateErrorMessage
                    }


                    setTimeout(() => {
                        holyDayNameErrorElement.innerHTML = ""
                        holyDayDateErrorElement.innerHTML = ""
                    }, 5000);


                }
            });

        });

        $("#choice").change(function() {
            $("#table tbody tr").hide();
            $("#table tbody tr." + $(this).val()).show('fast');
        });

        //this JS calls the tablesorter plugin that we already use on our site
        $("#table").tablesorter({
            sortList: [
                [0, 0]
            ]
        });


        $("#choice").change(function() {
            $("#table tbody tr").hide();
            $("#table tbody tr." + $(this).val()).show('fast');
        });
        //this JS calls the tablesorter plugin that we already use on our site
        $("#table").tablesorter({
            sortList: [
                [0, 0]
            ]
        });
    </script>
    @include('alert.alert')
@endsection

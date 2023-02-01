@include('include.header')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet" />
{{-- //Sort --}}
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


@php

    function ConvertDaysToWeek($days)
    {
        $weeks = intval($days / 7);
        $days = $days % 7;
        $result = '';
        if ($weeks) {
            if ($weeks == 1) {
                $result = $weeks . ' week';
            } else {
                $result = $weeks . ' weeks';
            }
        }
        if ($days) {
            if ($weeks) {
                $result = $result . ' and ';
            }

            if ($days == 1) {
                $result = $result . $days . ' day';
            } else {
                $result = $result . $days . ' days';
            }
        }
        return $result;
    }
@endphp

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
        @include('include.navbar')<br>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <dt><b class="border-bottom border-primary mt-1">View Project</b></dt>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
        <div class="container-fluid py-5">
            <!-- Recent Sales Start -->
            <div class="container mt-3 ">
                <div class="row">
                    @include('project.show.include.stepper_timeline')
                </div>

                <div class="row">
                    @include('project.show.include.project_detail_card')
                </div>

                <div class="container  mt-3">
                    <div class="col">
                        @include('project.show.include.project_team_card')
                    </div>
                    <div class="col mt-3 p-2">
                        @include('project.show.include.tab_project')
                    </div>
                </div>

            </div>

            <br>

        </div>

    </div>

    </div>

</body>
@include('include.scrip');
@include('alert.alert')

<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="toggle"]').click(function() {
            $(this).parents().next(".tbl-accordion-body").toggle();
        });
    });
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to make this action?",
            text: "If you active this, it will be gone forever.",
            icon: "success",
            type: "success",
            buttons: ["Cancel", "Yes!"],
            cancelButtonColor: '#DD6B55',
            confirmButtonColor: 'blue',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
<script src="{{ asset('js/order_list.js') }}"></script>
<script src="{{ asset('js/script.js') }}" type="module" defer></script>

</html>
<style>
    table {
        width: 800px;
        border-collapse: collapse;
    }

    th {
        background: #3498db;
        color: white;
        font-weight: bold;
    }

    td,
    th {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-size: 18px;
    }

    .tbl-accordion-header a {
        color: black !important;
    }

    .tbl-accordion-body {
        display: none;
    }

    .tbl-accordion-body td {
        border-bottom: 0px;
    }

    .tbl-accordion-body tr:last-child {
        border-bottom: 1px solid #ccc;
    }

    .bd-callout {
        padding: 1.25rem;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        border: 1px solid #eee;
        border-left-width: .25rem;
        border-radius: .25rem
    }

    .bd-callout-primary {
        border-left-color: #007bff
    }

    dd {
        margin-bottom: 2rem;

    }

    .swal-footer {
        text-align: center;
    }

    .swal-button--confirm {
        background-color: #3AAB20;
        color: white
    }

    .stepper-wrapper {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stepper-item {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;

        @media (max-width: 768px) {
            font-size: 12px;
        }
    }

    .stepper-item::before {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: -50%;
        z-index: 2;
    }

    .stepper-item::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #ccc;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 2;
    }

    .stepper-item .step-counter {
        position: relative;
        z-index: 5;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin-bottom: 6px;
    }

    .stepper-item.active {
        font-weight: bold;
    }

    .stepper-item.completed .step-counter {
        background-color: #78e770;
    }

    .stepper-item.completed::after {
        position: absolute;
        content: "";
        border-bottom: 2px solid #4bb543;
        width: 100%;
        top: 20px;
        left: 50%;
        z-index: 3;
    }

    .stepper-item:first-child::before {
        content: none;
    }

    .stepper-item:last-child::after {
        content: none;
    }
</style>

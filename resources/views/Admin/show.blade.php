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


    .taskRow {
        height: 90px;
    }
</style>

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
@extends('layouts.master')

@section('content')
    <div class="container-fluid p-5">
        @if ($project_detail->STATUS == 4)
            <div style="height: 100px;" class="alert alert-danger d-flex align-items-center" role="alert">
                <div class=" text-center" style="width: 100%;">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span>The Project Has been <b>Canceled</b> You Can't Make any Action</span>
                </div>
            </div>
        @endif
        <h1 class="fw-bold text-center fs-4 "> {{ $project_detail->NAME_PROJECT }} Project </h1>
        <div class="row">

            <div class="col-sm-6">
            </div>
        </div>
    </div>
    <div class="container-fluid py-2">
        <!-- Recent Sales Start -->
        <div class="container mt-3 ">
            <div class="row mb-3">
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
@endsection

@section('script')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet" />
    {{-- //Sort --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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

    <!-- Multi-select boxes (pillbox) Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.multi-task').each(function(i, obj) {
                console.log($('#projectTeam-' + i))
                $('#projectTeam-' + i).select2({

                    dropdownParent: $('.myModal2-' + i)
                });

            });
        });
    </script>



    <script src="{{ asset('js/script.js') }}" type="module" defer></script>

    <!-- script Get End Date -->
    <script>
        let editStartDateInputs = document.querySelectorAll('input[name="edit_satart_date"]');
        let ExpectedEndDateInputs = document.querySelectorAll('input[name="Expected_End_Date"]');
        let ProjectEndDateValue = document.getElementById('Project_End_Date').value;

        let errorEditTaskContainer = document.querySelectorAll('.alert-error');


        let dayInputs = document.querySelectorAll('input[name="day"]');


        let includeHoliday = <?php echo $project_detail->INC_HOLIDAY; ?>;
        let IncludeWeekend = <?php echo $project_detail->INC_WEEKEND; ?>;
        var HolyDays = JSON.parse(document.querySelector("#HolyDays").value);

        HolyDaysDate = HolyDays.map(h => h.HOLYDAY_DATE);

        editStartDateInputs.forEach((element, index) => {

            element.addEventListener("change", function() {

                let result = updateEndDateGeneral(dayInputs[index].value, this.value, IncludeWeekend,
                    includeHoliday);

                let endDateTask = new Date(result);
                let endDateProject = new Date(ProjectEndDateValue);
                let errorMessage = ` <i class="bi bi-exclamation-triangle-fill me-3"></i>
                                <div class="text-center">
                                    <p>Task End Date (${convertToHtmlDateFormat(result)}) <br>Exceed Project End Date (${ProjectEndDateValue}).</p>
                                </div>`;



                if (endDateTask < endDateProject) {
                    ExpectedEndDateInputs[index].value = convertToHtmlDateFormat(result);
                    if (!errorEditTaskContainer[index].classList.contains('d-none')) {
                        errorEditTaskContainer[index].classList.add('d-none')
                    }
                } else {
                    if (errorEditTaskContainer[index].classList.contains('d-none')) {
                        errorEditTaskContainer[index].classList.remove('d-none')
                    }
                    errorEditTaskContainer[index].innerHTML = errorMessage;
                }

            });


        });

        dayInputs.forEach((element, index) => {

            element.addEventListener("input", function() {

                if (editStartDateInputs[index] != null) {
                    let result = updateEndDateGeneral(this.value, editStartDateInputs[index].value,
                        IncludeWeekend,
                        includeHoliday);

                    ExpectedEndDateInputs[index].value = convertToHtmlDateFormat(result);
                }
            });


        });


        function updateEndDateGeneral(a, startDate, IncludeWeekend, includeHoliday) {

            if (a == 0)
                return removePublicHolyday(HolyDays, startDate, startDate);

            let amount = a;

            if (amount > 1)
                amount = amount - 1;

            if (amount == '')
                amount = 0;

            let projectEnd;

            projectEnd = addDays(startDate, parseInt(amount), IncludeWeekend)

            if (includeHoliday) {

                projectEnd = removePublicHolyday(HolyDays, startDate, projectEnd);

            }

            return projectEnd;


        }

        function addDays(date, days, IncludeWeekend) {
            TotalDaysToComplateProject = days;

            if (days > 10000 || days == 0 || days == "")
                return new Date();

            var result = new Date(date);
            result.setDate(result.getDate() + days);

            rWorkingDays = 0;

            if (IncludeWeekend == 0) {
                rWorkingDays = workingDays(date, result);
                // if number of working days != Number User enter days
                while (rWorkingDays != days) {
                    result.setDate(result.getDate() + (days - rWorkingDays));
                    rWorkingDays = workingDays(date, result);
                    if (rWorkingDays > days) {
                        break;
                    }
                }
            }

            return result;
        }



        function pad(d) {
            return (d < 10) ? '0' + d.toString() : d.toString();
        }

        function convertToHtmlDateFormat(result) {
            let months = result.getMonth() + 1;
            newDate = '';
            newDate += result.getFullYear() + '-';

            if (result.getMonth() < 10) {
                newDate += pad(months) + '-'

            } else {
                newDate += months + '-';
            }

            if (result.getDate() < 10) {
                newDate += pad(result.getDate())
            } else {
                newDate += result.getDate()
            }

            return newDate;
        }

        function workingDays(fromDate, toDate) {
            fromDate = new Date(fromDate);
            toDate = new Date(toDate);

            // ensure that the argument is a valid and past date
            if (!fromDate || isNaN(fromDate) || toDate < fromDate) {
                return -1;
            }

            // clone date to avoid messing up original date and time
            var frD = new Date(fromDate.getTime()),
                toD = new Date(toDate.getTime()),
                numOfWorkingDays = 1;

            // reset time portion
            frD.setHours(0, 0, 0, 0);
            toD.setHours(0, 0, 0, 0);

            while (frD < toD) {
                frD.setDate(frD.getDate() + 1);
                var day = frD.getDay();
                if (day != 0 && day != 6) {
                    numOfWorkingDays++;
                }
            }
            return numOfWorkingDays - 1;
        };


        function isWeekEnd(date) {
            var dayOfWeek = date.getDay();
            return (dayOfWeek === 6) || (dayOfWeek === 0); // 6 = Saturday, 0 = Sunday
        }

        function removePublicHolyday(HolyDaysDate, startDate, endDate) {
            // chick if holy days include in the duration

            for (i = 0; i < HolyDaysDate.length; i++) {
                if (checkDateIsInclude(startDate, endDate, HolyDaysDate[i])) {
                    var endDate = new Date(endDate);
                    endDate.setDate(endDate.getDate() + 1);

                    while (isWeekEnd(endDate)) {
                        endDate.setDate(endDate.getDate() + 1);
                    }
                }

            }

            return new Date(endDate)


        }


        function checkDateIsInclude(from, to, check) {

            var fDate, lDate, cDate;
            fDate = Date.parse(from);
            lDate = Date.parse(to);
            cDate = Date.parse(check);

            if ((cDate <= lDate && cDate >= fDate)) {
                return true;
            }
            return false;
        }
    </script>
@endsection

<style>
    /* Variables */
    $l1-color: #ffffff;
    $l2-color: #e3e1e1;
    $l3-color: #c8c3c4;
    $d1-color: #424242;
    $a1-color: #722f37;
    $thicker: 800;
    /* Table Settings */


    .nestedTable {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;

        th {
            background: $d1-color;
            color: $l1-color;
            padding: 2px;
        }

        td,
        th {
            text-align: center;
        }

        /* // column sizing */
        .tinyCol {
            width: 2.5%;
        }

        .smallCol {
            width: 5%;
        }

        .mediumCol {
            width: 15%;
        }

        .largeCol {
            width: 20%;
        }

        .xlargeCol {
            width: 25%;
        }

        /* // header style */
        .header {
            font-weight: $thicker;
        }

        .pending {
            color: $a1-color;
            font-weight: $thicker;
            font-style: italic;
        }

        /* // drop-down style */
        tr {
            background-color: $l2-color;
            border: 1px solid $l3-color;
        }

        /* // cordinates with responsive size both must be */
        @media only screen and (min-width: 767px) {
            tr:nth-child(3n+1) {
                background-color: $l1-color;
                border: none;
            }
        }
    }

    /* // hide on toggle */
    .display-none {
        display: none;
    }

    /* // button style */
    .showMore {
        color: $d1-color;
        text-decoration: none;

        &:hover {
            color: $d1-color;
            text-decoration: none;
            cursor: pointer;
        }
    }

    /* // Responsive Design */
    @media only screen and (max-width: 767px) {

        /* // uses the data label as header */
        td:nth-of-type(n):before {
            content: attr(data-label);
        }

        /* // zebra striping */
        tr {

            &:nth-child(6n+1),
            &:nth-child(6n+3) {
                background-color: $l1-color;
            }
        }

        /* // hides elements on mobile */
        /* .hideOnMobile {
            position: absolute;
            top: -9999px;
            left: -9999px;
            display: none;
        }

        .nestedTable .spacer,
        tr .spacer {
            display: none;
        } */

        /* // changes table layout */
        .nestedTable {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* // hide table headers */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;

            }

            td {
                /* // behaves  like a "row" */
                border: none;
                border-bottom: 1px solid $l3-color;
                position: relative;
                padding-left: 50%;

                &:before {
                    /* // now like a table header */
                    position: absolute;
                    /* // top/left values mimic padding */
                    left: 6px;
                    width: 45%;
                    white-space: nowrap;
                    font-weight: $thicker;
                }
            }

            .tinyCol,
            .smallCol,
            .mediumCol,
            .largeCol,
            .xlargeCol {
                width: auto;
            }
        }
    }

    .toggleArror:hover {
        cursor: pointer
    }
</style>


<div class="col mt-4">
    <div class="row">
        <div class="col">
            <b>Total Date = {{ ConvertDaysToWeek($project_detail->TotalDays) }}
            </b><br>
            <b><span class="{{ $project_detail->BUDGET < $project_detail->TotalBudget ? 'text-danger' : '' }}">Total
                    Budget =
                    {{ $project_detail->TotalBudget }}฿</span>
            </b>
            <b class="ms-3">
                @if ($project_detail->BUDGET < $project_detail->TotalBudget)
                    <span class="text-danger">Budget Exceed:
                        {{ $project_detail->TotalBudget - $project_detail->BUDGET }}฿</span>
                @else
                    <span class="text-success">Budget Remainning:
                        {{ $project_detail->BUDGET - $project_detail->TotalBudget }}฿</span>
                @endif
            </b>
        </div>
        <div class="col-1">
            @include('edit_activity_task.add_activity_task')
        </div>


    </div>


    {{-- <table>
        <thead>
            <tr>
                <th></th>
                <th>Activity</th>
                <th>Duration</th>
                <th>Start Date</th>
                <th>Action</th>
                <th>Status</th>
                <th>Quality Work</th>
            </tr>
        </thead>
        <tbody>
        <tbody class="tbl-accordion-header">
            @php
                $i = 1;
            @endphp
            @foreach ($project_detail->activity as $act)
                @php
                    $sum = 0;

                    foreach ($act->tasks as $task) {
                        $sum += intval($task->DAY);
                    }
                @endphp
                <tr>
                    <td>
                        <a data-toggle="toggle"><strong><i class='fas fa-angle-down'></i></strong></a>
                    </td>
                    <td style="text-align: left">
                        <strong>{{ $i++ }}.{{ $act->ACTIVITY_NAME }}</strong>
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                            </button>
                        @endif

                    </td>
                    <td>{{ ConvertDaysToWeek($sum) }} </td>
                    @php
                        if ($act->START_DATE) {
                            $result = explode(' ', $act->START_DATE);
                        }
                    @endphp
                    <td>{{ $act->START_DATE ? $result[0] : '-' }}</td>
                    <td>@include('edit_activity_task.modal_edit_activity')
                        @include('edit_activity_task.delate_activity')
                    </td>
                    <td>

                        @if ($act->STATUS == 1)
                            <b class="text-success"> Completed</b>
                        @else
                            <b>-</b>
                        @endif
                    </td>
                </tr>
                @php
                    $o = 1;
                @endphp
        <tbody class="tbl-accordion-body">

            @foreach ($act->tasks as $task)
                <tr>
                    <td></td>
                    <td style="margin:10px;text-align: left ">{{ $i - 1 . '.' . $o++ }}
                        {{ $task->TASK_NAME }} </td>
                    <td>{{ $task->DAY }} Days
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                        @endif
                    </td>
                    <td>
                        @php
                            $result = [0];
                        @endphp
                        @if ($task->START_DATE)
                            @php
                                if ($act->START_DATE) {
                                    $result = explode(' ', $act->START_DATE);
                                }
                            @endphp
                            {{ $result[0] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @include('Admin.button_startdate_complatedate.button')
                        @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                        @endif
                        @include('modal_budget_note.modal_budget')
                        @include('modal_budget_note.modal_note')
                        @include('edit_activity_task.edit_activity_task')
                        @include('edit_activity_task.delate_task')
                    </td>
                    <td>
                        @if ($task->STATUS == 1)
                            @php
                                $TASK_TRACKER = explode(',', $task->TASK_TRACKER);
                            @endphp
                            <div class="me-3">
                                <div>
                                    {{ $TASK_TRACKER[0] }}
                                </div>
                                <div>
                                    {{ $TASK_TRACKER[1] }}
                                </div>
                            </div>
                        @endif
                    </td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
        @endforeach
        </tbody>

        </tbody>
    </table> --}}
    <div class="row " style="overflow: auto">
        <table style="width: -webkit-fill-available;" class="mt-3 nestedTable">
            <thead>
                <tr>
                    <th class="spacer ">
                        <br>
                    </th>
                    <th class="">#</th>
                    <th class="">Activity</th>
                    <th class="">Duration</th>
                    <th>Start Date</th>
                    <th>Action</th>
                    <th class="">Status</th>
                    <th>Quality Work</th>
                </tr>
            </thead>
            <tr>
                <tbody id="myList" class="sortable">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($project_detail->activity as $act)
                        @php
                            $sum = 0;

                            foreach ($act->tasks as $task) {
                                $sum += intval($task->DAY);
                            }
                        @endphp
                        {{-- Start Act 1 --}}
                        {{-- Start Act Info --}}
                        {{-- <input id="actId" type="text" value="{{ $act->ACTIVITY_ORDER }}" hidden> --}}
                        <div class="act-order">
                            <tr>
                                <td style="font-size: 1.6rem;" class="spacer ">
                                    <i id="showMore" data-id="{{ $act->ACTIVITY_ID }}" class="toggleArror showMore fa fa-angle-double-right"></i>
                                </td>
                                <td><b>{{ $act->ACTIVITY_ORDER }}.</b></td>
                                <td>{{ $act->ACTIVITY_NAME }}</td>
                                <td>{{ ConvertDaysToWeek($sum) }}</td>
                                @php
                                    if ($act->START_DATE) {
                                        $result = explode(' ', $act->START_DATE);
                                    }
                                @endphp
                                <td>{{ $act->START_DATE ? $result[0] : '-' }}</td>
                                <td>
                                    @include('edit_activity_task.modal_edit_activity')
                                    @include('edit_activity_task.delate_activity')
                                </td>
                                <td>
                                    @if ($act->STATUS == 1)
                                        <b class="text-success"> Completed</b>
                                    @else
                                        <b>-</b>
                                    @endif
                                </td>
                                <td>Bad</td>
                            </tr>
                        </div>
                        {{-- End Act Info --}}


                        <tr class="display-none" style="background: #eaeaef;" class=" subt hideOnMobile">
                            <td class="spacer header">
                                <br>
                            </td>
                            <td class="spacer header"><b>#</b></td>
                            <td class="header"><b>Task Name</b></td>
                            <td class="header"><b>Duration</b></td>
                            <td class="header"><b>Start Date </b></td>
                            <td class="header"><b>Action</b></td>
                            <td class="header"><b>Status</b></td>
                            <td class="spacer header"><b>Quality Work</b></td>
                        </tr>
                        {{-- Start Task 1 --}}
                        @php
                            $o = 1;
                        @endphp

                        @foreach ($act->tasks as $task)
                            <tr id="showTasks{{ $act->ACTIVITY_ID }}" class="display-none"
                                style="background: #f9f9f9;">
                                <td class="spacer" <br></td>
                                <td class="spacer">
                                    {{ $act->ACTIVITY_ORDER . '.' . $o++ }}
                                </td>
                                <td>{{ $task->TASK_NAME }} </td>
                                <td>{{ $task->DAY }} Days</td>
                                <td>
                                    @php
                                        $result = [0];
                                    @endphp
                                    @if ($task->START_DATE)
                                        @php
                                            if ($act->START_DATE) {
                                                $result = explode(' ', $act->START_DATE);
                                            }
                                        @endphp
                                        {{ $result[0] }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @include('Admin.button_startdate_complatedate.button')
                                    @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                                    @endif
                                    @include('modal_budget_note.modal_budget')
                                    @include('modal_budget_note.modal_note')
                                    @include('edit_activity_task.edit_activity_task')
                                    @include('edit_activity_task.delate_task')
                                </td>
                                <td>
                                    @if ($task->STATUS == 1)
                                        @php
                                            $TASK_TRACKER = explode(',', $task->TASK_TRACKER);
                                        @endphp
                                        <div class="me-3">
                                            <div>
                                                {{ $TASK_TRACKER[0] }}
                                            </div>
                                            <div>
                                                {{ $TASK_TRACKER[1] }}
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="spacer">
                                    <br>
                                </td>
                            </tr>
                        @endforeach


                        {{-- End Task 1 --}}

                        {{-- End Act 1 --}}
                    @endforeach

                </tbody>
            </tr>
        </table>
    </div>
</div>






<script>
    // $(".showMore").click(function() {
    //     var tr = $(this).parent().parent().nextAll('#showTasks');
    //     $(this).toggleClass('fa-angle-double-right fa-angle-double-down')
    //     if (tr.is(".display-none")) {
    //         tr.removeClass('display-none');
    //     } else {
    //         tr.addClass('display-none');
    //     }
    // })

    $(".showMore").click(function() {
        // var actId = $(this).parent().parent().nextAll('#actId');
         var actId = $(this).data( "id" );

        console.log(actId)
        var tr = $(this).parent().parent().nextAll('#showTasks' + actId);
        $(this).toggleClass('fa-angle-double-right fa-angle-double-down')
        if (tr.is(".display-none")) {
            tr.removeClass('display-none');
        } else {
            tr.addClass('display-none');
        }
    })

    // showMoreButton = document.querySelectorAll('[id = "showMore"]');

    // showMoreButton.forEach((element, indx) => {
    //     element.addEventListener("click", (e) => {

    //         showTasksButton = document.querySelectorAll('[id = "showTasks"]');
    //         // showTasksHeaderButton = document.querySelectorAll('[id = "showTasksHeader"]');

    //         e.target.classList.toggle('fa-angle-double-right')
    //         e.target.classList.toggle('fa-angle-double-down')

    //         if (showTasksButton[indx].classList.contains("display-none")) {
    //             // showTasksHeaderButton[indx].classList.remove('display-none');
    //             showTasksButton[indx].classList.remove('display-none');
    //         } else {
    //             // showTasksHeaderButton[indx].classList.add('display-none');
    //             showTasksButton[indx].classList.add('display-none');
    //         }
    //     })
    // });
</script>

<script>
    function updateOrder() {
        $('.sortable  .order').each(function(index) {
            $(this).val(index + 1);
        });
    }

    $(document).ready(function() {
        $(".sortable").sortable({
            update: function(event, ui) {
                updateOrder();
            }
        });
    });


    $('#toggleSortable').click(function() {
        if ($("#myList").sortable("instance")) {
            $("#myList").sortable("destroy");
            console.log("default")
            $(this).addClass("active")

            $("#myList ").addClass("cs")
            $("#myList ").removeClass("ds");
            $("#myList").removeClass("sortable").addClass("disabledd");


        } else {
            $("#myList").sortable();
            $(this).removeClass("active")
            $("#myList ").addClass("ds")
            $("#myList ").removeClass("cs");
            $("#myList").removeClass("disabled").addClass("sortable");
            $(".sortable").sortable({
                update: function(event, ui) {
                    updateOrder();
                }
            });

        }
    })
</script>

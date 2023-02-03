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

    .glyphicon-move {
        cursor: move;
        cursor: -webkit-grabbing;
    }

    .glyphicon-move-tasks {
        cursor: move;
        cursor: -webkit-grabbing;
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
    <div class="mt-4 row refresher " style="overflow: auto">
        <table class="tasklists" style="width: -webkit-fill-available;" class="mt-3 nestedTable">
            <thead>
                <tr>
                    <th class="spacer ">
                        <br>
                    </th>
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
                <tbody id="myList" class=" sortable">
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

                            <tr class="act-rows">
                                <td style="border-right: 1px solid #ccc;">
                                    <i style="font-size: 1.3rem;" class="bi bi-list glyphicon-move mr-4"></i>
                                </td>
                                <td style="font-size: 1.6rem;" class="spacer ">

                                    <i id="showMore" data-id="{{ $act->ACTIVITY_ID }}"
                                        class=" toggleArror showMore showMore-{{ $act->ACTIVITY_ID }} fa fa-angle-double-right"></i>

                                    <span hidden data-activityId="{{ $act->ACTIVITY_ID }}" id="activityId"></span>

                                    {{-- <span data-activityId="{{ $act->ACTIVITY_ID }}" hidden id="projectId"></span> --}}

                                </td>
                                <td><b class="order"
                                        id="act-order-{{ $act->ACTIVITY_ID }}">{{ $act->ACTIVITY_ORDER }}.</b></td>
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
                            <th class="spacer ">
                                <br>
                            </th>
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


                        <div class="tsk-order">

                            @foreach ($act->tasks as $task)
                                <tr id="showTasks{{ $act->ACTIVITY_ID }}"
                                    class="tasksOrder taskRow display-none taskRow-{{ $act->ACTIVITY_ID }}"
                                    style="background: #f9f9f9;">

                                    <td style="border-right: 1px solid #ccc;">
                                        <br>
                                    </td>
                                    <td class="spacer">
                                        <i style="font-size: 1.3rem;" class="bi bi-list glyphicon-move-tasks mr-4"
                                            data-activityId="{{ $act->ACTIVITY_ID }}"></i>

                                    </td>
                                    <td class="spacer order-task">
                                        {{ $act->ACTIVITY_ORDER }}.<span class="orderNumber"
                                            data-task-id-for-order="{{ $task->TASK_ID }}">{{ $o++ }}</span>
                                    </td>
                                    <td>{{ $task->TASK_NAME }} </td>
                                    <td>{{ $task->DAY }} Days</td>
                                    <td>
                                        @php
                                            $result = [0];
                                        @endphp
                                        @if ($task->START_DATE)
                                            @php
                                                $result = explode(' ', $task->START_DATE);
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

                        </div>


                        {{-- End Task 1 --}}

                        {{-- End Act 1 --}}
                    @endforeach

                </tbody>
            </tr>
        </table>
    </div>



</div>







<script>
    function ToggleTableArror() {
        // var actId = $(this).parent().parent().nextAll('#actId');
        var actId = $(this).data("id");
        var tr = $(this).parent().parent().nextAll('#showTasks' + actId);
        $(this).toggleClass('fa-angle-double-right fa-angle-double-down')
        if (tr.is(".display-none")) {
            tr.removeClass('display-none');
        } else {
            tr.addClass('display-none');
        }
    }

    function ToggleAllTableArrorAnHideTasksRow() {
        let trRow = $('.taskRow');
        let showMoreArror = $('.showMore');

        trRow.each((index) => {
            if (!trRow[index].classList.contains(".display-none")) {
                trRow[index].classList.add('display-none');
                showMoreArror.each((index) => {
                    if (!showMoreArror[index].classList.contains(".fa-angle-double-right")) {
                        showMoreArror[index].classList.add('fa-angle-double-right');
                        showMoreArror[index].classList.remove('fa-angle-double-down');
                    }
                })
                // $(this).toggleClass('fa-angle-double-right ')
            }
        })
    }

    function ToggleAllTableArrorAnHideTasksRowV2() {
        let actId = $(this).data("activityid");
        let currentRow = $(`.showMore-${actId}`);
        let rrr = $(this.closest(".taskRow"))
        let id = rrr[0].id;
        let trRow = $('.taskRow');
        let showMoreArror = $('.showMore');

        trRow.each((index) => {

            if (!trRow[index].classList.contains(".display-none") && trRow[index].id != id) {
                trRow[index].classList.add('display-none');
                showMoreArror.each((index2) => {
                    if (!showMoreArror[index2].classList.contains(".fa-angle-double-right")) {
                        showMoreArror[index2].classList.add('fa-angle-double-right');
                        showMoreArror[index2].classList.remove('fa-angle-double-down');
                    }
                })

                // $(this).toggleClass('fa-angle-double-right ')
            }



        })

        if (!currentRow[0].classList.contains(".fa-angle-double-down")) {

            currentRow[0].classList.add('fa-angle-double-down');
            currentRow[0].classList.remove('fa-angle-double-right');
        }
    }


    $(".showMore").click(ToggleTableArror)

    $(".glyphicon-move").mousedown(ToggleAllTableArrorAnHideTasksRow)
    $(".glyphicon-move-tasks").mousedown(ToggleAllTableArrorAnHideTasksRowV2)
</script>

<script>
    $(document).ready(SotredListV2);
    $(document).ready(SotredList);

    function updateOrder() {
        $('#myList  .order').each(function(index) {
            $(this).html(`${index + 1}`)
            // $(this).data('data-activityOrder',index + 1);
        });
    }

    function updateOrderV2(ui) {
        let rowTaskId = ui.item.context.id;

        $('#' + rowTaskId + ' .orderNumber').each(function(index) {

            $(this).html(`${index + 1}`)
            // $(this).data('data-activityOrder',index + 1);
        })
    }

    function SotredList() {
        $("#myList").sortable({
            update: function(event, ui) {
                updateOrder();

                var itemEl = event.item

                var tt = ui.item.context
                activityOrders = document.querySelectorAll('[class = "order"]');
                activityIds = document.querySelectorAll('[id = "activityId"]');
                let activitys = [];
                activityOrders.forEach((element, index) => {
                    let taskId = activityIds[index];
                    let ttt = {
                        taskId: taskId.dataset.activityid,
                        order: element.innerHTML
                    }

                    activitys.push(ttt)
                });
                ajaxSaveActivityOrder(activitys)

            },
            draggable: ".act-order",
            animation: 200,
            ghostClass: 'ghost',
            handle: '.glyphicon-move',
            animation: 150,
            items: '> tr.act-rows',
            connectWith: '.act-order',



        });
        // $('.taskRow').sortable('disabled', true);
    }

    function ajaxSaveActivityOrder(dataOrder) {
        var token = $('meta[name="csrf-token"]').attr('content');


        let dddd = JSON.stringify(dataOrder)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            // processData: false,
            // contentType: false,
            dataType: "json",
            url: "{{ route('activity.saveOrder') }}",
            data: {
                "_method": 'POST',
                "_token": token,
                'dd': dddd,
            },
            success: function(response) {

                $('.refresher').load(location.href + ' .refresher')

                setTimeout(() => {
                    $(".showMore").click(ToggleTableArror);
                    $(document).ready(SotredListV2);
                    $(document).ready(SotredList);
                    $(".glyphicon-move").mousedown(ToggleAllTableArrorAnHideTasksRow)
                    $(".glyphicon-move-tasks").mousedown(ToggleAllTableArrorAnHideTasksRowV2)
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
                }, 1000);


            },

            error: function(error) {

            }
        });

    }

    function SotredListV2() {
        $(".tasklists").sortable({
            update: function(event, ui) {

                updateOrderV2(ui);

                let rowTaskId = ui.item.context.id;
                let taskOrdersSpan = $('#' + rowTaskId + ' .orderNumber ')
                let tasksOrder = [];
                $('#' + rowTaskId + ' .orderNumber ').each(function(index) {
                    let ttt = {
                        taskId: taskOrdersSpan[index].getAttribute('data-task-id-for-order'),
                        order: taskOrdersSpan[index].innerHTML
                    }

                    tasksOrder.push(ttt)
                    // console.log()
                    // console.log)
                    // $(this).data('data-activityOrder',index + 1);
                })
                // console.log(tasksOrder)

                ajaxSaveTaskOrder(tasksOrder)

            },
            draggable: ".tsk-order",
            animation: 200,
            ghostClass: 'ghost',
            handle: '.glyphicon-move-tasks',
            animation: 150,
            items: 'tr.tasksOrder',
            connectWith: '.tsk-order',
            move: function( /**Event*/ evt, /**Event*/ originalEvent) {
                console.log("gggg");
                // Example: https://jsbin.com/nawahef/edit?js,output
                // console.log(evt.dragged); // dragged HTMLElement
                // evt.draggedRect; // DOMRect {left, top, right, bottom}
                // evt.related; // HTMLElement on which have guided
                // evt.relatedRect; // DOMRect
                // evt
                //     .willInsertAfter; // Boolean that is true if Sortable will insert drag element after target by default
                // originalEvent.clientY; // mouse position
                // return false; — for cancel
                // return -1; — insert before target
                // return 1; — insert after target
                // return true; — keep default insertion point based on the direction
                // return void; — keep default insertion point based on the direction
            },


        });
        // $('.taskRow').sortable('disabled', true);
    }

    function ajaxSaveTaskOrder(dataOrder) {
        var token = $('meta[name="csrf-token"]').attr('content');


        let dddd = JSON.stringify(dataOrder)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            // processData: false,
            // contentType: false,
            dataType: "json",
            url: "{{ route('task.saveOrder') }}",
            data: {
                "_method": 'POST',
                "_token": token,
                'data': dddd,
            },
            success: function(response) {

                // $('.refresher').load(location.href + ' .refresher')

                setTimeout(() => {
                    $(".showMore").click(ToggleTableArror);
                    $(document).ready(SotredListV2);
                    $(document).ready(SotredList);
                    $(".glyphicon-move").mousedown(ToggleAllTableArrorAnHideTasksRow)
                    $(".glyphicon-move-tasks").mousedown(ToggleAllTableArrorAnHideTasksRowV2)
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
                }, 1000);


            },

            error: function(error) {
                console.log(error)
            }
        });

    }
    /// Tasks Drag
</script>

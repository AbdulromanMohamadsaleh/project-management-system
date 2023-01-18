<div class="col mt-4">
    <b>Total Date = {{ ConvertDaysToWeek($project_detail->TotalDays) }}
    </b>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Activity</th>
                <th>Date</th>
                <th>Date Start Task</th>
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
                    <td></td>
                    <td></td>
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
</div>
@endif
</td>
<td></td>

{{-- <td>{{ $task->TASK_NAME }}</td> --}}


<td>
    @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
        @if ($project_detail->IS_APPROVE == 1)
            @if ($task->STATUS == 0)
                <form style="display: inline-block" method="GET" action="{{ route('task.done', $task->TASK_ID) }}">
                    @csrf
                    <input name="_method" type="hidden" value="GET">
                    <button style="color:white" type="submit" class="btn  btn-warning  show-alert-delete-box "
                        data-toggle="tooltip" title='Complete'><i class='fas fa-check-circle'></i></button>
                </form></a>
            @else
                <a class="btn btn-success" data-toggle="tooltip" title="Completed"><i
                        class="bi bi-check-circle"></i></a>
            @endif
        @else
        @endif
    @else
    @endif
    @if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
    @endif
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#myModal-{{ $task->TASK_ID }}">
        <i class='fas fa-money-check-alt'></i>
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal-{{ $task->TASK_ID }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ $task->TASK_NAME }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @include('project.show.include.tab_edit_budget')
                </div>


                <!-- Modal footer -->

            </div>
        </div>
        <!-- Button trigger modal -->
    </div>
    <!-- Dete -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#myModal2-{{ $task->TASK_ID }}">
        <i class='fas fa-notes-medical'></i>
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal2-{{ $task->TASK_ID }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ $task->TASK_NAME }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @include('project.show.include.tab_edit_note')
                </div>


                <!-- Modal footer -->

            </div>
        </div>
        <!-- Button trigger modal -->
    </div>
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
</table>
</div>

<div class="col mt-4">
    <div class="row">
        <div class="col">
            <b>Total Date = {{ ConvertDaysToWeek($project_detail->TotalDays) }}
            </b><br>
            <b><span class="{{ $project_detail->BUDGET < $project_detail->TotalBudget ? 'text-danger' : '' }}">Total Budget =
                    {{ $project_detail->TotalBudget }}฿</span>
            </b>
        </div>
        <div class="col-1">
            @include( 'edit_activity_task.add_activity_task')
        </div>


    </div>

    <table>
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
                            $result=[0];
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
    </table>
</div>

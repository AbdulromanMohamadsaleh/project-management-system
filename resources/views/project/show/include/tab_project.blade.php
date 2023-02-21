{{-- <div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-danger me-2"> <i class="fas fa-pencil-alt" style="font-size: 25;"></i>
            <button type="button" class="btn btn-primary"><i class="bi bi-alarm" style="font-size: 25;"></i></button>
            <button type="button" class="btn btn-primary"><i class="bi bi-list-task"></i></button>
    </div>
</div> --}}


<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">

        <button class="nav-link active" id="nav-show-project-tab" data-bs-toggle="tab" data-bs-target="#nav-show-project"
            type="button" role="tab" aria-controls="nav-show-project" aria-selected="true"><i class="bi bi-eye"
                style="font-size: 25px"></i></button>



        <button class="nav-link" id="nav-timeline-tab" data-bs-toggle="tab" data-bs-target="#nav-timeline"
            type="button" role="tab" aria-controls="nav-timeline" aria-selected="false" data-toggle="tooltip"
            title='Timeline'><i class="bi bi-alarm" style="font-size: 25px"></i></button>

        <button class="nav-link" id="nav-chart-tab" data-bs-toggle="tab" data-bs-target="#nav-chart" type="button"
            role="tab" aria-controls="nav-chart" aria-selected="false" data-toggle="tooltip" title='Chart task'><i
                class="bi bi-bar-chart-steps" style="font-size: 25px"></i></button>

    </div>
</nav>

<div class="tab-content" id="nav-tabContent">

    <input type="text" hidden id="HolyDays" value="{{ $Holydays }}">
    <div class="tab-pane fade show active mt-3" id="nav-show-project" role="tabpanel" aria-labelledby="nav-show-tab"
        tabindex="0">
        @include('project.show.include.project_activity_task_table')
    </div>


    <div class="tab-pane fade mt-3 " id="nav-edit-project" role="tabpanel" aria-labelledby="nav-edit-project-tab"
        tabindex="0">
    </div>



    <div class="tab-pane fade mt-3" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab" tabindex="0">
        @include('timeline.show.include.showtimeline')
    </div>


    <div class="tab-pane fade mt-3" id="nav-chart" role="tabpanel" aria-labelledby="nav-chart-tab" tabindex="0">
        {{-- @include('project.show.activity_gantt_chart') --}}
        {{-- @include('project.show.task_timeline') --}}
        {{-- <ul class="nav nav-pills nav-fill mt-4">
            <li class="nav-item my-2">
                <a class="btn btn-primary" target="_blank"
                href="{{ route('activity.timeline', $project_detail->DETAIL_ID) }}">Activity
                Timeline</a>
            </li>


        </ul> --}}
        <ul class="nav nav-pills nav-fill mt-4">
            <li class="nav-item my-2">
                <a class=" btn btn-primary" target="_blank"
                    href="{{ route('ganttChart', $project_detail->DETAIL_ID) }}">Task
                    Gantt Chart</a>
            </li>
        </ul>
        {{-- @include('project.show.include.sort') --}}

        {{-- @include('testChart.index') --}}
    </div>

</div>

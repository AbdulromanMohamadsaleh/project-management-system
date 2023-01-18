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
            type="button" role="tab" aria-controls="nav-show-project" aria-selected="true">Show</button>

        <button class="nav-link " id="nav-edit-project-tab" data-bs-toggle="tab" data-bs-target="#nav-edit-project"
            type="button" role="tab" aria-controls="nav-edit-project" aria-selected="true">Edit</button>

        <button class="nav-link" id="nav-timeline-tab" data-bs-toggle="tab" data-bs-target="#nav-timeline"
            type="button" role="tab" aria-controls="nav-timeline" aria-selected="false">Timeline</button>

        <button class="nav-link" id="nav-chart-tab" data-bs-toggle="tab" data-bs-target="#nav-chart" type="button"
            role="tab" aria-controls="nav-chart" aria-selected="false">Chart</button>

    </div>
</nav>

<div class="tab-content" id="nav-tabContent">


    <div class="tab-pane fade show active" id="nav-show-project" role="tabpanel" aria-labelledby="nav-show-tab"
        tabindex="0">
        @include('project.show.include.project_activity_task_table')
    </div>


    <div class="tab-pane fade  " id="nav-edit-project" role="tabpanel" aria-labelledby="nav-edit-project-tab"
        tabindex="0">
        Edit
    </div>

    <div class="tab-pane fade" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab" tabindex="0">
        Timeline
    </div>

    <div class="tab-pane fade" id="nav-chart" role="tabpanel" aria-labelledby="nav-chart-tab" tabindex="0">
        Chart
    </div>

</div>

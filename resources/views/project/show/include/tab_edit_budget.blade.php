<nav>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
            data-bs-target="#nav-home-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-home"
            aria-selected="true" data-toggle="tooltip" title='Edit'><i class="bi bi-pencil"></i></button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
            data-bs-target="#nav-contact-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-contact"
            aria-selected="false" data-toggle="tooltip" title='Show'><i class="bi bi-eye"></i></button>
         <button class="nav-link" id="nav-paybudget-tab" data-bs-toggle="tab"
            data-bs-target="#nav-paybudget-{{ $task->TASK_ID }}" type="button" role="tab" aria-controls="nav-paybudget"
            aria-selected="false" data-toggle="tooltip" title='Show'><i class="material-icons">payment</i></button>


    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home-{{ $task->TASK_ID }}" role="tabpanel"
        aria-labelledby="nav-home-tab" tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('task.savebudget',$task->TASK_ID) }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <label class="label-left fw-bold mb-2" for="projectName">Add budget</label>
                    <input value="{{ $task->TASK_BUDGET }}" type="number" name="budget" class="form-control"
                        id="projectName">
                </div>
                <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
            </div>

        </form>
    </div>
    <div class="tab-pane fade" id="nav-paybudget-{{ $task->TASK_ID }}" role="tabpanel"
        aria-labelledby="nav-paybudget-tab" tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('task.savebudget',$task->TASK_ID) }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <div class="row">
                    <label class="label-left fw-bold mb-2" for="projectName">payment</label>
                    <input value="{{ $task->TASK_BUDGET }}" type="number" name="budget" class="form-control" id="projectName">
                    </div><br>
                    <div class="row">
                        <div class="col-4">
                            <label class="label-left fw-bold mb-2" for="projectName">Confirm Payment</label>
                        </div>
                        <div class="col-2">
                            <form  method="GET"action="{{ route('project.aprove', $project_detail->DETAIL_ID) }}">
                                @csrf
                                <input name="_method" type="hidden" value="GET">
                                <button type="submit" class="btn btn-xs btn-success btn-flat show-alert-delete-box " data-toggle="tooltip" title='Approve'><i   class='fas fa-check-circle'></i></button>
                              </form>
                        </div>

                    </div>

                </div>
                <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
            </div>

        </form>
    </div>
    <div class="tab-pane fade" id="nav-contact-{{ $task->TASK_ID }}" role="tabpanel" aria-labelledby="nav-contact-tab"
        tabindex="0">
        <form id="signUpForm" method="post" action="{{ route('category.save') }}">
            @csrf
            <div class="row mb-5 mb-sm-0">
                <div class=" mb-sm-5">
                    <label class="label-left fw-bold mb-2" for="projectName">Show budget</label>
                    <input disabled value="{{ $task->TASK_BUDGET }}" type="number" name="category_name" class="form-control"
                        id="projectName">
                </div>
            </div>

        </form>
    </div>

</div>



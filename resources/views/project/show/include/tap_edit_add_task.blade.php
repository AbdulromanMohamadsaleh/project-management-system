{{-- <script src="{{ asset('js/create_project.js') }}"></script> --}}
<form class="needs-validation" novalidate id="signUpForm" method="post" action="{{ route('save') }}">
    @csrf
    <p class="text-center mb-4 mt-3">edit Activity</p>
    <div class="row col-12" firstActivity id="activity-1">
        <div class="mb-3 col-10">
            {{-- <label for="">1</label> --}}
            @foreach ($project_detail->activity as $act)
                <div class="input-group mb-3">
                    <span class=" me-3 mt-2 fs-5" id="numbering">1</span>
                    <input class="form-control form-control-lg mb-3" name="activityName[]" type="text"
                        placeholder="Activity" value="{{ $act->ACTIVITY_NAME }}" id="ActivityBorder"
                        aria-label=".form-control-lg example">
                    <input type="text" hidden class="taskCounter" name="taskCounter[]" value="1">
                </div>
                <!-- Tasks -->
                <div class="taskWrap">
                    @foreach ($act->tasks as $task)
                        <div class="row d-flex justify-content-end ">
                            <div class="mb-3 col-7">
                                <div class="input-group mb-3">
                                    <span class=" me-3 mt-2 fs-5" id="numberingTask">1.1</span>
                                    <input id="TaskBorder" class="form-control form-control-lg mb-3" name="taskName[]"
                                        value="{{ $task->TASK_NAME }}" type="text" placeholder="Task"
                                        aria-label="Task">
                                </div>
                            </div>
                            <div class="col-2">
                                <input class="form-control form-control-lg mb-3" id="taskDuration" name="taskDuration[]"
                                    min='1' value="{{ $task->DAY }}" type="number" placeholder="Day"
                                    aria-label="Task">
                            </div>
                            <div class="col-1"><button type="button" disabled title="Delete Task"
                                    class="btn btn-danger btn-delete-task "><i class="bi bi-trash"></i></button>
                            </div>
                            <div class="mb-3 col-1 ttt task-1">
                                <button type="button" title="New Task" onclick="Numbreings()"
                                    class="btn btn-success btn-add-task">+</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <button type="submit" name="submit" class="btn btn-success">SAVE</button>
    </div>
</form>

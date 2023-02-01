<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createActivity">
    +
</button>
@php
    $activitiesCounter = count($project_detail->activity) + 1;
@endphp
<!-- Modal -->
<div class="modal fade " id="createActivity" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <h5 class="text-center my-4"> <b>Activity Number {{ $activitiesCounter }}</b> </h5>

                <form class="m-0 p-5" id="signUpForm" method="post"
                    action="{{ route('activity.save', $project_detail->DETAIL_ID) }}">
                    @csrf
                    <div class="row justify-content-center col-12" firstActivity id="activity-1">
                        <div class="mb-3 col-10">
                            {{-- <label for="">1</label> --}}
                            <div class="input-group mb-3">
                                <span class=" me-3 mt-2 fs-5" id="numbering">{{ $activitiesCounter }}</span>
                                <input class="form-control form-control-lg mb-3" name="activityName" type="text"
                                    placeholder="Activity" id="ActivityBorder" aria-label=".form-control-lg example">
                                <input type="text" hidden class="taskCounter" name="taskCounter" value="1">
                            </div>

                            <!-- Tasks -->
                            <div class="taskWrap">
                                <div class="row d-flex justify-content-end ">
                                    <div class="mb-3 col-7">
                                        <div class="input-group mb-3">
                                            <span class=" me-3 mt-2 fs-5"
                                                id="numberingTask">{{ $activitiesCounter }}.1</span>
                                            <input id="TaskBorder" class="form-control form-control-lg mb-3"
                                                name="taskName[]" type="text" placeholder="Task" aria-label="Task">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input class="form-control form-control-lg mb-3" id="taskDuration"
                                            name="taskDuration[]" min='1' type="number" placeholder="Day"
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

                            </div>
                        </div>
                        {{-- <div class="col-1  ">
                            <button type="button" onclick="Numbreings()" id="btnAddNewActivity"
                                class="btn btn-success add-task"title="New Activity">+</button>
                        </div> --}}
                        <input type="number" name="activityOrder" value="{{ $activitiesCounter }}" hidden>
                    </div>
                    {{-- <input id="HolyDays" hidden type="text" value="{{ $Holydays }}" placeholder="Address"
                        name="address"> --}}
                    {{-- <input id="Project_ID" hidden type="text" value="{{ $project_detail->DETAIL_ID }}"
                        placeholder="Address" name="address"> --}}

                    <div class="mt-4 d-flex justify-content-center">
                        <div class="col-4 row form-footer">

                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/addActivityAndTasks.js') }}"></script>

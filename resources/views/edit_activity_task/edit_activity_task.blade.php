<button style="background-color:orange" type="button" class="btn btn-warning" data-bs-toggle="modal"
    data-bs-target="#modaltask-{{ $task->TASK_ID }}">
    <i class="bi bi-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modaltask-{{ $task->TASK_ID }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signUpForm" method="post" action="{{ route('task.edit', $task->TASK_ID) }}">
                    @csrf
                    <div class="row mb-5 mb-sm-0">
                        <div class=" mb-sm-5 col">
                            <label class="label-left fw-bold mb-2" for="projectName">Name</label>
                            <input value="{{ $task->TASK_NAME }}" type="text" name="task" class="form-control"
                                id="projectName">
                        </div>
                        <div class="mb-sm-5 col-4">
                            <label class="label-left fw-bold mb-2" for="projectName">Day</label>
                            <input value="{{ $task->DAY }}" type="number" name="day" class="form-control"
                                id="projectName">
                        </div>
                        <div class="row">
                            <div class=" mb-sm-5 col-6 ">
                                <label class="label-left fw-bold mb-2" for="projectName">Start Date</label>
                                <input value="{{ $result ? $result[0] : '' }}" type="date" name="edit_satart_date"
                                    class="form-control" id="projectName">
                            </div>

                            <div class=" mb-sm-5 col-6 ">
                                <label class="label-left fw-bold mb-2" for="Expected_End_Date">Expected End Date</label>
                                <input readonly value="{{ $task->COPLETE_TIME ? $EndDate[0] : ' ' }}" type="date"
                                    name="Expected_End_Date" class="Expected_End_Date form-control"
                                    id="Expected_End_Date">
                            </div>
                        </div>
                        <button type="submit" name="submit" onclick="success()" class="btn btn-success">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<button data-toggle="tooltip" title='note' type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#myModal2-{{ $task->TASK_ID }}">
    <i class='fas fa-notes-medical'></i>
</button>

<!-- The Modal -->
<div class="modal " id="myModal2-{{ $task->TASK_ID }}">
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

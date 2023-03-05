@if ( $act->STATUS == 0 )
<form style="display: inline" method="POST" action="{{ route('task.delete', $task->TASK_ID) }}">
    @csrf
    <input name="_method" type="hidden" value="POST">
    <button type="submit" class="btn  btn-danger show-alert-delete-box " data-toggle="tooltip" title='Delete'><i class="bi bi-trash" style="font-size: 15px;"></i></button>
</form>

@endif

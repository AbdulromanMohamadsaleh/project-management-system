@if (Auth::user()->POSITION == 'Employee' || Auth::user()->POSITION == 'Project Manager')
                            @if ($project_detail->IS_APPROVE == 1)
                                @if ($task->STATUS == 0)
                                    @if ($task->START_DATE)
                                        <form style="display: inline-block" method="GET"
                                            action="{{ route('task.done', $task->TASK_ID) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="GET">
                                            <button style="color:white" type="submit"
                                                class="btn  btn-warning  show-alert-delete-box " data-toggle="tooltip"
                                                title='Complete'><i class='fas fa-check-circle'></i></button>
                                        </form>
                                    @else
                                        
                                    @endif
                                @else
                                    <a class="btn btn-success" data-toggle="tooltip" title="Completed"><i
                                            class="bi bi-check-circle"></i></a>
                                @endif
                            @else
                            @endif
                        @else
                        @endif

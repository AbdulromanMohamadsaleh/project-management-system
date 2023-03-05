<div class="container col-md-11">
    @if($project_detail->STATUS==4)
    
    @endif
    <h1>Project Timeline</h1>
    <h1>{{ $project_detail->NAME_PROJECT }}</h1>

    <ul class="timeline mt-5">

        <li class="timeline">
            <div class="icon done"></div>

            <details class="panel">
                <summary>New Release</summary>

                <p>CREATED AT: </strong>{{ $project_detail->created_at->format('m/d/Y') }}
                <p><strong>NAME: </strong> {{ $project_detail->NAME_PROJECT }}
                <p><strong>TARGET: </strong> {{ $project_detail->TARGET }}
                <p><strong>BUDGET: </strong> {{ $project_detail->BUDGET }}
            </details>
        </li>

        <li class="timeline">
            @if ($project_detail->STATUS >= 1)
                <div class="icon done"></div>
            @else
                @if ($project_detail->STATUS == 1 - 1)
                    <div class="icon layer-plus"></div>
                @else
                    <div class="icon working"></div>
                @endif
            @endif
            <details class="panel">
                @if ($project_detail->IS_APPROVE == 1)
                    <summary>Approve</summary>
                    <p><strong>Approved By: </strong> {{ $project_detail->Approver->NAME }}
                    <p><strong>Approved Date: </strong> {{ date('d/m/Y', strtotime($project_detail->APPROVED_DATE)) }}
                    @else
                        <summary>Approve</summary>
                    <p>Waiting To Approve</p>
                @endif
            </details>
        </li>

        <li class="timeline">
            @if ($project_detail->STATUS >= 2)
                @if ($project_detail->STATUS == 3)
                    <div class="icon done"></div>
                @else
                    <div class="icon layer-plus"></div>
                @endif
            @else
                @if ($project_detail->STATUS < 1)
                    <div class="icon working"></div>
                @else
                    <div class="icon layer-plus"></div>
                @endif
            @endif
            <details class="panel">
                <summary>In Porgress</summary>
                <p><strong>Total Activity: </strong>{{ count($project_detail->activity) }}
                    @php
                        $countAct = 0;
                    @endphp

                    @foreach ($project_detail->activity as $act)
                        <div class="accordion " id="accordionPanelsStayOpenExample">
                            <div class="accordion-item ">
                                <h2 class="accordion-header " id="panelsStayOpen-heading{{ ++$countAct }}">
                                    <button class="bg-white text-dark  btn-outline-dark accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse{{ $countAct }}"
                                        aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapse{{ $countAct }}">
                                        <div style="align-items: center;"
                                            class="col d-flex justify-content-between  pe-5">
                                            <div>
                                                {{ $countAct . '. ' . $act->ACTIVITY_NAME }}
                                            </div>
                                            <div>

                                                @if ($act->STATUS == 0)
                                                @else
                                                    <i class="bi bi-check-circle-fill icon-1-5rem icon-dark-green"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{ $countAct }}"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-heading{{ $countAct }}">
                                    <div class="accordion-body " style="color: dimgray;">
                                        @php
                                            $countTask = 0;
                                        @endphp
                                        @foreach ($act->tasks as $task)
                                            <div class="row mb-0 pb-0">
                                                <div class="col-6 ps-3 ">
                                                    <p class="my-1 py-1">
                                                        {{ $countAct . '.' . ++$countTask . ' ' . $task->TASK_NAME }}
                                                    </p>
                                                </div>
                                                <div style="align-items: center;"
                                                    class="col-6 d-flex  justify-content-end  pe-4">
                                                    @if ($task->STATUS == 0)
                                                        <i class="bi bi-clock-fill " style="color: #edb43a"></i>
                                                    @else
                                                        @php
                                                        @endphp
                                                        <div class="me-3">
                                                            <div>
                                                                {{ $task->CompleteBy->NAME }}
                                                            </div>
                                                            <div>
                                                                {{ date('d/m/Y', strtotime($task->COPLETE_TIME)) }}
                                                            </div>
                                                        </div>
                                                        <i class="bi bi-check-circle-fill icon-green "></i>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </details>
        </li>

        <li class="timeline">
            @if ($project_detail->STATUS == 3)
                <div class="icon done"></div>
            @else
                @if ($project_detail->STATUS <= 2)
                    <div class="icon working"></div>
                @else
                    <div class="icon layer-plus"></div>
                @endif
            @endif
            <details class="panel">
                <summary>Complete</summary>
                @if ($project_detail->STATUS < 3)
                    <div class="icon done"></div>
                    <p><strong> <i class="bi bi-x-circle-fill icon-red"></i> Project Not Completed yet.</strong>
                        <br><br>
                    @else
                    <div class="icon done"></div>
                    <p><strong><i class="bi bi-check-circle-fill icon-green "></i> Project Completed.</strong> <br><br>
                @endif
            </details>
        </li>

    </ul>
</div>

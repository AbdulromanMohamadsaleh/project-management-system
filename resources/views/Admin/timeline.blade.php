@include('include.header')

<body>
    {{-- <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        @include('include.navbar')

        <!-- Recent Sales Start -->
        <div class="container col-md-11">
            <h1>Project Timeline</h1>
            <h1>{{ $project_detail->NAME_PROJECT }}</h1>
            @php
                $end = end($status);
                $countStatus = count($status);
            @endphp
            <ul class="timeline mt-5">

                <li class="timeline">
                    @if (in_array('New Release', $status))
                        <div class="icon done"></div>
                    @else
                        @if ($end == 'workingOn')
                            <div class="icon layer-plus"></div>
                        @else
                            <div class="icon working"></div>
                        @endif
                    @endif
                    <details class="panel">
                        <summary>New Release</summary>

                        <p>CREATED AT: </strong>{{ $project_detail->created_at->format('m/d/Y') }}
                            {{-- <p><strong>Created at:</i></strong> {{ $project_detail->created_at->format('m/d/Y') }} --}}
                        <p><strong>NAME: </strong> {{ $project_detail->NAME_PROJECT }}
                        <p><strong>TARGET: </strong> {{ $project_detail->TARGET }}
                        <p><strong>BUDGET: </strong> {{ $project_detail->BUDGET }}
                    </details>
                </li>

                <li class="timeline">
                    {{-- <div class="icon working"></div> --}}
                    @if (in_array('Approved', $status))
                        <div class="icon done"></div>
                    @else
                        @if ($end == 'workingOn' && $countStatus == 2)
                            <div class="icon layer-plus"></div>
                        @else
                            <div class="icon working"></div>
                        @endif
                    @endif
                    <details class="panel">
                        @if ($project_detail->IS_APPROVE == 1)
                            @php
                                $approveData = explode(',', $ProjectTrack->APPROVED_BY);
                            @endphp
                            <summary>Approve</summary>
                            <p><strong>Approved By: </strong> {{ $approveData[0] }}
                            <p><strong>Approved Date: </strong> {{ $approveData[1] }}
                            @else
                                <summary>Approve</summary>
                            <p>Waiting To Approve</p>
                        @endif
                    </details>
                </li>

                <li class="timeline">
                    @if (in_array('Progress', $status))
                        @if ($countStatus == 4 && !in_array('Complete', $status))
                            <div class="icon layer-plus"></div>
                        @else
                            <div class="icon done"></div>
                        @endif
                    @else
                        @if ($end == 'workingOn' && $countStatus == 3)
                            <div class="icon layer-plus"></div>
                        @else
                            <div class="icon working"></div>
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
                                    {{-- background: rgba(0, 0, 0, 0.1); --}}
                                    <div class="accordion-item ">
                                        <h2 class="accordion-header " id="panelsStayOpen-heading{{ ++$countAct }}">
                                            <button
                                                class="bg-white text-dark  btn-outline-dark accordion-button collapsed"
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
                                                            {{-- <i class="bi bi-circle icon-1-5rem "></i> --}}
                                                        @else
                                                            <i
                                                                class="bi bi-check-circle-fill icon-1-5rem icon-dark-green"></i>
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
                                                                {{ ++$countTask . '. ' . $task->TASK_NAME }}</p>
                                                        </div>
                                                        <div style="align-items: center;"
                                                            class="col-6 d-flex  justify-content-end  pe-4">
                                                            @if ($task->STATUS == 0)
                                                                <i class="bi bi-x-circle-fill icon-red"></i>
                                                            @else
                                                                @php
                                                                    $TASK_TRACKER = explode(',', $task->TASK_TRACKER);
                                                                @endphp
                                                                <div class="me-3">
                                                                    <div>
                                                                        {{ $TASK_TRACKER[0] }}
                                                                    </div>
                                                                    <div>
                                                                        {{ $TASK_TRACKER[1] }}
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
                    @if (in_array('Complete', $status))
                        <div class="icon done"></div>
                    @else
                        @if ($end == 'workingOn' && $countStatus == 5)
                            <div class="icon layer-plus"></div>
                        @else
                            <div class="icon working"></div>
                        @endif
                    @endif
                    <details class="panel">
                        <summary>Complete</summary>
                        <p><strong>Action:</strong> Activity complete all<br><br>
                    </details>
                </li>

                {{-- <li class="timeline">
                    <div class="icon working"></div>
                    <details class="panel">
                        <summary>Compate</summary>
                    </details>
                </li> --}}

            </ul>
        </div>
        <!-- Recent Sales End -->



</body>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>

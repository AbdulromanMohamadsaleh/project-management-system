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
        <div class="container">
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
                        <summary>Approve</summary>
                        <p><strong>Approved By: </strong> Manager <br><br>
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
                                <div class="row ">
                                    <div class="col-6 ps-3">
                                        <p>{{ ++$countAct . '. ' . $act->ACTIVITY_NAME }}</p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end  pe-5">
                                        @if ($act->STATUS == 0)
                                            <i class="bi bi-record-circle"></i>
                                        @else
                                            <i class="bi bi-check-circle"></i>
                                        @endif
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


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>

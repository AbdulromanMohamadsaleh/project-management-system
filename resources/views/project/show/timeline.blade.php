@include('include.header')

<link rel="stylesheet" href="{{ asset('css/frappe.css') }}">

<script src=" {{ asset('dist/frappe-gantt.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('dist/frappe-gantt.css') }}">
{{-- <script src="frappe-gantt.min.js"></script>
<link rel="stylesheet" href="frappe-gantt.css"> --}}

<body>
    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('include.navbar')<br>
        <h1 class="fw-bold text-center fs-4">Task Timeline of {{ $project->NAME_PROJECT }}</h1>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">



                    <div>
                        <p class="chart-label">
                            Timescale: <span id="current-timescale">Day</span>
                        </p>

                        <svg id="gantt">
                        </svg>
                    </div>

                    <div class="chart-controls">
                        <p>Change Chart Timescale</p>
                        <div class="button-cont">
                            <button id="day-btn">
                                Day
                            </button>

                            <button id="week-btn">
                                Week
                            </button>

                            <button id="month-btn">
                                Month
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
@include('include.scrip');
@include('project.show.frape.frappe')
{{-- <script src="{{ asset('js/frappe.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>

</html>

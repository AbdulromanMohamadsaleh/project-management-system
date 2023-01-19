@include('include.header')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["timeline"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var container = document.getElementById('timeline-chart');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({
            type: 'string',
            id: 'Activity'
        });
        dataTable.addColumn({
            type: 'string',
            id: 'Task'
        });
        dataTable.addColumn({
            type: 'date',
            id: 'Start'
        });
        dataTable.addColumn({
            type: 'date',
            id: 'End'
        });
        dataTable.addRows([
            // ['Briefing Meeting', 'Baseline', new Date(2020, 2, 6), new Date(2020, 2, 10)],
            // ['Briefing Meeting', 'Forecast', new Date(2020, 2, 7), new Date(2020, 2, 11)],
            // ['Briefing Meeting', 'Actual', new Date(2020, 2, 6), new Date(2020, 2, 13)],
            // ['Concept Design', 'Baseline', new Date(2020, 2, 6), new Date(2020, 2, 10)],
            // ['Concept Design', 'Forecast', new Date(2020, 2, 7), new Date(2020, 2, 11)],
            // ['Concept Design', 'Actual', new Date(2020, 2, 6), new Date(2020, 2, 13)]
            @php
                $counter = 0;
                foreach ($tasks as $task) {
                    // date('d', strtotime($act->START_DATE)
                    if ($task->START_DATE && $task->COPLATE_TIME) {
                        $counter++;
                        $Syear = intval(date('Y', strtotime($task->START_DATE)));
                        $Smonth = intval(date('m', strtotime($task->START_DATE)));
                        $Sday = intval(date('d', strtotime($task->START_DATE)));

                        $Eyear = intval(date('Y', strtotime($task->COPLATE_TIME)));
                        $Emonth = intval(date('m', strtotime($task->COPLATE_TIME)));
                        $Eday = intval(date('d', strtotime($task->COPLATE_TIME)));

                        echo "['" .
                            $task->activity->ACTIVITY_NAME .
                            "', '" .
                            $task->TASK_NAME .
                            "', " .
                            ' new Date(' .
                            $Syear .
                            ',' .
                            $Smonth .
                            ',' .
                            $Sday .
                            '), new Date(' .
                            $Eyear .
                            ',' .
                            $Emonth .
                            ',' .
                            $Eday .
                            ')' .
                            '],
                        ';
                    }
                }
            @endphp
        ]);

        var options = {
            // timeline: {colorByRowLabel: true},

            timeline: {
                colorByRowLabel: true,
                rowLabelStyle: {
                    fontName: 'Helvetica',
                    fontSize: 18,
                    color: '#603913'
                },
                barLabelStyle: {
                    fontName: 'Garamond',
                    fontSize: 14
                }
            },
            height: 1000,
        };




        chart.draw(dataTable, options);

        function resizeCharts() {
            // redraw charts, dashboards, etc here
            chart.draw(dataTable, options);
        }
        if (window.addEventListener) {
            window.addEventListener("resize", resizeCharts);
        } else if (window.attachEvent) {
            window.attachEvent("onresize", resizeCharts);
        } else {
            window.onresize = resizeCharts;
        }
    }
</script>


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
                    @if ($counter > 0)
                        <div class="mt-5" id="timeline-chart"></div>
                    @else
                        <h3 class="mt-4 text-danger fw-bold text-center fs-4">No Timeline</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>


</body>
@include('include.scrip');
<script src="{{ asset('js/app.js') }}"></script>

</html>

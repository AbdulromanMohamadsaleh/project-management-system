@include('include.header')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // google.charts.load('current', {
    //     'packages': ['gantt']
    // });
    google.charts.load("current", {
        packages: ["timeline"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var container = document.getElementById("timeline");
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({
            type: "string",
            id: "Term"
        });
        dataTable.addColumn({
            type: "string",
            id: "Phase"
        });
        dataTable.addColumn({
            type: "date",
            id: "Start"
        });
        dataTable.addColumn({
            type: "date",
            id: "End"
        });

        dataTable.addRows([

            @php
                $counter = 0;
                foreach ($project_detail->activity as $act) {
                    // date('d', strtotime($act->START_DATE)
                    if ($act->START_DATE && $act->END_DATE && $act->START_DATE != $act->END_DATE) {
                        $counter++;
                        $Syear = intval(date('Y', strtotime($act->START_DATE)));
                        $Smonth = intval(date('m', strtotime($act->START_DATE)));
                        $Sday = intval(date('d', strtotime($act->START_DATE)));

                        $Eyear = intval(date('Y', strtotime($act->END_DATE)));
                        $Emonth = intval(date('m', strtotime($act->END_DATE)));
                        $Eday = intval(date('d', strtotime($act->END_DATE)));

                        echo "['" .
                            $act->ACTIVITY_ID .
                            "', '" .
                            $act->ACTIVITY_NAME .
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
                        // ["1", "Planning Activities", new Date(2016, 0, 1), new Date(2016, 11, 31)],
                    }
                }

            @endphp

        ]);

        var options = {
            // height: 400,

            title: 'Toppings I Like On My Pizza',
            // timeline: {
            //     showRowLabels: false
            // },
            timeline: {
                colorByRowLabel: true,
                showRowLabels: false,
                // rowLabelStyle: {
                //     fontName: 'Helvetica',
                //     fontSize: 24,
                //     color: '#603913'
                // },
                barLabelStyle: {
                    fontName: 'Garamond',
                    fontSize: 14
                }
            },
            animation: {
                startup: true,
                duration: 1000,
                easing: "in"
            },
            avoidOverlappingGridLines: true,
            backgroundColor: "#fff",
            colors: ["#2b91a6", "#40ad48", "#f05c56", "#f37520", "#514b43"],
            is3D: true,

        };

        var chart = new google.visualization.Timeline(container);
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
        <h1 class="fw-bold text-center fs-4">Activity Timeline of {{ $project_detail->NAME_PROJECT }}</h1>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">
                    @if ($counter > 0)
                        <style>
                            #timeline {
                                width: 100%;
                                height: 400px;
                            }
                        </style>
                        <div id="timeline" class="mt-5"></div>
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

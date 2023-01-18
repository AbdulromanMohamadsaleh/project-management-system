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
        var chart = new google.visualization.Timeline(container);
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
                foreach ($project_detail->activity as $act) {
                    // date('d', strtotime($act->START_DATE)
                    if (($act->START_DATE && $act->END_DATE) && ($act->START_DATE != $act->END_DATE)) {
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

            // ["1", "Planning Activities", new Date(2016, 0, 1), new Date(2016, 11, 31)],
            // ["2", "Site Plan Approval", new Date(2016, 7, 15), new Date(2017, 11, 31)],
            // [
            // 	"3",
            // 	"Sales And Marketing Period",
            // 	new Date(2016, 6, 1),
            // 	new Date(2017, 11, 31)
            // ],
            // ["4", "Construction", new Date(2017, 7, 15), new Date(2019, 7, 15)],
            // ["5", "Occupancy", new Date(2019, 3, 1), new Date(2020, 7, 15)]
        ]);

        var options = {
            // height: 400,
            // width:10000,
            timeline: {
                showRowLabels: false
            },
            animation: {
                startup: true,
                duration: 1000,
                easing: "in"
            },
            avoidOverlappingGridLines: true,
            backgroundColor: "#fff",
            colors: ["#2b91a6", "#40ad48", "#f05c56", "#f37520", "#514b43"]
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




<style>
    #timeline {
        width: 100%;
        height: 400px;
    }
</style>
<div id="timeline" class="mt-5"></div>

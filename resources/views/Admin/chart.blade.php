<script>
    $(function() {
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["2020", "2021", "2022", "2023", "2024", "2025"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850",
                        "#c45850"
                    ],
                    data: [2478, 5267, 734, 784, 433, 500]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Project'
                }
            }
        });
    })
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        let doneProject = @php echo $data['totalInCompleteProject']@endphp;
        let ProggressProject = @php echo $data['totalInProggressProject']@endphp;
        let PendingProject = @php echo $data['totalPendingProject']@endphp;

        var data = google.visualization.arrayToDataTable([
            ['Progress', 'Hours per Day'],
            ['Complete', doneProject],
            ['Progress', ProggressProject],
            ['New Release', PendingProject],
            // ['Watch TV', 2],
            // ['Sleep', 7]
        ]);

        // var options = {
        //     title: 'Progress/Done',
        //     colors:['#1ABC9C','#F4D03F','#CACFD2'],
        //     is3D: true,
        // };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, {
            title: 'Progress/Done',
            colors: ['#1ABC9C', '#F4D03F', '#CACFD2'],
            is3D: true,
        });
    }
</script>

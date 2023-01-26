@switch(Auth::user()->POSITION)
    @case('Admin')
        <script>
            (async function() {

                let BarChartData = @php  echo $data['BarChartData'] @endphp;

                let BarData = Object.entries(BarChartData);

                let yearChart = BarData.map(x => x[0]);
                let projectChart = BarData.map(x => x[1]);

                new Chart(
                    document.getElementById('bar-chart'), {
                        type: 'bar',
                        data: {
                            labels: yearChart,
                            datasets: [{
                                label: `Project`,
                                data: projectChart,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(255, 159, 64, 0.6)',
                                    'rgba(255, 205, 86, 0.6)',
                                    'rgba(75, 192, 192, 0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(153, 102, 255, 0.6)',
                                    'rgba(201, 203, 207, 0.6)'
                                ],
                            }]
                        }
                    }
                );
            })();

            (async function() {
                let doneProject = @php echo $data['totalInCompleteProject']@endphp;
                let ProggressProject = @php echo $data['totalInProggressProject']@endphp;
                let PendingProject = @php echo $data['totalPendingProject']@endphp;


                new Chart(
                    document.getElementById('pie-chart'), {
                        type: 'pie',
                        data: {
                            labels: [
                                'New Release',
                                'In Progress',
                                'Complete',

                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [PendingProject, ProggressProject, doneProject],
                                backgroundColor: [
                                    // '#CACFD2',
                                    'rgba(201, 203, 207 , 0.8)',
                                    // '#F4D03F',
                                    'rgba(255, 205, 86 , 0.8)',
                                    // '#1ABC9C',
                                    'rgba(75, 192, 192 , 0.8)',
                                ],
                                hoverOffset: 4
                            }]
                        }
                    }
                );
            })();
        </script>
    @break

    @case('Project Manager')
    @break

    @case('Manager')
    <script>
        (async function() {

            let BarChartData = @php  echo $data['BarChartData'] @endphp;

            let BarData = Object.entries(BarChartData);

            let yearChart = BarData.map(x => x[0]);
            let projectChart = BarData.map(x => x[1]);

            new Chart(
                document.getElementById('bar-chart'), {
                    type: 'bar',
                    data: {
                        labels: yearChart,
                        datasets: [{
                            label: `Project`,
                            data: projectChart,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(255, 205, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(201, 203, 207, 0.6)'
                            ],
                        }]
                    }
                }
            );
        })();

        (async function() {
            let doneProject = @php echo $data['totalInCompleteProject']@endphp;
            let ProggressProject = @php echo $data['totalInProggressProject']@endphp;
            let PendingProject = @php echo $data['totalPendingProject']@endphp;


            new Chart(
                document.getElementById('pie-chart'), {
                    type: 'pie',
                    data: {
                        labels: [
                            'New Release',
                            'In Progress',
                            'Complete',

                        ],
                        datasets: [{
                            label: 'My First Dataset',
                            data: [PendingProject, ProggressProject, doneProject],
                            backgroundColor: [
                                // '#CACFD2',
                                'rgba(201, 203, 207 , 0.8)',
                                // '#F4D03F',
                                'rgba(255, 205, 86 , 0.8)',
                                // '#1ABC9C',
                                'rgba(75, 192, 192 , 0.8)',
                            ],
                            hoverOffset: 4
                        }]
                    }
                }
            );
        })();
    </script>
    @break

    @case('Employee')
        <script>
            (async function() {

                let BarChartData = @php  echo $data['BarChartData'] @endphp;

                let BarData = Object.entries(BarChartData);

                let yearChart = BarData.map(x => x[0]);
                let projectChart = BarData.map(x => x[1]);

                new Chart(
                    document.getElementById('bar-chart'), {
                        type: 'bar',
                        data: {
                            labels: yearChart,
                            datasets: [{
                                label: `Project`,
                                data: projectChart,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(255, 159, 64, 0.6)',
                                    'rgba(255, 205, 86, 0.6)',
                                    'rgba(75, 192, 192, 0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(153, 102, 255, 0.6)',
                                    'rgba(201, 203, 207, 0.6)'
                                ],
                            }]
                        }
                    }
                );
            })();

            (async function() {
                let doneProject = @php echo $data['userInCompletedProjects']@endphp;
                let ProggressProject = @php echo $data['userInProggressProjects']@endphp;

                new Chart(
                    document.getElementById('pie-chart'), {
                        type: 'pie',
                        data: {
                            labels: [
                                'Complete',
                                'In Progress',

                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [ProggressProject, doneProject],
                                backgroundColor: [
                                    // '#00bfa0',
                                    'rgba(75, 192, 192 , 0.8)',
                                    // '#ef9b20',
                                    'rgba(255, 205, 86 , 0.8)',

                                ],
                                hoverOffset: 4
                            }]
                        }
                    }
                );
            })();
        </script>
    @break

    @default
@endswitch

@switch(Auth::user()->POSITION)
    @case('Admin')
        <script>
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
                                    '#CACFD2',
                                    '#F4D03F',
                                    '#1ABC9C',
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
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
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
                                    '#00bfa0',
                                    '#ef9b20',

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

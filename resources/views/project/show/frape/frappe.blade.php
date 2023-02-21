<script>
    let tasks = [
        @php
            $counter = 0;
            foreach ($tasks as $task) {
                // date('d', strtotime($act->START_DATE)
                if ($task->START_DATE && $task->COPLETE_TIME) {
                    $counter++;
                    $Syear = intval(date('Y', strtotime($task->START_DATE)));
                    $Smonth = date('m', strtotime($task->START_DATE));
                    $Sday = intval(date('d', strtotime($task->START_DATE)));

                    $Eyear = intval(date('Y', strtotime($task->COPLETE_TIME)));
                    $Emonth = date('m', strtotime($task->COPLETE_TIME));
                    $Eday = intval(date('d', strtotime($task->COPLETE_TIME)));

                    echo "{ id: '" .
                        $task->activity->ACTIVITY_NAME .
                        "',
                                name: '" .
                        $task->TASK_NAME .
                        "',
                                start: '" .
                        $Syear .
                        '-' .
                        $Smonth .
                        '-' .
                        $Sday .
                        "',
                                end: '" .
                        $Eyear .
                        '-' .
                        $Emonth .
                        '-' .
                        $Eday .
                        "',
                                progress: " .
                        '50' .
                        ',},';
                }
            }
        @endphp


    ]


    // let ganttChart = new Gantt("#gantt", tasks, {});

    let ganttChart = new Gantt("#gantt", tasks, {
        custom_class: 'bar-milestone', // optional
        header_height: 50,
        view_modes: ['Quarter Day', 'Half Day', 'Day', 'Week', 'Month'],
        bar_corner_radius: 10,
        column_width: 30,
        draggable: false,
        bar_height: 40,
        padding: 18,
        view_mode: 'Week',
        date_format: 'YYYY-MM-DD',
        on_view_change: function(mode) {
            document.getElementById("current-timescale").innerText = mode;
        },
        custom_popup_html: function(task) {
            // the task object will contain the updated
            // dates and progress value
            // const end_date = task.end.format('MMM D');
            return `
		<div class="details-container">
		  <h5 class="task-name">${task.name}</h5>
          <hr>
          <p>Activity Name:  ${task.id}</p>
		  <p>Expected to finish by: ${task.end}</p>
		  <p>${task.progress}% completed!</p>
		</div>
	  `;
        }
    });

    document.querySelector(".chart-controls #day-btn").addEventListener("click", () => {
        ganttChart.change_view_mode("Day");
    })
    document.querySelector(".chart-controls #week-btn").addEventListener("click", () => {
        ganttChart.change_view_mode("Week");
    })
    document.querySelector(".chart-controls #month-btn").addEventListener("click", () => {
        ganttChart.change_view_mode("Month");
    })
</script>

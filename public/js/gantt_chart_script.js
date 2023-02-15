
    import {
        GanttChart
    } from "./components/ganttChart/ganttChart.js";

    // can have multiple instances of Gantt chart
    document.addEventListener("DOMContentLoaded", () => {
        let lastTaskEndDate = new Date("1000-01-31");
        let firstTaskStartDate = new Date("5000-01-31");
        tasks.forEach((task)=>{
            task.start = new Date(task.start);
            task.end = new Date(task.end)
            if(lastTaskEndDate < task.end)
            lastTaskEndDate = task.end;

            if(firstTaskStartDate >task.start)
            firstTaskStartDate = task.start;
        })
        let ChartType = "Week";
        project.DATE_END = new Date(project.DATE_END);
        project.DATE_START = new Date(project.DATE_START);

        console.log(lastTaskEndDate);
        const ganttChartDay = document.querySelector("[role=gantt-chart-day]");
        new GanttChart("Day",ganttChartDay, tasks,project,lastTaskEndDate,firstTaskStartDate);

        const ganttChartWeek = document.querySelector("[role=gantt-chart-week]");
        new GanttChart("Week",ganttChartWeek, tasks,project,lastTaskEndDate,firstTaskStartDate);

        const ganttChartMonth = document.querySelector("[role=gantt-chart-month]");
        new GanttChart("Month",ganttChartMonth, tasks,project,lastTaskEndDate,firstTaskStartDate);


    });

    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function(element, renderer) {
    //         return true;
    //     }
    // };
    // $('#submit').click(function() {
    //     console.log("cells");
    //     doc.fromHTML($('#content').html(), 15, 15, {
    //         'width': 190,
    //         'elementHandlers': specialElementHandlers
    //     });

    //     doc.save('sample-page.pdf');
    // });


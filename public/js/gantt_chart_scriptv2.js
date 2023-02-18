
    import {
        GanttChart
    } from "./components2/ganttChart/ganttChart.js";

    // can have multiple instances of Gantt chart
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector("#chartTitle").innerHTML = project.NAME_PROJECT;

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


        // JSON.parse()



        project.DATE_END = new Date(project.DATE_END);
        project.DATE_START = new Date(project.DATE_START);

        const ganttChartDay = document.querySelector("[role=gantt-chart-day]");
        new GanttChart("Day",ganttChartDay,project);

        const ganttChartWeek = document.querySelector("[role=gantt-chart-week]");
        new GanttChart("Week",ganttChartWeek,project);

        // const ganttChartMonth = document.querySelector("[role=gantt-chart-month]");
        // new GanttChart("Month",ganttChartMonth, tasks,project,lastTaskEndDate,firstTaskStartDate);

    });




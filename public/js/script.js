    import {
        GanttChart
    } from "./components/ganttChart/ganttChart.js";

    // can have multiple instances of Gantt chart
    document.addEventListener("DOMContentLoaded", () => {
        // console.log(tasks)
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
        console.log(tasks)
        // get data - could get from server
        // const tasks = [{
        //         id: 1,
        //         name: "Make Login",
        //         start: new Date("2022/1/2"),
        //         end: new Date("2022/1/8"),
        //     },
        //     {
        //         id: 2,
        //         name: "Make Register",
        //         start: new Date("2022/1/10"),
        //         end: new Date("2022/1/15"),
        //     },
        //     {
        //         id: 3,
        //         name: "Task 3",
        //         start: new Date("2022/1/11"),
        //         end: new Date("2022/1/18"),
        //     },
        //     {
        //         id: 4,
        //         name: "Task 4",
        //         start: new Date("2022/1/10"),
        //         end: new Date("2022/1/18"),
        //     },
        //     {
        //         id: 5,
        //         name: "Task 5",
        //         start: new Date("2022/1/10"),
        //         end: new Date("2022/1/18"),
        //     },
        //     {
        //         id: 6,
        //         name: "Task 6",
        //         start: new Date("2022/1/10"),
        //         end: new Date("2022/1/15"),
        //     },
        //     {
        //         id: 7,
        //         name: "Task 7",
        //         start: new Date("2022/1/2"),
        //         end: new Date("2022/1/8"),
        //     },
        //     {
        //         id: 8,
        //         name: "Task 8",
        //         start: new Date("2022/1/11"),
        //         end: new Date("2022/1/18"),
        //     },
        // ];

        //   const taskDurations = [
        //     {
        //       id: "1",
        //       start: new Date("2022/1/2"),
        //       end: new Date("2022/1/8"),
        //       task: 1,
        //     },
        //     {
        //       id: "2",
        //       start: new Date("2022/1/10"),
        //       end: new Date("2022/1/15"),
        //       task: 2,
        //     },
        //     {
        //       id: "3",
        //       start: new Date("2022/1/11"),
        //       end: new Date("2022/1/18"),
        //       task: 4,
        //     },
        //   ];
        project.DATE_END = new Date(project.DATE_END);
        project.DATE_START = new Date(project.DATE_START);

        const ganttCharts = document.querySelectorAll("[role=gantt-chart]");
        ganttCharts.forEach(ganttChart => {
            new GanttChart(ganttChart, tasks,project,lastTaskEndDate,firstTaskStartDate);
        });




// document.getElementsByClassName('taskDuration').style.height='30px';


        // $('.taskDuration').css('height', '30px');


    });


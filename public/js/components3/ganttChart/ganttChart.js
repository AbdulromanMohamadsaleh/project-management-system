import { createHtmlContentFragment } from "./htmlContent.js";
import {
  monthDiff,
  dayDiff,
  getDaysInMonth,
  getDayOfWeek,
  createFormattedDateFromStr,
  createFormattedDateFromDate,
  getDiffNumberOfDays,
  diff_weeks,
  differenceInMonths,
} from "./utils.js";

export function GanttChart(ganttChartElement, tasks, project,lastTaskEndDate,firstTaskStartDate) {
    const months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];
    const contentFragment = createHtmlContentFragment();
    let taskDurationElDragged;

    // add date selector values
    // let monthOptionsHTMLStrArr = [];
    // for (let i = 0; i < months.length; i++)
    // {
    //     if(i==tasks[0].start.getDaysInMonth){
    //         monthOptionsHTMLStrArr.push(`<option  selected value="${i}">${months[i]}</option>`);
    //     }else{
    //         monthOptionsHTMLStrArr.push(`<option value="${i}">${months[i]}</option>`);
    //     }

    // }

    // const years = [];
    // for (let i = tasks[tasks.length-1].start.getFullYear(); i <= tasks[tasks.length-1].end.getFullYear(); i++) {
    //     if(i==tasks[0].start.getFullYear()){
    //         years.push(`<option selected value="${i}">${i}</option>`);
    //     }else{
    //         years.push(`<option value="${i}">${i}</option>`);
    //     }
    // }

    // const fromSelectYear = contentFragment.querySelector("#from-select-year");
    // const fromSelectMonth = contentFragment.querySelector("#from-select-month");
    // const toSelectYear = contentFragment.querySelector("#to-select-year");
    // const toSelectMonth = contentFragment.querySelector("#to-select-month");

    // fromSelectMonth.innerHTML = `
    //     ${monthOptionsHTMLStrArr.join("")}
    // `;
    // fromSelectYear.innerHTML = `
    //     ${years.join("")}
    // `;
    // toSelectMonth.innerHTML = `
    //     ${monthOptionsHTMLStrArr.join("")}
    // `;
    // toSelectYear.innerHTML = `
    //     ${years.join("")}
    // `;

    // create grid
    const containerTasks = contentFragment.querySelector(
        "#gantt-grid-container__tasks"
    );
    const containerTimePeriods = contentFragment.querySelector(
        "#gantt-grid-container__time"
    );

    const addTaskForm = contentFragment.querySelector("#add-task");
    const addTaskDurationForm =
        contentFragment.querySelector("#add-task-duration");
    const taskSelect = addTaskDurationForm.querySelector("#select-task");


    function createGridDays(startMonth,endMonth) {
        var ProjectWeekCounter=1;

        // const startMonth = new Date(
        // parseInt(fromSelectYear.value),
        // parseInt(fromSelectMonth.value)
        // );
        // const endMonth = new Date(
        // parseInt(toSelectYear.value),
        // parseInt(toSelectMonth.value)
        // );
        const numMonths = monthDiff(startMonth, project.DATE_END) + 1;
        // clear first each time it is changed
        containerTasks.innerHTML = "";
        containerTimePeriods.innerHTML = "";

        createTaskRowsForDays();
        createMonthsRow(startMonth, numMonths);
        createDaysRowForDays(startMonth, numMonths);

        createDaysOfTheWeekRowForDays(startMonth, numMonths);
        createProjectWeekRow(startMonth, numMonths,tasks,ProjectWeekCounter);

        createTaskRowsTimePeriodsForDays(startMonth, numMonths);
        addTaskDurationsForDays();
    }
    

    ganttChartElement.appendChild(contentFragment);

    // Diffrint From weeks
    function createTaskRowsForDays() {
        // first 4 rows are empty
        for (let i = 0; i < 4; i++) {
            const emptyRow = document.createElement("div");
            emptyRow.className = "gantt-task-row";
            const taskRowElInput = document.createElement("input");
            taskRowElInput.readOnly= true;
            taskRowElInput.style.fontWeight="bold"
            if(i==0)
                taskRowElInput.value='Year'
            else if(i==1)
            taskRowElInput.value='Day Number'
            else if(i==2)
            taskRowElInput.value='Day Name'
            else if(i==3)
            taskRowElInput.value='Project Week'

            emptyRow.appendChild(taskRowElInput);
            containerTasks.appendChild(emptyRow);
        }


        // add task select values
        let taskOptionsHTMLStrArr = [];

        tasks.forEach((task) => {
        const taskRowEl = document.createElement("div");
        taskRowEl.id = task.id;
        taskRowEl.className = "gantt-task-row";

        const taskRowElInput = document.createElement("input");
        taskRowElInput.readOnly= true;
        taskRowEl.appendChild(taskRowElInput);
        taskRowElInput.value = task.name;

        taskOptionsHTMLStrArr.push(
            `<option value="${task.id}">${task.name}</option>`
        );

        // add delete button
        // const taskRowElDelBtn = document.createElement("button");
        // taskRowElDelBtn.innerText = "✕";
        // taskRowEl.appendChild(taskRowElDelBtn);

        containerTasks.appendChild(taskRowEl);
        });
        taskSelect.innerHTML = `
        ${taskOptionsHTMLStrArr.join("")}
        `;
    }

    function createMonthsRow(startMonth, numMonths) {

        // Drow grid Year Header
        containerTimePeriods.style.gridTemplateColumns = `repeat(${numMonths}, 1fr)`;
        let numWeeks = diff_weeks(project.DATE_START, project.DATE_END);
        let month = new Date(startMonth);

        for (let i = 0; i < numMonths; i++) {
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period-month day";
        // to center text vertically
        const timePeriodElSpan = document.createElement("span");
        timePeriodElSpan.innerHTML =
            months[month.getMonth()] + " " + month.getFullYear();
        timePeriodEl.appendChild(timePeriodElSpan);
        containerTimePeriods.appendChild(timePeriodEl);
        month.setMonth(month.getMonth() + 1);
        }
    }

    // Diffrint From weeks
    function createDaysRowForDays(startMonth, numMonths) {
        let month = new Date(startMonth);

        for (let i = 0; i < numMonths; i++) {
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period";
        containerTimePeriods.appendChild(timePeriodEl);

        // add days as children
        const numDays = getDaysInMonth(month.getFullYear(), month.getMonth() + 1);

        for (let i = 1; i <= numDays; i++) {
            let dayEl = document.createElement("div");
            dayEl.className = "gantt-time-period";
            const dayElSpan = document.createElement("span");
            dayElSpan.innerHTML = i;
            dayEl.appendChild(dayElSpan);
            timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
    }

    // Diffrint From weeks
    function createDaysOfTheWeekRowForDays(startMonth, numMonths) {
        let month = new Date(startMonth);

        for (let i = 0; i < numMonths; i++) {
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period";
        containerTimePeriods.appendChild(timePeriodEl);

        // add days of the week as children
        const currYear = month.getFullYear();
        const currMonth = month.getMonth() + 1;
        const numDays = getDaysInMonth(currYear, currMonth);

        for (let i = 1; i <= numDays; i++) {
            let dayEl = document.createElement("div");
            dayEl.className = "gantt-time-period";
            const dayOfTheWeek = getDayOfWeek(currYear, currMonth - 1, i - 1);
            const dayElSpan = document.createElement("span");
            dayElSpan.innerHTML = dayOfTheWeek;
            dayEl.appendChild(dayElSpan);
            timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
    }

    // Diffrint From weeks
    function createTaskRowsTimePeriodsForDays(startMonth, numMonths) {
        const dayElContainer = document.createElement("div");
        dayElContainer.className = "gantt-time-period-cell-container";
        dayElContainer.style.gridTemplateColumns = `repeat(${numMonths}, 1fr)`;

        containerTimePeriods.appendChild(dayElContainer);

        tasks.forEach((task) => {
        let month = new Date(startMonth);
        for (let i = 0; i < numMonths; i++) {
            const timePeriodEl = document.createElement("div");
            timePeriodEl.className = "gantt-time-period";
            dayElContainer.appendChild(timePeriodEl);

            const currYear = month.getFullYear();
            const currMonth = month.getMonth() + 1;

            const numDays = getDaysInMonth(currYear, currMonth);

            for (let i = 1; i <= numDays; i++) {
            let dayEl = document.createElement("div");
            dayEl.className = "gantt-time-period-cell";

            // color weekend cells differently
            const dayOfTheWeek = getDayOfWeek(currYear, currMonth - 1, i - 1);
            if (dayOfTheWeek === "S") {
                dayEl.style.backgroundColor = "#f7f7f7";
            }

            // add task and date data attributes
            const formattedDate = createFormattedDateFromStr(
                currYear,
                currMonth,
                i
            );
            dayEl.dataset.task = task.id;
            dayEl.dataset.date = formattedDate;
            timePeriodEl.appendChild(dayEl);
            }

            month.setMonth(month.getMonth() + 1);
        }
        });
    }

    // Diffrint From weeks
    function addTaskDurationsForDays() {
        tasks.forEach((taskDuration) => {
        const dateStr = createFormattedDateFromDate(taskDuration.start);
        // find gantt-time-period-cell start position
        const startCell = containerTimePeriods.querySelector(
            `div[data-task="${taskDuration.id}"][data-date="${dateStr}"]`
        );

        if (startCell) {
            // taskDuration bar is a child of start date position of specific task
            createTaskDurationElForDays(taskDuration, startCell);
        }
        });
    }

    // Diffrint From weeks
    function createTaskDurationElForDays(taskDuration, startCell) {
        const dayElContainer = containerTimePeriods.querySelector(
        ".gantt-time-period-cell-container"
        );
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        taskDurationEl.id = taskDuration.id;

        const days = dayDiff(taskDuration.start, taskDuration.end);
        taskDurationEl.style.width = `calc(${days} * 100%)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return days;
    }


    // re-create Grid if year / month selection changes
    // fromSelectYear.addEventListener("change", createGrid);
    // fromSelectMonth.addEventListener("change", createGrid);
    // toSelectYear.addEventListener("change", createGrid);
    // toSelectMonth.addEventListener("change", createGrid);

}

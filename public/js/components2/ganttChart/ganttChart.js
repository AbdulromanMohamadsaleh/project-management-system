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
    let monthOptionsHTMLStrArr = [];
    for (let i = 0; i < months.length; i++)
    {
        if(i==tasks[0].start.getDaysInMonth){
            monthOptionsHTMLStrArr.push(`<option  selected value="${i}">${months[i]}</option>`);
        }else{
            monthOptionsHTMLStrArr.push(`<option value="${i}">${months[i]}</option>`);
        }

    }

    const years = [];
    for (let i = tasks[tasks.length-1].start.getFullYear(); i <= tasks[tasks.length-1].end.getFullYear(); i++) {
        if(i==tasks[0].start.getFullYear()){
            years.push(`<option selected value="${i}">${i}</option>`);
        }else{
            years.push(`<option value="${i}">${i}</option>`);
        }
    }

    const fromSelectYear = contentFragment.querySelector("#from-select-year");
    const fromSelectMonth = contentFragment.querySelector("#from-select-month");
    const toSelectYear = contentFragment.querySelector("#to-select-year");
    const toSelectMonth = contentFragment.querySelector("#to-select-month");

    fromSelectMonth.innerHTML = `
        ${monthOptionsHTMLStrArr.join("")}
    `;
    fromSelectYear.innerHTML = `
        ${years.join("")}
    `;
    toSelectMonth.innerHTML = `
        ${monthOptionsHTMLStrArr.join("")}
    `;
    toSelectYear.innerHTML = `
        ${years.join("")}
    `;

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

    function createGrid(startMonth,endMonth) {
        var ProjectWeekCounter=1;

        // const startMonth = new Date(
        // parseInt(fromSelectYear.value),
        // parseInt(fromSelectMonth.value)
        // );
        // const endMonth = new Date(
        // parseInt(toSelectYear.value),
        // parseInt(toSelectMonth.value)
        // );
        let numMonths = monthDiff(startMonth, project.DATE_END) + 1;
        // console.log(endMonth)
        // clear first each time it is changed
        containerTasks.innerHTML = "";
        containerTimePeriods.innerHTML = "";
        console.log(numMonths)
        // numMonths =12;
        createTaskRows();

        createMonthsNameRow(startMonth, numMonths);
        createDaysRow(startMonth, numMonths);
        createProjectWeeksRow(startMonth, numMonths,startMonth,endMonth);

        // createDaysOfTheWeekRow(startMonth, numMonths);
        // createProjectWeekRow(startMonth, numMonths,tasks,ProjectWeekCounter);

        createTaskRowsTimePeriods(startMonth, numMonths);
        addTaskDurations();
    }

    createGrid(project.DATE_START,project.DATE_END);

    ganttChartElement.appendChild(contentFragment);

    function createTaskRows() {
        // first 4 rows are empty
        for (let i = 0; i < 3; i++) {
            const emptyRow = document.createElement("div");
            emptyRow.className = "gantt-task-row";
            const taskRowElInput = document.createElement("input");
            taskRowElInput.readOnly= true;
            taskRowElInput.style.fontWeight="bold"
            if(i==0)
                taskRowElInput.value='Month'
            else if(i==1)
            taskRowElInput.value='Day'
            else if(i==2)
            taskRowElInput.value='Project Week'
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

    function createMonthsNameRow(startMonth, numMonths) {

        // Drow grid Year Header
        containerTimePeriods.style.gridTemplateColumns = `repeat(${numMonths}, 250px)`;

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

    function createDaysRow(startMonth, numMonths) {
        let month = new Date(startMonth);

        for (let i = 0; i < numMonths; i++) {
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period";
                timePeriodEl.style.width = `250px`;

        containerTimePeriods.appendChild(timePeriodEl);

        // add days as children
        const numDays = getDaysInMonth(month.getFullYear(), month.getMonth() + 1);
        //     const currYear = month.getFullYear();
        // const currMonth = month.getMonth() + 1;
        let weekCounte=1;
        for (let i = 1; i <= numDays; i++) {


            const dayOfTheWeek = getDayOfWeek(month.getFullYear(),month.getMonth(), i - 1);
            if(dayOfTheWeek=='M'){
                const dayElSpan = document.createElement("span");
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period";
                dayElSpan.innerHTML = i;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                // console.log('Week '+ weekCounte)
                weekCounte++;

            }
        }
        if((weekCounte-1)==4){
                  const dayElSpan = document.createElement("span");
            let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period";
                dayElSpan.innerHTML = 0;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
    }

    function createProjectWeeksRow(startMonth, numMonths,startDate,endDate) {
        // let a = new Date(startDate.getFullYear(),startDate.getMonth() ,startDate.getDay());
        console.log(startDate);
        let month = new Date(startMonth);
        let flagStartWeek = false;
        let weekCounte=1;
        let Count7Days =0;
        let numWeeks = diff_weeks(project.DATE_START, project.DATE_END);
        for (let i = 0; i < numMonths; i++) {
            let weekCounter2=0;
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period-week-counter";
                timePeriodEl.style.width = `250px`;

        containerTimePeriods.appendChild(timePeriodEl);

        // add days as children
        const numDays = getDaysInMonth(month.getFullYear(), month.getMonth() + 1);

        for (let i = 1; i <= numDays; i++) {
            Count7Days++;
            const dayOfTheWeek = getDayOfWeek(month.getFullYear(),month.getMonth(), i - 1);

            let b = new Date(month.getFullYear(),month.getMonth(), i);


            // console.log(b)
            // if(dayOfTheWeek=='M'){
           if((startDate.getFullYear() === b.getFullYear()) && (startDate.getMonth() === b.getMonth()) && (startDate.getDate() === b.getDate())){
            flagStartWeek=true;
            const dayElSpan = document.createElement("span");
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-week-counter";

                    dayElSpan.innerHTML = weekCounte;
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
                    timePeriodEl.style.width = `50px`;
                    weekCounte++;
                    continue;
           }
            //  console.log(flagStartWeek , Count7Days )
            if(flagStartWeek && Count7Days===7 ){
                 weekCounter2++;
                    const dayElSpan = document.createElement("span");
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-week-counter";
                        // console.log("numWeeks:",numWeeks)

                    dayElSpan.innerHTML = weekCounte;
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
                     timePeriodEl.style.width = `50px`;
                    weekCounte++;
                    let endB = new Date(month.getFullYear(),month.getMonth(), i);
                    // if(endDate.getTime()==endB.getTime() || numWeeks<weekCounte){
                    //     return;
                    // }
            }else if(Count7Days===7){
            weekCounter2++;

                const dayElSpan = document.createElement("span");
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-week-counter";
                    dayElSpan.innerHTML = " ";
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
                    timePeriodEl.style.width = `50px`;

            }

            if(Count7Days===7)
                Count7Days=0;

        }
if((weekCounter2)==4){
                  const dayElSpan = document.createElement("span");

            let dayEl = document.createElement("div");
                 dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = " ";
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
    }


    function createDaysOfTheWeekRow(startMonth, numMonths) {
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


    function createProjectWeekRow(startMonth, numMonths,tasks,ProjectWeekCounter) {
        let month = new Date(startMonth);


        let numWeeks = diff_weeks(project.DATE_START, project.DATE_END);
        const  numDays = getDiffNumberOfDays(project.DATE_START, project.DATE_END);
        let dayCounterr =0;
        let countDayBeforeMonthEnd=0;

        for (let j = 0; j < numMonths; j++) {
            let timePeriodEl = document.createElement("div");
            timePeriodEl.className = "gantt-time-period-project-weeks";
            containerTimePeriods.appendChild(timePeriodEl);
            let numOfDaysInMonth = getDaysInMonth(month.getFullYear(), month.getMonth() + 1);

        // add days as children
            // console.log(dayCounterr)
            let firstDayOfMonth=true;
        for (let i = 1; i <= numOfDaysInMonth; i++) {

            dayCounterr++;


                if(dayCounterr == 7 ){
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-weeks";
                    ;
                    const dayElSpan = document.createElement("span");
                    // if(firstDayOfMonth == true){
                    //     let minWid = (7-countDayBeforeMonthEnd)*30;
                    //     // console.log('min width: '+minWid)
                    // dayEl.style.minWidth = 0;
                    // dayEl.style.width = minWid+"px";
                    // firstDayOfMonth=false;
                    // }

                if(numWeeks >= ProjectWeekCounter){
                        dayElSpan.innerHTML = `Week ${ProjectWeekCounter}`;
                        // console.log(ProjectWeekCounter)
                        dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);

                        if(numWeeks < ProjectWeekCounter)
                            return;


                        ProjectWeekCounter++;

                }
                dayCounterr=0;

            }

        }
        countDayBeforeMonthEnd=dayCounterr;

        month.setMonth(month.getMonth() + 1);
        }

    }

    function createTaskRowsTimePeriods(startMonth, numMonths) {
        console.log(numMonths)
        const dayElContainer = document.createElement("div");
        dayElContainer.className = "gantt-time-period-cell-container";
        dayElContainer.style.gridTemplateColumns = `repeat(${numMonths}, 250fr)`;

        containerTimePeriods.appendChild(dayElContainer);

        tasks.forEach((task) => {
        let month = new Date(startMonth);
        for (let i = 0; i < numMonths; i++) {
            let weekCounter = 0;
            const timePeriodEl = document.createElement("div");
            timePeriodEl.className = "gantt-time-period";

            dayElContainer.appendChild(timePeriodEl);

            const currYear = month.getFullYear();
            const currMonth = month.getMonth() + 1;

            const numDays = getDaysInMonth(currYear, currMonth);

            for (let i = 1; i <= numDays; i++) {
                const dayOfTheWeek = getDayOfWeek(currYear, currMonth - 1, i - 1);
                if (dayOfTheWeek === "M") {
                    weekCounter++;

                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-cell";
                    // color weekend cells differently
                    if (dayOfTheWeek === "S") {
                        // dayEl.style.background= "#ECF0F1";
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

            };

            }
 if((weekCounter)==4){
                  const dayElSpan = document.createElement("span");
            let dayEl = document.createElement("div");
                 dayEl.className = "gantt-time-period-cell";
                dayElSpan.innerHTML = " ";
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }
            month.setMonth(month.getMonth() + 1);
        }
        });
    }

    function addTaskDurations() {
        tasks.forEach((taskDuration) => {
        const dateStr = createFormattedDateFromDate(taskDuration.start);
        // find gantt-time-period-cell start position
        const startCell = containerTimePeriods.querySelector(
            `div[data-task="${taskDuration.id}"][data-date="${dateStr}"]`
        );

        if (startCell) {
            // taskDuration bar is a child of start date position of specific task
            createTaskDurationEl(taskDuration, startCell);
        }
        });
    }

    function createTaskDurationEl(taskDuration, startCell) {
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
    fromSelectYear.addEventListener("change", createGrid);
    fromSelectMonth.addEventListener("change", createGrid);
    toSelectYear.addEventListener("change", createGrid);
    toSelectMonth.addEventListener("change", createGrid);

}

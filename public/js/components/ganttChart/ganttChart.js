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

const outlineColor = "#e9eaeb";

export function GanttChart(ChartType,ganttChartElement, tasks, project,lastTaskEndDate,firstTaskStartDate) {

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


    function createGridWeeks(startMonth,endMonth) {
        var ProjectWeekCounter=1;

        let numMonths = monthDiff(startMonth, endMonth) + 1;
        // console.log(numMonths)
        // clear first each time it is changed
        containerTasks.innerHTML = "";
        containerTimePeriods.innerHTML = "";
        // console.log(numMonths)

        // numMonths =12;
        createTaskRowsForWeeks();
        createMonthsNameRow(startMonth, numMonths);
        createDaysRowForWeeks(startMonth, numMonths);
        createProjectWeeksRow(startMonth, numMonths,startMonth,endMonth);

        createTaskRowsTimePeriodsForWeeks(startMonth, numMonths);
        addTaskDurationsForWeeks();
    }

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
        //

        const numMonths = monthDiff(startMonth, endMonth) + 1;
        // clear first each time it is changed
        containerTasks.innerHTML = "";
        containerTimePeriods.innerHTML = "";

        createTaskRowsForDays();
        createMonthsRow(startMonth, numMonths);
        createDaysRowForDays(startMonth, numMonths);

        createDaysOfTheWeekRowForDays(startMonth, numMonths);
        // createProjectWeekRow(startMonth, numMonths,tasks,ProjectWeekCounter);
        createProjectWeeksRowForDay(startMonth, numMonths,startMonth,endMonth);

        createTaskRowsTimePeriodsForDays(startMonth, numMonths);
        addTaskDurationsForDays();
    }

    // console.log(project)
    switch (ChartType) {
        case "Day":
            createGridDays(project.DATE_START,project.DATE_END);
            break;
        case "Week":
            createGridWeeks(project.DATE_START,project.DATE_END);
             break;
        case "Month":
            // createGridWeeks(firstTaskStartDate,lastTaskEndDate);
            break;
        default:
            // createGridWeeks(firstTaskStartDate,lastTaskEndDate);
            break;
    }


    ganttChartElement.appendChild(contentFragment);

    //  From Weeks
    function createTaskRowsForWeeks() {
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

    //  From Weeks
    function createDaysRowForWeeks(startMonth, numMonths) {
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

     //  For Weeks
    function createProjectWeeksRow(startMonth, numMonths,startDate,endDate) {


        let month = new Date(startMonth);
        let flagStartWeek = false;
        let weekCounte=1;
        let Count7Days =0;
        let TotalProjectWeeks = diff_weeks(startDate, endDate);
        // console.log("weeks hhhhh: " + numWeeks)
        TotalProjectWeeks+=1;
        for (let i = 0; i < numMonths; i++) {
            let weekCounter2=0;
            const timePeriodEl = document.createElement("div");
            timePeriodEl.className = "gantt-time-period-week-counter";
            timePeriodEl.style.width = `250px`;
            containerTimePeriods.appendChild(timePeriodEl);

        // add days as children
        const numDays = getDaysInMonth(month.getFullYear(), month.getMonth() + 1);
        let weekCounteInAmonthPrinted=0;

        for (let i = 1; i <= numDays; i++) {
            // Test TO KNOW 0 WEEK

            const dayOfTheWeek = getDayOfWeek(month.getFullYear(),month.getMonth(), i - 1);

            if(dayOfTheWeek=='M'){
                weekCounter2++;
                }

            Count7Days++;

            let b = new Date(month.getFullYear(),month.getMonth(), i);


            // console.log(b)
            // if(dayOfTheWeek=='M'){
            if((startDate.getFullYear() === b.getFullYear()) && (startDate.getMonth() === b.getMonth()) && (startDate.getDate() === b.getDate())){
            // console.log(startDate.getDate(), b.getDate())
            flagStartWeek=true;
            if(Count7Days!=7){
                if(timePeriodEl.hasChildNodes()){
                    timePeriodEl.lastChild.remove()
                }
            }
                const dayElSpan = document.createElement("span");
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period-week-counter";

                dayElSpan.innerHTML = weekCounte;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                timePeriodEl.style.width = `50px`;
                weekCounte++;
                weekCounteInAmonthPrinted++;
                // weekCounter2++
                continue;
            }

            if(weekCounte > TotalProjectWeeks){
                break;
            }

            //  console.log(flagStartWeek , Count7Days )
            if( flagStartWeek && Count7Days === 7 ){
                //  weekCounter2++;

                weekCounteInAmonthPrinted++;
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
            // weekCounter2++;
                // console.log("Day "+b.getDate())
                weekCounteInAmonthPrinted++;
                const dayElSpan = document.createElement("span");
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-week-counter";
                    dayElSpan.innerHTML = " ";
                    dayEl.dataset.span = 'continue'
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
                    timePeriodEl.style.width = `50px`;

            }

            if(Count7Days===7)
                Count7Days=0;


            }
            // console.log("Month: " + i +" number of weeks: " + weekCounter2,"Week Printed: "+ weekCounteInAmonthPrinted)
            if(weekCounter2 == 4 && weekCounteInAmonthPrinted == 5 && flagStartWeek){
                timePeriodEl.lastChild.remove()
                let dayEl = document.createElement("div");
                const dayElSpan = document.createElement("span");
                dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = " ";
                dayEl.dataset.span = 'continue'
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                weekCounte--;

            }else if(weekCounter2 > weekCounteInAmonthPrinted  && flagStartWeek){
                // timePeriodEl.lastChild.remove()
                let dayE2 = document.createElement("div");
                const dayElSpan2 = document.createElement("span");
                dayE2.className = "gantt-time-period-week-counter";
                dayElSpan2.innerHTML = weekCounte;
                dayE2.appendChild(dayElSpan2);
                timePeriodEl.appendChild(dayE2);
                timePeriodEl.style.width = `50px`;
// console.log("week"+weekCounte)
                weekCounte++;
            }


            if((weekCounter2)==4){
                const dayElSpan = document.createElement("span");

            let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = " ";
                dayEl.dataset.span = 'continue'
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
    }

    //  For Weeks
    function createTaskRowsTimePeriodsForWeeks(startMonth, numMonths) {

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
                    dayEl.classList.add("for-weeks");
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
                    let j = i+6
                    let formattedDateEnd ;
                    if(j>numDays){
                        j = j-numDays;
                        let tempYear
                        if(currYear==12){
                            currYear=1;
                            tempYear = currYear+1;
                             formattedDateEnd = createFormattedDateFromStr(
                            tempYear,
                            currMonth,
                            j
                        );
                        }else{

                             formattedDateEnd = createFormattedDateFromStr(
                                currYear,
                                currMonth+1,
                                j
                            );
                        }
                    }else{
                         formattedDateEnd = createFormattedDateFromStr(
                            currYear,
                            currMonth,
                            j
                        );
                    }
                    // j = j>numDays ? j-numDays : j;


                    dayEl.dataset.task = task.id;
                    dayEl.dataset.date = formattedDate;
                    dayEl.dataset.endPeriod = formattedDateEnd;

                    timePeriodEl.appendChild(dayEl);

            };

            }
            if((weekCounter)==4){
                  const dayElSpan = document.createElement("span");
            let dayEl = document.createElement("div");
                 dayEl.className = "gantt-time-period-cell";
                  dayEl.classList.add("for-weeks");
                dayElSpan.innerHTML = " ";
                dayEl.dataset.task = task.id;
                dayEl.dataset.span = 'continue';
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }
            month.setMonth(month.getMonth() + 1);
        }
        });
    }

     //  For Weeks
    function addTaskDurationsForWeeks() {
        // console.log(taskDuration)
        tasks.forEach((taskDuration) => {
        const dateStr = createFormattedDateFromDate(taskDuration.start);
        const dateEnd = createFormattedDateFromDate(taskDuration.end);
        // find gantt-time-period-cell start position




        let cells = containerTimePeriods.querySelectorAll(
            `div[data-task="${taskDuration.id}"]`
        );
        // console.log(cells)
        let StartPeriodTask;

        for(let h = 0;h<cells.length;h++){
            // console.log(dateStr)
            if (dateStr >= cells[h].dataset.date && dateStr <= cells[h].dataset.endPeriod) {
            StartPeriodTask = cells[h].dataset.date;
                break;
            }
        }
        // cells.forEach(element => {
        // });
        // console.log("Task: " + + StartPeriodTask)
        const startCell = containerTimePeriods.querySelector(
            `div[data-task="${taskDuration.id}"][data-date="${StartPeriodTask}"]`
        );

        if (startCell) {
                    // console.log(startCell)


            // taskDuration bar is a child of start date position of specific task
            createTaskDurationElForWeeks(taskDuration, startCell,cells,dateStr,dateEnd);
        }
        });
    }

    //  For Weeks
    function createTaskDurationElForWeeks(taskDuration, startCell,cells,dateStr,dateEnd) {


        const dayElContainer = containerTimePeriods.querySelector(
        ".gantt-time-period-cell-container"
        );
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        taskDurationEl.id = taskDuration.id;
            // console.log(taskDuration)
            let weekSpanCounter=1;
            let countContinue = 0;
            const weeks = diff_weeks(taskDuration.start, taskDuration.end);
            // if(weeks==1)
            //     weekSpanCounter=0;
        // while(dateStr > cells[h].dataset.date && dateStr < cells[h].dataset.endPeriod){
        // let cellNumber=0;
        // while(cells[cellNumber].dataset.endPeriod <= dateEnd && cells[cellNumber].dataset.date >= dateStr){
        //     cellNumber++;
        //     console.log(cells[cellNumber].dataset.date,dateEnd)
        //     // console.log(cellNumber,cells[cellNumber])
        //     weekSpanCounter++;
        //     if(cells[cellNumber+1].dataset.span =='continue'){
        //         cellNumber+=1;
        //         weekSpanCounter++;
        //     }

        // }
            let FlagCountSpan = false
            for(let h = 0;h<cells.length;h++){
                // console.log((cells[cells.length-1]))
                if(cells[h].dataset.endPeriod > dateEnd){
                    // console.log(cells[h].dataset.endPeriod)
                    break;
                }

                if(cells[h].dataset.span =='continue' && FlagCountSpan){
                    console.log( taskDuration.id+ ": "+cells[h].dataset.span)

                    weekSpanCounter++;
                    countContinue++;
                }

                if ((cells[h].dataset.date >= dateStr  && cells[h].dataset.endPeriod <= dateEnd)) {
                    FlagCountSpan = true;
                    weekSpanCounter++;
                }
        }
        //   if(weekSpanCounter == 1 || weeks == 0){
        //     weekSpanCounter=0;
        // }
        weekSpanCounter++
        if(weekSpanCounter==2&&weeks==0)
            weekSpanCounter=1;

        // console.log("weekSpanCounter: " + weekSpanCounter,"weeks: "+weeks);
        // console.log(weekSpanCounter)
        //  console.log("=========================")
        // console.log(taskDuration.id+" "+weeks)
        // let add = weekSpanCounter*0.020;
        // taskDurationEl.style.width = `calc(${weekSpanCounter+add} * 100%)`;
        // console.log("Task ID: "+taskDuration.id+" = "+weeks + "  continue"+ countContinue)
        taskDurationEl.style.width = `calc(${weeks+1+countContinue} * 100%)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return weekSpanCounter;
    }





    //  From Days
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

    //  From Days
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

    //  From Days
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

    //  For Days
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

    //  For Days
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

    //  For Days
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

    //  For Days
    function createTaskDurationElForDays(taskDuration, startCell) {
        
        if(taskDuration.start==taskDuration.end || getDiffNumberOfDays(taskDuration.start,taskDuration.end)==0){

            let weekSpanCounter=1;
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        taskDurationEl.id = taskDuration.id;

        taskDurationEl.style.width = `calc(${weekSpanCounter} * 100%)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return
        }

        const dayElContainer = containerTimePeriods.querySelector(
        ".gantt-time-period-cell-container"
        );
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        taskDurationEl.id = taskDuration.id;
        const days = dayDiff(taskDuration.start, taskDuration.end);
        let add = days*0.036;
    // console.log("Add: "+add);

        taskDurationEl.style.width = `calc(${days-1+add} * 100%)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return days;
    }

 //  For Days
    function createProjectWeeksRowForDay(startMonth, numMonths,startDate,endDate) {

        let flagStartWeek = false;
        let numWeeks = diff_weeks(startDate, endDate);
        numWeeks++;
        // console.log(""numWeeks)

        let month = new Date(startMonth);
        let weekCounter=1;
        let daysCounter=0;

        for (let i = 0; i < numMonths; i++) {
        const timePeriodEl = document.createElement("div");
        timePeriodEl.className = "gantt-time-period";
        containerTimePeriods.appendChild(timePeriodEl);

        // add days of the week as children
        const currYear = month.getFullYear();
        const currMonth = month.getMonth() + 1;
        const numDays = getDaysInMonth(currYear, currMonth);

        for (let i = 1; i <= numDays; i++) {

                let b = new Date(month.getFullYear(),month.getMonth(), i);
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period";
                const dayOfTheWeek = getDayOfWeek(currYear, currMonth - 1, i - 1);
                const dayElSpan = document.createElement("span");

            if((startDate.getFullYear() === b.getFullYear()) && (startDate.getMonth() === b.getMonth()) && (startDate.getDate() === b.getDate())){
               daysCounter = 1;
                flagStartWeek=true;
                dayElSpan.innerHTML = `Week ${weekCounter}`;
                dayEl.style.width = "210px"
                dayEl.classList.add("week-counter-label-for-day");
                dayEl.appendChild(dayElSpan);
            timePeriodEl.appendChild(dayEl);
            weekCounter++
                continue;

           }

           if(flagStartWeek&& daysCounter == 7){
                // dayElSpan.innerHTML = dayOfTheWeek;
                dayElSpan.innerHTML = `Week ${weekCounter}`;
                dayEl.style.width = "210px"
                daysCounter=0;
                weekCounter++
                dayEl.classList.add("week-counter-label-for-day");

           }
           else{
               dayElSpan.innerHTML = "";
            }
            if(flagStartWeek)
                daysCounter++;

            dayEl.appendChild(dayElSpan);
            timePeriodEl.appendChild(dayEl);
             if(numWeeks<weekCounter){
                    // console.log("numWeeks: "+numWeeks,"weekCounter: "+weekCounter)
                    flagStartWeek=false;

                }
        }

        month.setMonth(month.getMonth() + 1);
        }
    }


    // re-create Grid if year / month selection changes
    // fromSelectYear.addEventListener("change", createGrid);
    // fromSelectMonth.addEventListener("change", createGrid);
    // toSelectYear.addEventListener("change", createGrid);
    // toSelectMonth.addEventListener("change", createGrid);

}


function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}

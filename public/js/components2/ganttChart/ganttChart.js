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

export function GanttChart(ChartType,ganttChartElement, project) {

    const color = [{act:'#bfcbe5',task:'#dae5ed'},
                    {act:'#e4b2b0',task:'#f2dede'},
                    {act:'#d7e5b9',task:'#eaf2de'},
                    {act:'#cbbfd8',task:'#e2dfea'}
                ];

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
        // clear first each time it is changed
        containerTasks.innerHTML = "";
        containerTimePeriods.innerHTML = "";

        // numMonths =12;
        createTaskRows("Week");
        createMonthsRow(startMonth, numMonths,"Week");

        let printedWeekCounter = 0;

        printedWeekCounter = createDaysRowForWeeks(startMonth, numMonths,printedWeekCounter);


        createProjectWeeksRow(startMonth, numMonths,startMonth,endMonth,printedWeekCounter);

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

        createTaskRows("Day");
        createMonthsRow(startMonth, numMonths,"Day");
        createDaysRowForDays(startMonth, numMonths);

        createDaysOfTheWeekRowForDays(startMonth, numMonths);
        createProjectWeeksRowForDay(startMonth, numMonths,startMonth,endMonth);

        createTaskRowsTimePeriodsForDays(startMonth, numMonths);
        addTaskDurationsForDays();
    }

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

    //  All
    function createTaskRows(chartType) {
        // first 4 rows are empty

        if(chartType == "Week"){
            for (let i = 0; i < 3; i++) {
                const emptyRow = document.createElement("div");
                emptyRow.className = "gantt-task-row";
                emptyRow.style.background = "rgb(247, 247, 247)"
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
        }else if(chartType == "Day"){
            for (let i = 0; i < 4; i++) {
            const emptyRow = document.createElement("div");
            emptyRow.className = "gantt-task-row";
            emptyRow.style.background = "rgb(247, 247, 247)"
            const taskRowElInput = document.createElement("input");
            taskRowElInput.readOnly= true;
            taskRowElInput.style.fontWeight="bold"
            // taskRowElInput.style.color = "white"

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
        }

        // add task select values
       let taskOptionsHTMLStrArr = [];

        let a=0;
        let t=0;

        project.activity.forEach((act, index)=> {
                    if(a==4)
                        a=0;
                    const taskRowEl = document.createElement("div");
                    taskRowEl.id = act.ACTIVITY_ID;
                    taskRowEl.className = "gantt-task-row";

                    const taskRowElInput = document.createElement("input");
                    taskRowElInput.readOnly= true;
                    taskRowElInput.style.fontWeight = "bold"
                    taskRowEl.appendChild(taskRowElInput);
                    // taskRowEl.style.maxWidth =  "250px";
                    taskRowEl.style.background = color[a].act;


                    taskRowElInput.value = (index+1) + ". " +act.ACTIVITY_NAME;

        containerTasks.appendChild(taskRowEl);

                        act.tasks.forEach((task, indexx) => {

                        const taskRowEl = document.createElement("div");
                        taskRowEl.id = task.TASK_ID;
                        taskRowEl.className = "gantt-task-row";

                        const taskRowElInput = document.createElement("input");
                        taskRowElInput.readOnly= true;
                        taskRowEl.appendChild(taskRowElInput);
                        taskRowEl.style.background = color[a].task;
                        taskRowElInput.value = (index+1)+"."+(indexx+1) + ". " + task.TASK_NAME;


                            // Removed
                        taskOptionsHTMLStrArr.push(
                            `<option value="${task.TASK_ID}">${task.TASK_NAME}</option>`
                        );
                                    containerTasks.appendChild(taskRowEl);


                    })

                    a++;
                    // add delete button
                    // const taskRowElDelBtn = document.createElement("button");
                    // taskRowElDelBtn.innerText = "✕";
                    // taskRowEl.appendChild(taskRowElDelBtn);

        });
        taskSelect.innerHTML = `
        ${taskOptionsHTMLStrArr.join("")}
        `;
    }



    //  From Weeks
    function createDaysRowForWeeks(startMonth, numMonths,printedWeekCounter) {

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
                printedWeekCounter++;
                const dayElSpan = document.createElement("span");
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period";

                dayElSpan.innerHTML = i;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                weekCounte++;

            }
        }
        if((weekCounte-1)==4){
            printedWeekCounter++;
                const dayElSpan = document.createElement("span");
            let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period";
                dayElSpan.innerHTML = 0;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }

        month.setMonth(month.getMonth() + 1);
        }
          return printedWeekCounter
    }

     //  For Weeks
    function createProjectWeeksRow(startMonth, numMonths,startDate,endDate,printedWeekCounter) {


        let month = new Date(startMonth);
        let flagStartWeek = false;
        let weekCounte=1;
        let Count7Days =0;
        let totalWeeksSubtracted = 0;
        let totalProntedWeeksForCheck = 0;
        let TotalProjectWeeks = diff_weeks(startDate, endDate);
        TotalProjectWeeks;
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



            if((startDate.getFullYear() === b.getFullYear()) && (startDate.getMonth() === b.getMonth()) && (startDate.getDate() === b.getDate())){
            flagStartWeek=true;
            if(Count7Days!=7){
                if(timePeriodEl.hasChildNodes()){
                    timePeriodEl.lastChild.remove()
                    totalWeeksSubtracted--;
                }
            }
                const dayElSpan = document.createElement("span");
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = weekCounte;
                totalProntedWeeksForCheck++;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                timePeriodEl.style.width = `50px`;
                weekCounte++;
                weekCounteInAmonthPrinted++;
                continue;
            }
            if(weekCounte > TotalProjectWeeks){
                break;
            }

            if( flagStartWeek && Count7Days === 7 ){

                weekCounteInAmonthPrinted++;
                const dayElSpan = document.createElement("span");
                let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period-week-counter";
                totalProntedWeeksForCheck++;
                dayElSpan.innerHTML = weekCounte;
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                timePeriodEl.style.width = `50px`;
                weekCounte++;
                    let endB = new Date(month.getFullYear(),month.getMonth(), i);

            }else if(Count7Days===7){


                const dayElSpan = document.createElement("span");
                    let dayEl = document.createElement("div");
                    dayEl.className = "gantt-time-period-week-counter";
                    dayElSpan.innerHTML = " ";
                    totalProntedWeeksForCheck++;
                    dayEl.dataset.span = 'continue'
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
                    timePeriodEl.style.width = `50px`;

            }

            if(Count7Days===7)
                Count7Days=0;


            }
            if(weekCounter2 == 4 && weekCounteInAmonthPrinted == 5 && flagStartWeek){

                timePeriodEl.lastChild.remove()
                weekCounte--;
                let dayEl = document.createElement("div");
                const dayElSpan = document.createElement("span");
                dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = " ";
                dayEl.dataset.span = 'continue';

                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
                totalWeeksSubtracted++;

            }else if(weekCounter2 > weekCounteInAmonthPrinted  && flagStartWeek){
                let dayE2 = document.createElement("div");
                const dayElSpan2 = document.createElement("span");
                dayE2.className = "gantt-time-period-week-counter";
                dayElSpan2.innerHTML = weekCounte;

                dayE2.appendChild(dayElSpan2);
                timePeriodEl.appendChild(dayE2);
                timePeriodEl.style.width = `50px`;
                weekCounte++;
            }


            if((weekCounter2)==4){
                const dayElSpan = document.createElement("span");
                totalWeeksSubtracted++;

            let dayEl = document.createElement("div");
                dayEl.className = "gantt-time-period-week-counter";
                dayElSpan.innerHTML = " ";
                dayEl.dataset.span = 'continue'
                dayEl.appendChild(dayElSpan);
                timePeriodEl.appendChild(dayEl);
        }

        if(totalProntedWeeksForCheck > weekCounter2){
            if(timePeriodEl.hasChildNodes()){
                let length = timePeriodEl.childNodes.length;
                if(length==6){
                    timePeriodEl.lastChild.remove()
                }
                 timePeriodEl.lastChild.innerHTML= " "

                    totalWeeksSubtracted--;
                    weekCounte--;

                }
    }

        totalProntedWeeksForCheck=0;
        month.setMonth(month.getMonth() + 1);
        }
    }

    //  For Weeks
    function createTaskRowsTimePeriodsForWeeks(startMonth, numMonths) {

        const dayElContainer = document.createElement("div");
        dayElContainer.className = "gantt-time-period-cell-container";
        dayElContainer.style.gridTemplateColumns = `repeat(${numMonths}, 250fr)`;

        containerTimePeriods.appendChild(dayElContainer);
        let a=0;
        project.activity.forEach((act)=>{
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
                        //  dayEl.style.background=color[a].task;
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


                        dayEl.dataset.task = act.ACTIVITY_ID;
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
                    dayEl.dataset.task = act.ACTIVITY_ID;
                    //  dayEl.style.background=color[a].task
                    dayEl.dataset.span = 'continue';
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
            }
                month.setMonth(month.getMonth() + 1);

            }


            act.tasks.forEach((task) => {
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


                        dayEl.dataset.task = task.TASK_ID;
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
                    dayEl.dataset.task = task.TASK_ID;
                    dayEl.dataset.span = 'continue';
                    dayEl.appendChild(dayElSpan);
                    timePeriodEl.appendChild(dayEl);
            }
                month.setMonth(month.getMonth() + 1);
            }
            });
             a++;
            if(a==4)
                a=0;

        });
    }

     //  For Weeks
    function addTaskDurationsForWeeks() {
        let a=0;

        project.activity.forEach((act)=>{

            act.tasks.forEach((taskDuration) => {
            taskDuration.START_DATE =new Date(taskDuration.START_DATE);
            taskDuration.END_DATE =new Date(taskDuration.END_DATE);
            const dateStr = createFormattedDateFromDate(taskDuration.START_DATE);
            const dateEnd = createFormattedDateFromDate(taskDuration.END_DATE);
            // find gantt-time-period-cell start position




            let cells = containerTimePeriods.querySelectorAll(
                `div[data-task="${taskDuration.TASK_ID}"]`
            );
            let StartPeriodTask;

            for(let h = 0;h<cells.length;h++){

                if (dateStr >= cells[h].dataset.date && dateStr <= cells[h].dataset.endPeriod) {
                StartPeriodTask = cells[h].dataset.date;
                    break;
                }

            }

            const startCell = containerTimePeriods.querySelector(
                `div[data-task="${taskDuration.TASK_ID}"][data-date="${StartPeriodTask}"]`
            );


            if (startCell) {

                // taskDuration bar is a child of start date position of specific task
                createTaskDurationElForWeeks(taskDuration, startCell,cells,dateStr,dateEnd,color[a].act);
            }

        });

        a++;
            if(a==4)
                a=0;
        });

    }

    //  For Weeks
    function createTaskDurationElForWeeks(taskDuration, startCell,cells,dateStr,dateEnd,color) {


        const dayElContainer = containerTimePeriods.querySelector(
        ".gantt-time-period-cell-container"
        );
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        if(taskDuration.STATUS==1){
             taskDurationEl.classList.add("done-task");
        }else{
            taskDurationEl.classList.add("proggress-task");
        }
        taskDurationEl.style.background = color;
        taskDurationEl.id = taskDuration.TASK_ID;

            let weekSpanCounter=1;
            let countContinue = 0;
            const weeks = diff_weeks(taskDuration.START_DATE, taskDuration.END_DATE);

            let FlagCountSpan = false
            for(let h = 0;h<cells.length;h++){
                if(cells[h].dataset.endPeriod > dateEnd){
                    break;
                }

                if(cells[h].dataset.span =='continue' && FlagCountSpan){

                    weekSpanCounter++;
                    countContinue++;
                }

                if ((cells[h].dataset.date >= dateStr  && cells[h].dataset.endPeriod <= dateEnd)) {
                    FlagCountSpan = true;
                    weekSpanCounter++;
                }
        }

        weekSpanCounter++
        if(weekSpanCounter==2&&weeks==0)
            weekSpanCounter=1;



        taskDurationEl.style.width = `calc(${weeks+1+countContinue} * 50px)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return weekSpanCounter;
    }


    // #######################################################


    //  From Days


    function createMonthsRow(startMonth, numMonths,chartType) {

        // Drow grid Year Header
        if(chartType=="Day"){
            containerTimePeriods.style.gridTemplateColumns = `repeat(${numMonths}, 1fr)`;
        }
        else if (chartType=="Week"){
            containerTimePeriods.style.gridTemplateColumns = `repeat(${numMonths}, 250px)`;
        }

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

        project.activity.forEach((act)=>{

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
            dayEl.dataset.task = act.ACTIVITY_ID;
            dayEl.dataset.date = formattedDate;
            timePeriodEl.appendChild(dayEl);
            }

            month.setMonth(month.getMonth() + 1);
        }
        act.tasks.forEach((task) => {
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
            dayEl.dataset.task = task.TASK_ID;
            dayEl.dataset.date = formattedDate;
            timePeriodEl.appendChild(dayEl);
            }

            month.setMonth(month.getMonth() + 1);
        }
        });


        })



    }

    //  For Days
    function addTaskDurationsForDays() {
        let a=0;
        project.activity.forEach((act)=>{
            act.tasks.forEach((taskDuration) => {

            taskDuration.START_DATE =new Date(taskDuration.START_DATE.split(" ")[0]);
            taskDuration.END_DATE =new Date(taskDuration.END_DATE.split(" ")[0]);
        const dateStr = createFormattedDateFromDate(taskDuration.START_DATE);
        // find gantt-time-period-cell start position
        const startCell = containerTimePeriods.querySelector(
            `div[data-task="${taskDuration.TASK_ID}"][data-date="${dateStr}"]`
        );

        if (startCell) {
            // taskDuration bar is a child of start date position of specific task

            createTaskDurationElForDays(taskDuration, startCell,color[a].act);
        }
        });
            a++;
            if(a==4)
                a=0;
        })

    }

    //  For Days
    function createTaskDurationElForDays(taskDuration, startCell,color) {

        if(taskDuration.START_DATE==taskDuration.END_DATE || getDiffNumberOfDays(taskDuration.START_DATE,taskDuration.END_DATE)==0){

            let weekSpanCounter=1;
        const taskDurationEl = document.createElement("div");
        taskDurationEl.classList.add("taskDuration");
        if(taskDuration.STATUS==1){

             taskDurationEl.classList.add("done-task");

        }else{
            taskDurationEl.classList.add("proggress-task");
        }
        taskDurationEl.id = taskDuration.TASK_ID;

        taskDurationEl.style.background = color;
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
        if(taskDuration.STATUS==1){
             taskDurationEl.classList.add("done-task");
        }else{
            taskDurationEl.classList.add("proggress-task");
        }
        taskDurationEl.id = taskDuration.TASK_ID;
        taskDurationEl.style.background = color;

        if(taskDuration.START_DATE> taskDuration.END_DATE){

            let temp =taskDuration.START_DATE;
            taskDuration.START_DATE = taskDuration.END_DATE;
            taskDuration.END_DATE = temp
        }

        const days = dayDiff(taskDuration.START_DATE, taskDuration.END_DATE);

        let add = days*0.036;

        taskDurationEl.style.width = `calc(${days} * 30px)`;

        // append at start pos
        startCell.appendChild(taskDurationEl);

        return days;
    }

 //  For Days
    function createProjectWeeksRowForDay(startMonth, numMonths,startDate,endDate) {

        let flagStartWeek = false;
        let numWeeks = diff_weeks(startDate, endDate);



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

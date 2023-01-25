import { createHtmlContentFragment } from "./htmlContent.js";
import {
  monthDiff,
  dayDiff,
  getDaysInMonth,
  getDayOfWeek,
  createFormattedDateFromStr,
  createFormattedDateFromDate,
} from "./utils.js";

export function GanttChart(ganttChartElement, tasks, taskDurations) {
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
  for (let i = 0; i < months.length; i++) {
    monthOptionsHTMLStrArr.push(`<option value="${i}">${months[i]}</option>`);
  }

  const years = [];
  for (let i = 2022; i <= 2050; i++) {
    years.push(`<option value="${i}">${i}</option>`);
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

  function createGrid() {
    const startMonth = new Date(
      parseInt(fromSelectYear.value),
      parseInt(fromSelectMonth.value)
    );
    const endMonth = new Date(
      parseInt(toSelectYear.value),
      parseInt(toSelectMonth.value)
    );
    const numMonths = monthDiff(startMonth, endMonth) + 1;

    // clear first each time it is changed
    containerTasks.innerHTML = "";
    containerTimePeriods.innerHTML = "";

    // createTaskRows();
    // createMonthsRow(startMonth, numMonths);
    // createDaysRow(startMonth, numMonths);
    // createDaysOfTheWeekRow(startMonth, numMonths);
    // createTaskRowsTimePeriods(startMonth, numMonths);
    // addTaskDurations();
  }

  createGrid();

  ganttChartElement.appendChild(contentFragment);
}

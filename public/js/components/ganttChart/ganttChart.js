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

  ganttChartElement.appendChild(contentFragment);
}

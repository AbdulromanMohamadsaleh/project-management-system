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

  ganttChartElement.appendChild(contentFragment);
}

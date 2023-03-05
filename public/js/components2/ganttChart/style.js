export function cssStyles() {
  const CELL_HEIGHT = 49;
  const outlineColor = "#e9eaeb";

  return `

.taskDuration.done-task::before{
    font-family: 'FontAwesome';
    content: "\\f00c";
    color: green;
    padding: 0 6px 0 0;
    position: absolute;
    font-size:1.3rem;
}


.taskDuration.done-task.orange::before{
    font-family: 'FontAwesome';
    content: "\\f00c";
    color: #FAAB78;
    padding: 0 6px 0 0;
    position: absolute;
    font-size:1.3rem;
}


.taskDuration.done-task::before,.taskDuration.proggress-task::before{
    right: -29px;
    top: -1px;
}

.task-duration-complete{
       position: relative;
    left: 125px;
    font-weight: bold;
    font-size: 0.83rem;
    width: max-content;
}

.centerTaskDate{
    display: flex;
    justify-content: end;
}

.taskDuration.proggress-task::before{
    content: "\\f017";
    font-family: 'FontAwesome';
    color: #FEBE8C;
    padding: 0 6px 0 0;
    position: absolute;
    font-size:1.3rem;
}


    * {
        box-sizing: border-box;
        margin: 0;
    }

    html {
      font-family: 'Montserrat', sans-serif;
    }

    h1 {
      font-size: 1.5rem;
    }

    fieldset {
        border:none;
        padding: 0.5rem;
    }

    fieldset label {
      margin-right: 10px;
    }

    #date > label:nth-child(3) {
      margin-left: 10px;
    }

    form button {
      width: 70px;
      height: 50px;
    }

    select {
      font-size: 1.2rem;
      padding: 0.2rem 0.2rem;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
    }

    input {
      font-family: 'Montserrat', sans-serif;
      height: 100%;
      padding: 10px 5px;
      border: 1px solid #EDEDED;
      border-radius: 5px;
      transition: 0.2s ease-out;
    }

    input:focus {
      outline-color: #0095e4;
    }

    button:hover {
      cursor: pointer;
    }

    .title {
      text-align: center;
      margin-bottom: 20px
    }

    #gantt-container {
      padding: 1rem;
    }

    #gantt-grid-container {
        display: grid;
        grid-template-columns: auto 1fr;
        outline: 2px solid ${outlineColor};

    }

    #gantt-grid-container, #settings > fieldset,
    #add-task, #add-task-duration  {
      border-radius: 5px;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
    }

    #gantt-grid-container__time {
      display: grid;
      overflow-x: auto;
    }

    .gantt-task-row {
        outline: 0.5px solid ${outlineColor};
        text-align: center;
        height: ${CELL_HEIGHT}px;
        // expand across whole grid
        grid-column: 1/-1;
        width: 100%;
        border: none;
    }

    .gantt-task-row button {
      border: none;
      height: ${CELL_HEIGHT}px;
    }

    .gantt-task-row input {
      width: fit-content;
      border: none;
      outline: none;
      background: none;
    }

    #gantt-grid-container__tasks button {
      color: #ef5350;
      background: none;
      border-radius: 5px;
      height: 20px;
      transition: all 0.2s ease;
    }

    #gantt-grid-container__tasks button:focus {
      outline: none;
      transform: scale(1.3);
    }

    #gantt-grid-container__tasks .gantt-task-row {
      padding: 2px 2px;
    }

    .gantt-time-period {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: minmax(30px, 1fr);
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};
        max-width: 930px;
    }

       .gantt-time-period-week-counter {
        display: grid;
        grid-auto-flow: column;
        // grid-auto-columns: minmax(50px, 1fr);
        width:50px;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};
        max-width: 930px;
        background: #95A5A6;
    }

      .gantt-time-period-week-counter-for-day {
        display: grid;
        grid-auto-flow: column;

        width:210px;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};

        background: #95A5A6;
    }

    .for-day .week-counter-label-for-day {
        background: #95A5A6;
        z-index: 1000;
        color:white;
    }


    .gantt-time-period-week-counter span{
        color:white;
        margin:auto;
    }
    .gantt-time-period-month {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: minmax(840px, 930px);
        max-width: 930px;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};
    }
    .gantt-time-period-month span {
        display: grid;
        grid-auto-flow: column;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};

        background: rgb(247, 247, 247);
        color: rgb(0, 0, 0);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .for-week .gantt-time-period-month span{
        max-width: 250px;
    }


    .gantt-time-period-weeks {
        display: grid;
        grid-auto-flow: column;
       max-width:100%;
       max-width:210px;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid ${outlineColor};
    }



    .gantt-time-period-project-weeks {

        max-width: 100%;
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: minmax(210px, 0.226fr);

        background: #f3f3f3;
        text-align: center;
        height: ${CELL_HEIGHT}px;
        outline: 0.5px solid #e9eaeb;
        // overflow: hidden;
    }

    .gantt-time-period-project-weeks .gantt-time-period{
        z-index: 1;
        background: #f3f3f3;
        // grid-auto-columns: minmax(210px, 1fr) !important;
    }

    .gantt-time-period span {
      margin: auto;
    }

    .gantt-time-period-cell-container {
      grid-column: 1/-1;
      display: grid;
    }

    .for-week .gantt-time-period-cell-container .gantt-time-period{
        width:250px;
    }

    .gantt-time-period-cell-container .gantt-time-period .for-weeks.gantt-time-period-cell{
        width: 50px;
    }

    .gantt-time-period-cell-container .gantt-time-period .gantt-time-period-cell-for-day{
        width: 30px;
    }

    .gantt-time-period-cell {
      position: relative;
      display: flex;
      align-items: center;
      outline: 0.5px solid ${outlineColor};
    }

    .day {
      color: #bbb;
    }

    #settings {
        display: flex;
        align-items: center;
        font-size: 14px;
        padding-bottom: 0.5rem;
    }

    .taskDuration {
      position: absolute;
      height: 30px;
      z-index: 1;
    background: #FF9494;
    border-radius: 5px;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
      cursor: pointer;
    }


    .taskDuration:focus {
      outline: 1px solid black;
    }

    .dragging {
      opacity: 0.5;
    }

    #add-forms-container {
      display: flex;
      flex-wrap: wrap;
      padding: 1rem 0;
      justify-content: space-between;
    }

    #add-forms-container form {
      padding: 1rem;
    }

    #add-forms-container form > * {
      display: flex;
      align-items: center;
    }

    #add-forms-container input {
      height: ${CELL_HEIGHT}px;
    }

    #add-task, #add-task-duration {
      margin-right: 10px;
      margin-bottom: 10px;
    }

    #add-forms-container button:hover,
    #add-forms-container button:focus {
      opacity: 0.85;
    }

    input[type=text], select {
      padding: 5px 7px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
    }


    #add-forms-container button {
      color: white;
      background: #2ade3c;
      font-size: 1.1rem;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
      padding: 0.5rem 1rem;
      border: 0;
      border-radius: 5px;
      transition: all 0.3s ease;
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
    }

    .tracker-period {
      padding: 1rem;
    }

    .tracker-period h1{
      margin-bottom: 16px;
    }

    .inner-form-container {
      display: flex;
      flex-direction: row
    }

    .inner-form-container h1 {
      margin-bottom: 0.5rem;
    }
  `;
}

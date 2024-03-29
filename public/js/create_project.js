    // {-- Activity Section --}
const projectStart = document.querySelector('input[name="projectStart"]');
projectStart.valueAsDate = new Date();

const addActivityButton = document.querySelector('#btnAddNewActivity')
const activityWraper = document.querySelector('#activityWrap')
const btnsAddTask = document.querySelectorAll('.btn-add-task');
let activityCounter = 1;

addActivityButton.addEventListener('click', addNewActivityInput)

btnsAddTask.forEach(btnAddTask => {
    btnAddTask.addEventListener('click', addNewTaskInput)
})

function addNewActivityInput() {
    activityCounter++
    let activityID = `activity-${activityCounter}-` + Math.floor(Math.random() * 100) + 1;

    const newActivityElement = `<hr >
                                <div class="mb-3 col-10 pt-4">
                                    <div class="input-group mb-3">
                                        <div class=" me-3 mt-2 fs-5" id="numbering"></div>
                                        <input id="ActivityBorder" class="form-control form-control-lg mb-3" name="activityName[]"
                                            type="text" placeholder="Activity "
                                            aria-label=".form-control-lg example" >
                                            <input type="text"   class="taskCounter" hidden name="taskCounter[]"  value="1">
                                    </div>
                                        <!-- Tasks -->
                                    <div class="taskWrap">
                                        <div class="row d-flex justify-content-end">

                                            <div class="mb-3 col-7">
                                            <div class="input-group mb-3">
                                                    <span class=" me-3 mt-2 fs-5" id="numberingTask">1</span>
                                                <input class="form-control form-control-lg mb-3"
                                                    id="TaskBorder" name="taskName[]"  type="text" placeholder="Task"
                                                    aria-label="Task">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control form-control-lg mb-3" id="taskDuration"
                                                    name="taskDuration[]"   type="number" min='1' placeholder="Day"
                                                    aria-label="Task">
                                            </div>
                                            <div class="mb-3 col-1">
                                                <button type="button" title="Delete Task" disabled
                                                        class="btn btn-danger btn-delete-task"><i class="bi bi-trash"></i></button>
                                            </div>
                                            <div class="mb-2 col-1 ttt task-1" >
                                                <button type="button" title="New Task"
                                                        class="btn btn-success btn-add-task ">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-1 pt-4">
                                                <button type="button" title="Delete Acivity" class="btn btn-danger delete-activity"><i class="bi bi-trash"></i></button>
                                    </div>
                                    <div class="col-1 pt-4" id='newrow'>
                                        <button onclick="Numbreings()" type="button" id="btnAddNewActivity"
                                            class="btn btn-success add-task"title="New Task">+</button>
                                    </div>
                            `





    const newCreatedDiv = document.createElement('div');
    newCreatedDiv.classList.add('row');

    newCreatedDiv.innerHTML = newActivityElement;
    activityWraper.appendChild(newCreatedDiv)
    newCreatedDiv.setAttribute('id', activityID);

    // Check is First Activity
    if (activityCounter - 1 == 1) {
        this.parentElement.remove()

    } else {

        newCreatedDiv.previousSibling.querySelector('#btnAddNewActivity').parentElement.remove()

    }
    const addActivityButton = document.querySelector('#btnAddNewActivity')
    addActivityButton.addEventListener('click', addNewActivityInput)
    // Add Task
    const btnsAddTask = document.querySelectorAll('.btn-add-task');
    btnsAddTask.forEach(btnAddTask => {
        btnAddTask.addEventListener('click', addNewTaskInput)

    })

    const newCreatedDivAddActivity = document.createElement('div');
    newCreatedDivAddActivity.classList.add('col-1');
    newCreatedDivAddActivity.classList.add('pt-4');
    newCreatedDivAddActivity.innerHTML = `
                                        <button type="button" id="btnAddNewActivity"
                                            class="btn btn-success add-task"title="New Task">+</button>
                                    `

    Numbreings()
                                    // Delete-activity
    newCreatedDiv.querySelector('.delete-activity').addEventListener('click', function(e) {
        activityCounter--


        // Not Last Sibling
        if (document.querySelector(`#${activityID}`).nextSibling != null) {
            // Dont Move Add Button

        } else {
            if (activityCounter == 1) {
                //  Move Add Button to First Activity
                const newCreatedDivAddActivity = document.createElement('div');
                newCreatedDivAddActivity.classList.add('col-1');
                newCreatedDivAddActivity.innerHTML = `
                                        <button type="button" id="btnAddNewActivity"
                                            class="btn btn-success add-task"title="New Task">+</button>
                                    `

                document.querySelector(`#activity-1`).appendChild(newCreatedDivAddActivity)
                const addActivityButton = document.querySelector('#btnAddNewActivity')
                addActivityButton.addEventListener('click', addNewActivityInput)

            } else {
                //  Move Add Button
                document.querySelector(`#${activityID}`).previousSibling.appendChild(
                    newCreatedDivAddActivity);
                const addActivityButton = document.querySelector('#btnAddNewActivity')
                addActivityButton.addEventListener('click', addNewActivityInput)

            }
        }

        document.querySelector(`#${activityID}`).remove()
        // this.parentElement.parentElement.remove()

        Numbreings()
    })
    // AddTaskDurationFunctionForNewTask()
}

function addNewTaskInput() {


    let elCountTask = this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        'div .taskWrap')

    let taskCounterInt = this.parentElement.parentElement.parentElement.parentElement.parentElement
        .querySelector(
            'div .taskWrap').childElementCount + 1

    this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector('div .taskCounter')
        .value = taskCounterInt;

    let ActivityCounter = this.parentElement.parentElement.parentElement.parentElement.parentElement
        .querySelector(
            'div .taskCounter')

    const newTaskElement = `
        <div class="mb-3 col-7">
            <div class="input-group mb-3">
                <span class=" me-3 mt-2 fs-5" id="numberingTask">1</span>
            <input id="TaskBorder" class="form-control form-control-lg mb-3"
                name="taskName[]"  type="text" placeholder="Task"
                aria-label="Task">
            </div>
        </div>
        <div class="col-2">
            <input class="form-control form-control-lg mb-3" id="taskDuration"
                name="taskDuration[]" min='1' type="number" placeholder="Day"
                aria-label="Task">
        </div>
        <div class="col-1"><button type="button" title="Delete Task"
                class="btn btn-danger btn-delete-task"><i class="bi bi-trash"></i></button>
        </div>
        <div class="mb-3 col-1 ttt">
            <button type="button" title="New Task" onclick="Numbreings()"
                    class="btn btn-success btn-add-task">+</button>
        </div>
    `

    const newCreatedDiv = document.createElement('div');
    newCreatedDiv.classList.add('row');
    newCreatedDiv.classList.add('d-flex');
    newCreatedDiv.classList.add('justify-content-end');
    newCreatedDiv.innerHTML = newTaskElement;

    this.closest(".taskWrap").appendChild(newCreatedDiv)
    const btnsAddTask = document.querySelectorAll('.btn-add-task');
    btnsAddTask.forEach(btnAddTask => {
        this.remove()
        btnAddTask.addEventListener('click', addNewTaskInput)

    })

    newCreatedDiv.querySelector('.btn-delete-task').addEventListener('click', function(e) {
        this.parentElement.closest(".taskWrap").childElementCount

        if (this.parentElement.closest(".taskWrap").childElementCount == 2) {

            this.parentElement.closest(".taskWrap").querySelector(`.task-1`).innerHTML = `
                    <button type="button" title="New Task" onclick="Numbreings()"
                            class="btn btn-success btn-add-task"  >+</button>
                `;
        } else {
            if (this.parentElement.parentElement.nextSibling == null) {

                this.parentElement.parentElement.previousSibling.querySelector('.ttt').innerHTML = `
                    <button type="button" title="New Task"
                            class="btn btn-success btn-add-task"  onclick="Numbreings()">+</button>
                `;
            }
        }
        const btnsAddTask = document.querySelectorAll('.btn-add-task');
        btnsAddTask.forEach(btnAddTask => {

            btnAddTask.addEventListener('click', addNewTaskInput)

        })
        this.parentElement.parentElement.remove()
        let c = elCountTask.childElementCount
        ActivityCounter.value = c
        Numbreings();
    })
    Numbreings();
    // AddTaskDurationFunctionForNewTask()
}





function Numbreings() {
    activityBorder = document.querySelectorAll('[id = "ActivityBorder"]'),
    activityBorder.forEach((act, ind) => {
        numberings = document.querySelectorAll('[id = "numbering"]'),
            numberings[ind].innerHTML = ind + 1;

        // Numbering Tasks
        numberingsTask = document.querySelectorAll('[class = "taskWrap"]');
        const childrenTasks = numberingsTask[ind].children

        for (let i = 0; i < childrenTasks.length; i++) {
            let tableChild = childrenTasks[i];

            tableChild.querySelector("#numberingTask").innerHTML = `${ind + 1}.${i+1}`
        }

    });
}



function ValidateProjectDuration(){



    let taskDurationUserInput = document.querySelectorAll('[id = "taskDuration"]');

    let totalDurationUserInput = 0;

    taskDurationUserInput.forEach(d=>{
        if(d.value==""){
            totalDurationUserInput = parseInt(totalDurationUserInput);
        }else{
            totalDurationUserInput = parseInt(totalDurationUserInput) + parseInt(d.value);
        }
    })

    
    let errorMessage = ` <i class="bi bi-exclamation-triangle-fill me-3"></i>
                                <div class="text-center">
                                    Days entered <b>(${totalDurationUserInput})</b> exceeded set days <b>(${TotalDaysToComplateProject})</b>, need to decrease <b>(${totalDurationUserInput-TotalDaysToComplateProject})</b> day.
                                </div>`;

    let errorContainer = document.getElementById("alert");

    if(TotalDaysToComplateProject < totalDurationUserInput){
        if(errorContainer.classList.contains('d-none')){
            errorContainer.classList.remove('d-none')
        }
        errorContainer.innerHTML=errorMessage;
        return false;
    }else{
        if(!errorContainer.classList.contains('d-none')){
            errorContainer.classList.add('d-none')
        }
    }



    return true;
}

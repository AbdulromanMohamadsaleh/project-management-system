const activityWraper = document.querySelector('#activityWrap')
const btnsAddTask = document.querySelectorAll('.btn-add-task');
let activityCounter = 1;


btnsAddTask.forEach(btnAddTask => {
    btnAddTask.addEventListener('click', addNewTaskInput)
})



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
}





function Numbreings() {
    activityBorder = document.querySelectorAll('[id = "ActivityBorder"]'),
    activityBorder.forEach((act, ind) => {
        numberings = document.querySelector('[id = "numbering"]');
            let TotalTask = numberings.innerHTML;
        // Numbering Tasks
        numberingsTask = document.querySelector('[class = "taskWrap"]');
        const childrenTasks = numberingsTask.children

        for (let i = 0; i < childrenTasks.length; i++) {
            let tableChild = childrenTasks[i];
            tableChild.querySelector("#numberingTask").innerHTML = `${TotalTask }.${i+1}`
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


    if(TotalDaysToComplateProject < totalDurationUserInput){

        document.getElementById("alert").classList.toggle('d-none')


        setTimeout(function() {
            document.getElementById("alert").classList.toggle('d-none');
        }, 3000)

        return false;
    }



    return true;
}

@include('include.header')

<body>

    <!-- Sidebar Start -->
    @include('include.sidebar')


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        @include('include.navbar')


        <!-- Recent Sales Start -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                {{-- <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-10 text-center p-0 mt-3 mb-2"> --}}
                <div class="col-12 col-lg-12 col-xl-10 text-center p-0 mt-3 mb-2">

                    <div style="border: none;" class="card px-0 pt-4 pb-0 mt-3 mb-3">

                        <h1 class="text-center fs-4">Create Project</h1>
                        <form id="signUpForm" method="post" action="{{ route('save') }}">
                            @csrf
                            <!-- start step indicators -->
                            <div class=" form-header d-flex mb-5">
                                <span class="fw-bold stepIndicator">Detail</span>
                                <span class="fw-bold stepIndicator">Activity</span>
                                {{-- <span class="stepIndicator">Personal Details</span> --}}
                            </div>
                            <!-- end step indicators -->

                            <!-- step one -->
                            <div class="step ">

                                {{-- Project Name / Target --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="projectName">Project Name</label>
                                        <input type="text" name="projectName" class="form-control" id="projectName">
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="target">Target</label>
                                        <input type="text" name="target" class="form-control" id="target">
                                    </div>
                                </div>

                                {{-- Start Project Date / End Project Date --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2 " for="projectStart">Start Project
                                            Date</label>
                                        <input type="date" class="form-control" id="projectStart"
                                            name="projectStart">
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="projectEnd">End Project Date</label>
                                        <input type="date" readonly class="form-control" id="projectEnd"
                                            name="projectEnd">
                                    </div>
                                </div>

                                {{-- Project Duration Format / Project Days --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="inputState" class="label-left fw-bold mb-2">Duration</label>
                                        <div class="row p-2  ">
                                            <div class="label-left col form-check form-check-inline">
                                                <input checked class="form-check-input" name="projectDurationFormat"
                                                    type="radio" id="day" value="day">
                                                <label checked class="form-check-label" for="day">Day</label>
                                            </div>
                                            <div class="label-left col form-check form-check-inline">
                                                <input class="form-check-input" name="projectDurationFormat"
                                                    type="radio" id="week" value="week">
                                                <label class="form-check-label" for="week">Week</label>
                                            </div>
                                            <div class="label-left col form-check form-check-inline">
                                                <input class="form-check-input" name="projectDurationFormat"
                                                    type="radio" id="month" value="month">
                                                <label class="form-check-label" for="month">Month</label>
                                            </div>
                                            <input class="form-check-input" hidden name="totalDate" type="text"
                                                value="0">
                                            <input type="number" min='0' max='10000000'
                                                class="form-control mt-3" id="Duration" name="projectDuration">
                                        </div>
                                        {{-- <div class="row"> --}}
                                        {{-- <label class="label-left fw-bold mb-2" for="projectEnd">Duration <span
                                                    id="formatDuration"></span></label> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="row justify-content-center" id="show-duration"></div> --}}
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="inputState" class="label-left fw-bold mb-2">Include Holydays</label>
                                        <div class="row p-2 px-5 ">
                                            <div style="text-align: left" class="mb-3 form-check form-check-inline">
                                                <input checked class="form-check-input" name="isIncludeHolyday"
                                                    type="radio" id="yes" value="yes">
                                                <label class="form-check-label ms-2" for="yes">Yes</label>
                                            </div>
                                            <div style="text-align: left" class="form-check form-check-inline">
                                                <input class="form-check-input" name="isIncludeHolyday" type="radio"
                                                    id="no" value="no">
                                                <label class="form-check-label ms-2" for="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Location / Budget --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="location">Location</label>
                                        <input type="text" name="location" class="form-control" id="location">
                                    </div>
                                    <div class="col-md-6 mb-sm-5  mb-3">
                                        <div class="input-group">
                                            <label class="label-left fw-bold mb-2" for="budget">Budget</label>
                                            <input name="budget" type="number" class="form-control"
                                                id="autoSizingInputGroup" placeholder="">
                                            <div class="input-group-text">฿</div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="budget">Budget</label>
                                        <input type="number" min="0" name="budget" class="form-control "
                                            id="budget">
                                    </div> --}}
                                </div>

                                {{-- Reasons / Objectve --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="reason">Reasons</label>
                                        <textarea class="form-control " rows="5" id="reason" name="reason"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="objectve">Objectve</label>
                                        <textarea class="form-control" rows="5" id="objectve" name="objectve"></textarea>
                                    </div>
                                </div>

                                {{-- Expected Results / Category Format --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="expectedRresults">Expected
                                            Results</label>
                                        <textarea class="form-control " name="expectedRresults" rows="2" id="expectedRresults" name="reason"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="projectManager" class="label-left fw-bold mb-2">Category</label>
                                        <select name="projectManager" id="projectManager" class="form-select">
                                            <option selected value="">Choose...</option>
                                            @if (count($projectManagers) > 0)
                                                @foreach ($projectManagers as $projectManager)
                                                    <option value="{{ $projectManager->LOGIN_ID }}">
                                                        {{ $projectManager->NAME }}</option>
                                                @endforeach
                                            @else
                                                <option value="0">NO Project Manager</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                {{-- Team /  Project Manager --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="projectManager" class="label-left fw-bold mb-2">Project
                                            Manager</label>
                                        <select name="projectManager" id="projectManager" class="form-select">
                                            <option selected value="">Choose...</option>
                                            @if (count($projectManagers) > 0)
                                                @foreach ($projectManagers as $projectManager)
                                                    <option value="{{ $projectManager->LOGIN_ID }}">
                                                        {{ $projectManager->NAME }}</option>
                                                @endforeach
                                            @else
                                                <option value="0">NO Project Manager</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="projectTeam" class="label-left fw-bold mb-2">Project Team</label>
                                        <select style="width: 100%;padding: 9px 14px;"
                                            class="form-select js-example-basic-multiple" id="projectTeam"
                                            name="projectTeam[]" multiple="multiple">
                                            @if (count($team) > 0)
                                                @foreach ($team as $staff)
                                                    <option value="{{ $staff->LOGIN_ID }}">
                                                        {{ $staff->NAME }}</option>
                                                @endforeach
                                            @else
                                                <option value="0">NO Team</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>

                            </div>

                            <!-- step two -->
                            <div class="step " id="activityWrap">
                                <p class="text-center mb-4">Add Activity</p>

                                {{-- 1 activity --}}
                                <div class="row " firstActivity id="activity-1">
                                    <div class="mb-3 col-10">
                                        <input class="form-control form-control-lg mb-3" name="activityName[]"
                                            type="text" placeholder="Activity"
                                            aria-label=".form-control-lg example">
                                        <input type="text" hidden class="taskCounter" name="taskCounter[]"
                                            value="1">
                                        <!-- Tasks -->
                                        <div class="taskWrap">

                                            <div class="row d-flex justify-content-end ">
                                                <div class="mb-3 col-7">
                                                    <input class="form-control form-control-lg mb-3" name="taskName[]"
                                                        type="text" placeholder="Task" aria-label="Task">
                                                </div>
                                                <div class="col-2">
                                                    <input class="form-control form-control-lg mb-3"
                                                        name="taskDuration[]" min='1' type="number"
                                                        placeholder="Day" aria-label="Task">
                                                </div>
                                                <div class="col-1"><button type="button" disabled
                                                        title="Delete Task" class="btn btn-danger btn-delete-task "><i
                                                            class="bi bi-trash"></i></button>
                                                </div>
                                                <div class="mb-3 col-1 ttt task-1">
                                                    <button type="button" title="New Task"
                                                        class="btn btn-success btn-add-task">+</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-1 ">
                                        <button type="button" id="btnAddNewActivity"
                                            class="btn btn-success add-task"title="New Activity">+</button>
                                    </div>
                                </div>


                            </div>

                            <!-- step three -->
                            {{-- <div class="step">
                                <p class="text-center mb-4">We will never sell it</p>
                                <div class="mb-3">
                                    <input type="text" placeholder="Full name" oninput="this.className = ''"
                                        name="fullname">
                                </div>
                                <div class="mb-3">
                                    <input type="text" placeholder="Mobile" oninput="this.className = ''"
                                        name="mobile">
                                </div>
                                <div class="mb-3">
                                    <input type="text" placeholder="Address" oninput="this.className = ''"
                                        name="address">
                                </div>
                            </div> --}}

                            <!-- start previous / next buttons -->
                            <div class="mt-4 d-flex justify-content-center">
                                <div class="col-6 row form-footer">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <input id="HolyDays" hidden type="text" value="{{ $Holydays }}"
                                placeholder="Address" name="address">
                            <!-- end previous / next buttons -->

                        </form>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
        </div>

    </div>


</body>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>

<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
{{-- <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- Tow Step Form Javascript -->
<script src="{{ asset('js/create.js') }}"></script>

<!-- Multi-select boxes (pillbox) Javascript -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    var HolyDays = document.querySelector("#HolyDays");



    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({});
    });

    // {-- Activity Section --}

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
                                        <input class="form-control form-control-lg mb-3" name="activityName[]"
                                            type="text" placeholder="Activity "
                                            aria-label=".form-control-lg example" >
                                            <input type="text"   class="taskCounter" hidden name="taskCounter[]" value="1">
                                        <!-- Tasks -->
                                        <div class="taskWrap">
                                            <div class="row d-flex justify-content-end">

                                                <div class="mb-3 col-7">
                                                    <input class="form-control form-control-lg mb-3"
                                                        name="taskName[]" type="text" placeholder="Task"
                                                        aria-label="Task">
                                                </div>
                                                <div class="col-2">
                                                    <input class="form-control form-control-lg mb-3"
                                                        name="taskDuration[]" type="number" min='1' placeholder="Day"
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
                                        <div class="col-1 pt-4">
                                            <button type="button" id="btnAddNewActivity"
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
        // Delete-activity
        newCreatedDiv.querySelector('.delete-activity').addEventListener('click', function(e) {
            activityCounter--

            // Not Last Sibling
            if (document.querySelector(`#${activityID}`).nextSibling != null) {
                // Dont Move Add Button
                console.log("Not Last Sibling")

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
        })

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
                <input class="form-control form-control-lg mb-3"
                    name="taskName[]" type="text" placeholder="Task"
                    aria-label="Task">
            </div>
            <div class="col-2">
                <input class="form-control form-control-lg mb-3"
                    name="taskDuration[]" min='1' type="number" placeholder="Day"
                    aria-label="Task">
            </div>
            <div class="col-1"><button type="button" title="Delete Task"
                    class="btn btn-danger btn-delete-task"><i class="bi bi-trash"></i></button>
            </div>
            <div class="mb-3 col-1 ttt">
                <button type="button" title="New Task"
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
                        <button type="button" title="New Task"
                                class="btn btn-success btn-add-task"  >+</button>
                   `;
            } else {
                if (this.parentElement.parentElement.nextSibling == null) {

                    this.parentElement.parentElement.previousSibling.querySelector('.ttt').innerHTML = `
                        <button type="button" title="New Task"
                                class="btn btn-success btn-add-task"  >+</button>
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
        })

    }


    // {-- Date Section --}


    const radios = document.querySelectorAll('input[name="projectDurationFormat"]');
    const projectStart = document.querySelector('input[name="projectStart"]');
    const projectEnd = document.querySelector('input[name="projectEnd"]');
    projectStart.valueAsDate = new Date();

    const DurationP = document.querySelector('#Duration');
    DurationP.addEventListener('change', updateEndDate);

    var projectDurationFormat = '';

    for (var i = 0, max = radios.length; i < max; i++) {
        radios[i].onclick = function(e) {
            projectDurationFormat = this.value;
            if (DurationP.value != '') {
                updateEndDateGeneral(DurationP.value);
            }
        }
    }

    function updateEndDate(e) {
        amount = e.target.value;

        if (projectDurationFormat == 'week') {
            projectEnd.valueAsDate = addWeeks(projectStart.value, parseInt(amount))
        } else if (projectDurationFormat == 'month') {
            projectEnd.valueAsDate = addMonths(projectStart.value, parseInt(amount))
        } else {
            projectEnd.valueAsDate = addDays(projectStart.value, parseInt(amount))
        }
    }

    function updateEndDateGeneral(a) {
        amount = a

        if (projectDurationFormat == 'week') {
            projectEnd.valueAsDate = addWeeks(projectStart.value, parseInt(amount))
        } else if (projectDurationFormat == 'month') {
            projectEnd.valueAsDate = addMonths(projectStart.value, parseInt(amount))
        } else {
            projectEnd.valueAsDate = addDays(projectStart.value, parseInt(amount))
        }
    }

    function addDays(date, days) {
        if (days > 10000)
            return new Date();

        var result = new Date(date);
        result.setDate(result.getDate() + days);

        rWorkingDays = 0;
        
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != days) {

            result.setDate(result.getDate() + (days - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > days) {
                break;
            }

        }
        console.log(rWorkingDays)


        return result;
    }


    function addMonths(date, month) {
        day = 30 * month;
        if (day > 10000)
            return new Date();

        let result = new Date(date);
        result.setDate(result.getDate() + day);

        rWorkingDays = 0;
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != day) {

            result.setDate(result.getDate() + (day - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > day) {
                break;
            }

        }
        console.log(workingDays(date, result))
        return result;
    }

    function addWeeks(date, weeks) {
        day = 7 * weeks;
        if (day > 10000)
            return new Date();

        let result = new Date(date);
        result.setDate(result.getDate() + day);

        rWorkingDays = 0;
        rWorkingDays = workingDays(date, result);
        // if number of working days != Number User enter days
        while (rWorkingDays != day) {

            result.setDate(result.getDate() + (day - rWorkingDays));
            rWorkingDays = workingDays(date, result);
            if (rWorkingDays > day) {
                break;
            }

        }
        console.log(workingDays(date, result))
        return result;
    }

    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString();
    }

    function convertToHtmlDateFormat(result) {
        let months = result.getMonth() + 1;
        newDate = '';
        newDate += result.getFullYear() + '-';

        if (result.getMonth() < 10) {
            newDate += pad(months) + '-'

        } else {
            newDate += months + '-';
        }

        if (result.getDate() < 10) {
            newDate += pad(result.getDate())
        } else {
            newDate += result.getDate()
        }

        return newDate;
    }

    function workingDays(fromDate, toDate) {
        fromDate = new Date(fromDate);
        toDate = new Date(toDate);

        // ensure that the argument is a valid and past date
        if (!fromDate || isNaN(fromDate) || toDate < fromDate) {
            return -1;
        }

        // clone date to avoid messing up original date and time
        var frD = new Date(fromDate.getTime()),
            toD = new Date(toDate.getTime()),
            numOfWorkingDays = 1;

        // reset time portion
        frD.setHours(0, 0, 0, 0);
        toD.setHours(0, 0, 0, 0);

        while (frD < toD) {
            frD.setDate(frD.getDate() + 1);
            var day = frD.getDay();
            if (day != 0 && day != 6) {
                numOfWorkingDays++;
            }
        }
        return numOfWorkingDays - 1;
    };
</script>



</html>

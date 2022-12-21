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
                                        <input type="date" class="form-control" id="projectEnd" name="projectEnd">
                                    </div>
                                </div>

                                {{-- Location / Budget --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="location">Location</label>
                                        <input type="text" name="location" class="form-control" id="location">
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="budget">Budget</label>
                                        <input type="number" name="budget" class="form-control " id="budget">
                                    </div>
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

                                {{-- Expected Results / Project Manager --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="expectedRresults">Expected
                                            Results</label>
                                        <input type="text" name="expectedRresults" class="form-control"
                                            id="expectedRresults">
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="inputState" class="label-left fw-bold mb-2">Duration
                                            Format</label>
                                        <div class="row p-2  ">
                                            <div class="label-left col form-check form-check-inline">
                                                <input class="form-check-input" name="projectDuration" type="radio"
                                                    id="day" value="day">
                                                <label class="form-check-label" for="day">Day</label>
                                            </div>
                                            <div class="label-left col form-check form-check-inline">
                                                <input class="form-check-input" name="projectDuration" type="radio"
                                                    id="week" value="week">
                                                <label class="form-check-label" for="week">Week</label>
                                            </div>
                                            <div class="label-left col form-check form-check-inline">
                                                <input class="form-check-input" name="projectDuration" type="radio"
                                                    id="month" value="month">
                                                <label class="form-check-label" for="month">Month</label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" id="show-duration"></div>
                                    </div>
                                </div>

                                {{-- Team / Duration Format --}}
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
                                <p class="text-center mb-4">Activity In The Project</p>

                                {{-- 1 activity --}}
                                <div class="row ">
                                    <div class="mb-3 col-10">
                                        <input class="form-control form-control-lg mb-3" name="activityName[]"
                                            type="text" placeholder="Activity"
                                            aria-label=".form-control-lg example">
                                        <input type="text"  class="taskCounter" name="taskCounter[]"
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
                                                        name="dateFormat[]" type="text" placeholder="Day"
                                                        aria-label="Task">
                                                </div>
                                                <div class="col-1"><button type="button" title="Delete Task"
                                                        class="btn btn-danger btn-delete-task">-</button>
                                                </div>
                                                <div class="mb-3 col-1">
                                                    <div class="col-1"><button type="button" title="New Task"
                                                            class="btn btn-success btn-add-task">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-1 ">
                                        <button type="button" id="btnAddNewActivity"
                                            class="btn btn-success add-task"title="New Task">+</button>
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
                            <div class=" d-flex justify-content-center">
                                <div class="col-6 row form-footer">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
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
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({


        });
    });

    // const addTaskButtons = document.querySelectorAll('.add-task')

    // addTaskButtons.forEach(addTaskButton => {
    //     addTaskButton.addEventListener('click', function(e) {
    //         const textnode = document.createTextNode("li");
    //         textnode.innerHtml = `<li class="row d-flex justify-content-end">
    //                                         <div class="mb-3 col-1">
    //                                             <div class="col-1"><button type="button" title="New Activity"
    //                                                     class="btn btn-success">+</button>
    //                                             </div>
    //                                         </div>
    //                                         <div class="mb-3 col-7">
    //                                             <input class="form-control form-control-lg mb-3"
    //                                                 name="activity[tasks[]]" type="text" placeholder="Task"
    //                                                 aria-label="Task">
    //                                         </div>
    //                                         <div class="col-2">
    //                                             <input class="form-control form-control-lg mb-3"
    //                                                 name="activity[tasks[]]" type="text" placeholder="Day"
    //                                                 aria-label="Task">
    //                                         </div>
    //                                         <div class="col-1"><button type="button" title="Delete Task"
    //                                                 class="btn btn-danger">-</button>
    //                                         </div>
    //                                     </li>`
    //         node.appendChild(textnode);
    //     });
    // });

    const addActivityButton = document.querySelector('#btnAddNewActivity')
    const activityWraper = document.querySelector('#activityWrap')
    let activityCounter = 1;
    addActivityButton.addEventListener('click', addNewActivityInput)

    function addNewActivityInput() {

        const ii = `<hr>
                                    <div class="mb-3 col-10 pt-4">
                                        <input class="form-control form-control-lg mb-3" name="activityName[]"
                                            type="text" placeholder="Activity "
                                            aria-label=".form-control-lg example">
                                            <input type="text"   class="taskCounter" name="taskCounter[]" value="1">
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
                                                        name="dateFormat[]" type="text" placeholder="Day"
                                                        aria-label="Task">
                                                </div>
                                                <div class="mb-3 col-1">
                                                    <button type="button" title="Delete Task"
                                                            class="btn btn-danger btn-delete-task">-</button>
                                                </div>
                                                <div class="mb-2 col-1">
                                                    <button type="button" title="New Task"
                                                            class="btn btn-success btn-add-task">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-1 pt-4">
                                                    <button type="button" title="Delete Acivity" class="btn btn-danger delete-activity">-</button>
                                        </div>

                                `
        const ini = document.createElement('div');
        ini.classList.add('row');
        ini.innerHTML = ii;
        activityWraper.appendChild(ini)

        const btnsAddTask = document.querySelectorAll('.btn-add-task');
        btnsAddTask.forEach(btnAddTask => {
            btnAddTask.addEventListener('click', addNewTaskInput)
        })

        ini.querySelector('.delete-activity').addEventListener('click', function(e) {
            this.parentElement.parentElement.remove()

        })

    }

    const btnsAddTask = document.querySelectorAll('.btn-add-task');
    btnsAddTask.forEach(btnAddTask => {
        btnAddTask.addEventListener('click', addNewTaskInput)
    })

    function addNewTaskInput() {
        let elCountTask = this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
            'div .taskWrap')
        let taskCounterInt = this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
            'div .taskWrap').childElementCount + 1


        // let taskCounterStr = this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        //     'div .taskCounter').value;
        // taskCounterInt = parseInt(taskCounterStr);
        // ++taskCounterInt;
        this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector('div .taskCounter')
            .value = taskCounterInt;


            let ActivityCounter = this.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
            'div .taskCounter')

        const ii = `

            <div class="mb-3 col-7">
                <input class="form-control form-control-lg mb-3"
                    name="taskName[]" type="text" placeholder="Task"
                    aria-label="Task">
            </div>
            <div class="col-2">
                <input class="form-control form-control-lg mb-3"
                    name="dateFormat[]" type="text" placeholder="Day"
                    aria-label="Task">
            </div>
            <div class="col-1"><button type="button" title="Delete Task"
                    class="btn btn-danger btn-delete-task">-</button>
            </div>
            <div class="mb-3 col-1">
                <button type="button" title="New Task"
                        class="btn btn-success btn-add-task">+</button>

            </div>

        `
        const ini = document.createElement('div');
        ini.classList.add('row');
        ini.classList.add('d-flex');
        ini.classList.add('justify-content-end');
        ini.innerHTML = ii;

        this.closest(".taskWrap").appendChild(ini)
        const btnsAddTask = document.querySelectorAll('.btn-add-task');
        btnsAddTask.forEach(btnAddTask => {
            btnAddTask.addEventListener('click', addNewTaskInput)

        })

        ini.querySelector('.btn-delete-task').addEventListener('click', function(e) {
            this.parentElement.parentElement.remove()
            let c = elCountTask.childElementCount
            ActivityCounter.value = c
        })

    }

</script>



</html>

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
                <div class="col-12 col-lg-12 col-xl-9   text-center p-0 mt-3 mb-2">

                    <div style="border: none;" class="card px-0 pt-4 pb-0 mt-3 mb-3">

                        <h1 class="text-center fs-4">Create Project</h1>
                        <form class="needs-validation" novalidate id="signUpForm" method="post"
                            action="{{ route('save') }}">
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
                                <div class="row mb-5 mb-sm-0 ">
                                    <div class="col-md-6 mb-sm-5 ">
                                        <label class="label-left fw-bold mb-2" for="projectName">Project Name</label>
                                        <input type="text" name="projectName" value="{{ old('projectName') }}"
                                            class="form-control @error('projectName') is-invalid @enderror "id="projectName">
                                        @error('projectName')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="target">Target</label>
                                        <input type="text" name="target" value="{{ old('target') }}"
                                            class="form-control @error('target') is-invalid @enderror " id="target">
                                        @error('target')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Start Project Date / End Project Date --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2 " for="projectStart">Start Project
                                            Date</label>
                                        <input type="date"
                                            class="form-control @error('projectStart') is-invalid @enderror"
                                            id="projectStart" name="projectStart">
                                        @error('projectStart')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="projectEnd">End Project Date</label>
                                        <input type="date" readonly
                                            class="form-control @error('projectEnd') is-invalid @enderror"
                                            id="projectEnd" name="projectEnd" value="{{ old('projectEnd') }}">
                                        @error('projectEnd')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                                class="form-control mt-3" id="Duration" name="projectDuration"
                                                value="{{ old('projectDuration') }}">
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
                                                <input class="form-check-input" name="isIncludeHolyday" type="radio"
                                                    id="yes" value="yes">
                                                <label class="form-check-label ms-2" for="yes">Yes</label>
                                            </div>
                                            <div style="text-align: left" class="form-check form-check-inline">
                                                <input class="form-check-input" name="isIncludeHolyday"
                                                    type="radio" id="no" value="no">
                                                <label class="form-check-label ms-2" for="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Location / Budget --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="location">Location</label>
                                        <input type="text" name="location" value="{{ old('location') }}"
                                            class="form-control @error('location') is-invalid @enderror"
                                            id="location">
                                        @error('location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-sm-5  mb-3">
                                        <div class="input-group">
                                            <label class="label-left fw-bold mb-2" for="budget">Budget</label>
                                            <input name="budget" value="{{ old('budget') }}" type="number"
                                                class="form-control " id="autoSizingInputGroup" placeholder="">
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
                                        <textarea style="border-color: rgb(33, 37, 41);" class="form-control @error('reason') is-invalid @enderror " rows="5" id="reason" name="reason"
                                            value="{{ old('reason') }}"></textarea>
                                        @error('reason')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="objectve">Objective</label>
                                        <textarea class="form-control @error('objectve') is-invalid @enderror" rows="5" id="objectve" name="objectve"
                                            value="{{ old('objectve') }}"></textarea>
                                        @error('objectve')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Expected Results / Category Format --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="expectedRresults">Expected
                                            Results</label>
                                        <textarea class="form-control " name="expectedRresults" value="{{ old('expectedRresults') }}" rows="2"
                                            id="expectedRresults" name="expectedRresults"></textarea>
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="Category" class="label-left fw-bold mb-2">Category</label>
                                        <select name="category" id="Category"
                                            class="form-select  @error('category') is-invalid @enderror">
                                            <option selected value="">Choose...</option>
                                            @if (count($Categories) > 0)
                                                @foreach ($Categories as $Category)
                                                    <option value="{{ $Category->CATEGORY_ID }}">
                                                        {{ $Category->NAME_CATEGORY }}</option>
                                                @endforeach
                                            @else
                                                <option value="0">NO Category</option>
                                            @endif
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Team /  Project Manager --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="projectManager" class="label-left fw-bold mb-2">Project
                                            Manager</label>
                                        <select name="projectManager" id="projectManager"
                                            class="form-select @error('projectManager') is-invalid @enderror">
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
                                        @error('projectManager')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label for="projectTeam" class="label-left fw-bold mb-2">Project Team</label>
                                        <select style="width: 100%;padding: 9px 14px;border-color: rgb(33, 37, 41);"
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

                                    <div class="col-1  ">
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
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({});
    });
</script>

<script src="{{ asset('js/create_project.js') }}"></script>
<script src="{{ asset('js/DateF.js') }}"></script>


</html>

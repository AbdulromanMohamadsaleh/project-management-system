<html>
@include('include.header')

<body>

    {{-- <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('include.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">John Doe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Recent Sales Start -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                {{-- <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-10 text-center p-0 mt-3 mb-2"> --}}
                <div class="col-10 text-center p-0 mt-3 mb-2">

                    <div style="border: none;" class="card px-0 pt-4 pb-0 mt-3 mb-3">

                        <h1 class="text-center fs-4">Create Project</h1>
                        <form id="signUpForm" action="#!">
                            <!-- start step indicators -->
                            <div class="form-header d-flex mb-4">
                                <span class="stepIndicator">Detail</span>
                                <span class="stepIndicator">Activity</span>
                                {{-- <span class="stepIndicator">Personal Details</span> --}}
                            </div>
                            <!-- end step indicators -->

                            <!-- step one -->
                            <div class="step ">
                                <p class="text-center mb-4">Project Information</p>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">Project Name</label>
                                        <input type="text" name="name" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">Target</label>
                                        <input type="text" name="target" class="form-control"
                                            id="inputPassword4">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">Start Date</label>
                                        <input type="date" id="start" name="trip-start" value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">End Date</label>
                                        <input type="date" id="start" name="trip-start" value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">Reasons</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-left fw-bold mb-1" for="start">Objectve</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="password" placeholder="Password" oninput="this.className = ''"
                                        name="password">
                                </div>

                                <div class="mb-3">
                                    <input type="password" placeholder="Confirm Password"
                                        oninput="this.className = ''" name="password">
                                </div>
                            </div>

                            <!-- step two -->
                            <div class="step">
                                <p class="text-center mb-4">Your presence on the social network</p>
                                <div class="mb-3">
                                    <input type="text" placeholder="Linked In" oninput="this.className = ''"
                                        name="linkedin">
                                </div>
                                <div class="mb-3">
                                    <input type="text" placeholder="Twitter" oninput="this.className = ''"
                                        name="twitter">
                                </div>
                                <div class="mb-3">
                                    <input type="text" placeholder="Facebook" oninput="this.className = ''"
                                        name="facebook">
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
                            <div class="form-footer d-flex">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                            <!-- end previous / next buttons -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->




</body>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>

<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('js/create.js') }}"></script>

</body>

</html>

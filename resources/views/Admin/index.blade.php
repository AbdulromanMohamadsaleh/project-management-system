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
        @include('include.navbar')
        <!-- Navbar End -->

        <br>
        <!-- Sale & Revenue Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="#">
                            <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                                <center><i class="fas fa-clipboard-check" style="color:#BB7824;font-size:70px;"></i>
                                </center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>Project Done
                                    <div class="pull-right badge">18</div>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="#">
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fas fa-tasks" style="color:#16A085;font-size:70px;"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>Project Progress
                                    <div class="pull-right badge" id="WrControls"></div>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="#">
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(130, 93, 9, 0.1)">
                                <center><i class="fas fa-user-clock" style="color:#825d09;font-size:70px;"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>
                                    Pending Appvol
                                    <div class="pull-right badge" id="WrThemesIcons"></div>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Project All</h6>
                            <a href="">Show All</a>
                        </div>
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Project Progress</h6>
                            <a href="">Show All</a>
                        </div>
                        <div id="piechart_3d" style="width: 500px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
        <!-- Recent Sales End -->


        <!-- Widgets Start -->
        <!-- Widgets End -->


        <!-- Footer Start -->
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

</body>

</html>
<style type="text/css">


</style>

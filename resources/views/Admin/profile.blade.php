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
        <!-- Sale & Revenue End -->


        <!-- Sales Chart Start -->

            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img class="rounded-circle" src="{{ asset('images/1.png') }}" alt=""
                                    style="width: 32%;">
                                <h5 class="my-3">{{ $profile->NAME }}</h5>
                                <p class="text-muted mb-1">Agency: {{ $profile->AGENCY }}</p>
                                <p class="text-muted mb-4">Position: {{ $profile->POSITION }}</p>
                            </div>
                            <div class="card-body text-center">
                                <div class="ui icon button" data-tooltip="Edit User">
                                    <a href="edit_profile.php"><i class='fas fa-edit' style="color:orange;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->NAME }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nick Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->NICKNAME }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Card_Id</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->CARD_ID }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->EMAIL }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $profile->TELEPHONE }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                            </div>
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
    <!-- Template Javascript -->
    @include('include.scrip');

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

</body>

</html>
<style type="text/css">


</style>


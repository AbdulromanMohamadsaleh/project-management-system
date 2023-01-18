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
                               @include("profile.include.profile_name_agency_department")
                            </div>
                            <div class="card-body text-center">
                                @include("profile.include.edit_profile")
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                   @include("profile.include.detail_profile")
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


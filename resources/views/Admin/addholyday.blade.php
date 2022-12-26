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
                        <h1 class="text-center fs-4">Create Holyday</h1>
                        <form id="signUpForm" method="post" action="{{ route('holyday.save') }}">
                            @csrf
                                {{-- Project Name / Target --}}
                                <div class="row mb-5 mb-sm-0">
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="projectName">Holyday Name</label>
                                        <input type="text" name="holyday_name" class="form-control" id="projectName">
                                    </div>
                                    <div class="col-md-6 mb-sm-5">
                                        <label class="label-left fw-bold mb-2" for="target">Date Holyday</label>
                                        <input type="date" name="date_holyday" class="form-control" id="target">
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-success">SAVE</button>
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




</html>

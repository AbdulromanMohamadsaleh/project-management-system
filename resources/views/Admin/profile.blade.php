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
                                <h5 class="my-3">{{ Auth::user()->NAME }}</h5>
                                <p class="text-muted mb-1">Agency: {{ Auth::user()->AGENCY }}</p>
                                <p class="text-muted mb-4">Position: {{ Auth::user()->POSITION }}</p>
                            </div>
                            <div class="card-body text-center">
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class='fas fa-edit' style="color:orange;"></i>
                                      </button>
                                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form id="signUpForm" method="post" action="{{ route('editprofile',Auth::user()->LOGIN_ID) }}">
                                                @csrf
                                                <div class="row mb-5 mb-sm-0">
                                                    <div class="col-md-6 mb-sm-5">
                                                        <label class="label-left fw-bold mb-2" for="projectName">NAME</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="projectName" value="{{ Auth::user()->NAME }}">
                                                    </div>
                                                    <div class="col-md-6 mb-sm-5">
                                                        <label class="label-left fw-bold mb-2" for="projectName">Nick Name</label>
                                                        <input type="text" name="nickname" value="{{ Auth::user()->NICKNAME }}" class="form-control"
                                                            id="projectName">
                                                    </div>
                                                    <div class="col-md-6 mb-sm-5">
                                                        <label class="label-left fw-bold mb-2" for="projectName">Card_Id</label>
                                                        <input type="number"  minlength="13" maxlength="13" name="Card_Id" value="{{ Auth::user()->CARD_ID }}" class="form-control"
                                                            id="projectName">
                                                    </div>
                                                    <div class="col-md-6 mb-sm-5">
                                                        <label class="label-left fw-bold mb-2" for="projectName">Phone</label>
                                                        <input type="number"  name="phone"  minlength="9" maxlength="10" value="{{ Auth::user()->TELEPHONE }}" class="form-control"
                                                            id="projectName">
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-success">SAVE</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
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
                                        <p class="text-muted mb-0">{{ Auth::user()->NAME  }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nick Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->NICKNAME }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Card_Id</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->CARD_ID }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->EMAIL }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->TELEPHONE }}</p>
                                    </div>
                                </div>
                                <hr>
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


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

        <!-- Recent Sales Start -->
        <div class="container">
            <h1>A Detailed Timeline Porject</h1>
              <ul class="timeline">

                  <li class="timeline">
                    <div class="icon done"></div>
                    <details class="panel">
                      <summary>New Release</summary>
                      <p><strong>Action:</strong> Is Create New Project<br><br>

                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon done"></div>
                    <details class="panel">
                      <summary>Approve</summary>
                      <p><strong>Action:</strong> Manager is approve project<br><br>
                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon working"></div>
                    <details class="panel">
                      <summary>Porgress</summary>
                      <p><strong>Action:</strong>Project is progress<br><br>
                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon layer-plus"></div>
                    <details class="panel">
                      <summary>Compate</summary>
                      <p><strong>Action:</strong> Activity compate all<br><br>
                    </details>
                  </li>

              </ul>
          </div>
        <!-- Recent Sales End -->



</body>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


</script>

</html>
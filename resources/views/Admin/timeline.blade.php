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
                      <p><strong>Patient:</strong> Is it a boy or a girl?<br><br>
          <strong>Obstetrician:</strong> Now, I think it's a little early to start imposing roles on it, don't you? Now, a word of advice. You may find that you suffer for some time a totally irrational feeling of depression. PND is what we doctors call it. So it's lots of happy pills for you, and you can find out all about the birth when you get home. It's available on Betamax, VHS, and Super 8.</p>
                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon done"></div>
                    <details class="panel">
                      <summary>Approve</summary>
                      <p>And spotteth twice they the camels before the third hour. And so the Midianites went forth to Ram Gilead in Kadesh Bilgemath by Shor Ethra Regalion, to the house of Gash-Bil-Betheul-Bazda, he who brought the butter dish to Balshazar and the tent peg to the house of Rashomon, and there slew they the goats, yea, and placed they the bits in little pots. Here endeth the lesson.</p>
                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon working"></div>
                    <details class="panel">
                      <summary>Porgress</summary>
                      <p>Here is better than home, eh, sir? I mean, at home if you kill someone they arrest you — here they'll give you a gun and show you what to do, sir. I mean, I killed fifteen of those buggers. Now, at home they'd hang me — here they'll give me a fucking medal, sir!</p>
                    </details>
                  </li>

                  <li class="timeline">
                    <div class="icon layer-plus"></div>
                    <details class="panel">
                      <summary>Compate</summary>
                      <p>It's real Hawaiian food served in an authentic medieval English dungeon atmosphere.</p>
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

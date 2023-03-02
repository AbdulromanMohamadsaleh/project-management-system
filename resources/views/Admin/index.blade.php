@extends('layouts.master')

@section('content')
    <br>
    <!-- Sale & Revenue Start -->
    <div class="container-fluid">
        <div class="row">
            @include('Dashboard.include.dasrhbord_summary_card')
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
                        <a href=""></a>
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
                    <canvas style="width: 100%;max-width:700px;height: 10%;max-height:372px" id="pie-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
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
    @include('Dashboard.include.chart')
@endsection
{{--
<style type="text/css">


</style> --}}

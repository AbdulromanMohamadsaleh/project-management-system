@extends('layouts.master')

@section('content')
    <br>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        @include('profile.include.profile_name_agency_department')
                    </div>
                    <div class="card-body text-center">
                        @include('profile.include.edit_profile')
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            @include('profile.include.detail_profile')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
@endsection


@section('script')
    <!-- Template Javascript -->
    @include('include.scrip');

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

    <style type="text/css"></style>
@endsection

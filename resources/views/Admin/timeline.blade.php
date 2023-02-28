@extends('layouts.master')

@section('content')
    <!-- Recent Sales Start -->
    @include('timeline.show.include.showtimeline')
    <!-- Recent Sales End -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
        crossorigin="anonymous"></script>

    @include('include.scrip')

    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection

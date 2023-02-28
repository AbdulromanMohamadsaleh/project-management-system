<!DOCTYPE html>

<html lang="en">

@include('include.header')

<body>
    @include('include.sidebar')

    <div class="content">
        @include('include.navbar')
        <div class="p-3">
            @yield('content')
        </div>
    </div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>

@yield('script')

{{-- @include('include.foorer') --}}

</html>

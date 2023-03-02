@include('include.header')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @if (Session::has('errorNotActive'))
                <p class="text-center alert alert-danger">{{ Session::get('errorNotActive') }}</p>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-26">
                    LOGIN
                </span>
                <img src="{{ asset('images/logo/logo-06.png') }}" style="width: 100%" alt="">
                <span class="login100-form-title p-b-48">
                    <i class="zmdi zmdi-font"></i>
                </span>

                <div class="wrap-input100 validate-input">
                    <span class="span-form" data-placeholder="Email">Email</span>
                    <input class="input100 mb-2" type="text" name="email">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Session::has('errorMassage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ Session::get('errorMassage') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <span class="span-form" data-placeholder="Email">Password</span>
                    <input class="input100 mb-2" type="password" name="password">

                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Session::has('errorMassage'))
                        <span class="text-danger" role="alert">
                            <strong>{{ Session::get('errorMassage') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn ">
                        <div class="login100-form-bgbtn "></div>
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115 mt-5">
                    <span class="txt1">
                        Don’t have an account?
                    </span>

                    <a class="txt2" href="{{ route('register') }}">
                        Sign Up
                    </a>
                </div>
            </form>
            <br>
            <div class="mt-1">
                <b>Email: admin@admin.com </b>
                <br>
                <b>Password: 012345678 </b>
            </div>

            <div class="mt-1">
                <b>Email: manager@manager.com </b>
                <br>
                <b>Password: 012345678 </b>
            </div>


            <div class="mt-1">
                <b>Email: projectmanager@projectmanager.com </b>
                <br>
                <b>Password: 012345678 </b>
            </div>

            <div class="mt-1">
                <b>Email: user@gmail.com</b>
                <br>
                <b>Password: 012345678 </b>
            </div>
        </div>
    </div>

</div>

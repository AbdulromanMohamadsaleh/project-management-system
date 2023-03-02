<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <p class="login100-form-title p-b-26">
                    Register
                </p>
                <img src="{{ asset('images/logo/logo-06.png') }}" style="width: 100%" alt="">

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="name">
                        <span class="focus-input100" data-placeholder="name"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="password"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="Agency">
                        <span class="focus-input100" data-placeholder="Agency"></span>
                        @error('Agency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <select class="form-select" name="Position" aria-label="Default select example">
                        <option selected>--Position--</option>
                        <option value="0">Employee</option>
                        <option value="1">Admin</option>
                        <option value="2">Project manager</option>
                        <option value="3">Manager</option>
                    </select> --}}
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn mt-3">
                            <div class="login100-form-bgbtn "></div>
                            <button class="login100-form-btn" type="submit">
                                register
                            </button>
                        </div>
                    </div>
                    <div class="text-center p-t-115 mt-5">
                        <span class="txt1">
                            have an account?
                        </span>
                        <a class="txt2" href="{{ route('login') }}">
                            login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

@extends('Auth.layout.app')

@section('content')

    <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-4 mx-auto">
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="mb-5 text-center">
{{--                                <img src="{{ asset('logo.png') }}" class="mw-100 mb-4" height="40">--}}
                                <h1 class="h3 text-primary mb-0">Welcome to{{ env('APP_NAME') }}</h1>
                                <p>Login to your account.</p>
                            </div>
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible "
                                     role="alert">
                                    <button type="button" class="close"
                                            data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                            <form class="pad-hor" method="POST" role="form" action="{{ route('do_login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
{{--                                        <div class="text-left">--}}
{{--                                            <label class="aiz-checkbox">--}}
{{--                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                                <span>Remember Me</span>--}}
{{--                                                <span class="aiz-square-check"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
                                    </div>
{{--                                        <div class="col-sm-6">--}}
{{--                                            <div class="text-right">--}}
{{--                                                <a href="{{ route('forgetPassword') }}" class="text-reset fs-14">Forgot password ?</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Login
                                </button>
                            </form>
{{--                            <div class="text-center">--}}
{{--                                <p class="text-muted mb-0">I don't have an account?</p>--}}
{{--                                <a href="{{ route('register_page') }}">Sing up</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        function autoFill(){
            $('#email').val('admin@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection

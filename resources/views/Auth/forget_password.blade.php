@extends('Auth.layout.app')

@section('content')

    <div class="py-6">
        <div class="container">
            <div class="row mt-5">
                <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto mt-5">
                    <div class="bg-white rounded shadow-sm p-4 text-center ">
                        <h1 class="h3">Forgot Password</h1>
                        <p class="mb-4">Enter your email address to recover your password.</p>
                        <form method="POST" action="{{ route('resetPassword') }}">
                            @csrf
                            <div class="form-group">
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <a href="{{route('login')}}" class="text-reset opacity-60">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

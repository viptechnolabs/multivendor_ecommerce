<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <!-- aiz core css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css') }}">
</head>
<body>
<div class="aiz-main-wrapper d-flex">
    <div class="flex-grow-1">
        @yield('content')
    </div>
</div><!-- .aiz-main-wrapper -->

{{--<script src="{{ asset('assets/js/vendors.js') }}" ></script>--}}
{{--<script src="{{ asset('assets/js/aiz-core.js') }}" ></script>--}}

@yield('scripts')

</body>
</html>

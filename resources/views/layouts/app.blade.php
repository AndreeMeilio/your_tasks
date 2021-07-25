<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-confirm/jquery-confirm.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/date-time-picker/DateTimePicker.css') }}" type="text/css">


    {{-- CSS For Template --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.min.css') }}">

    <title>Your Tasks</title>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.navbar')
                <div class="container-fluid">
                    @if (Session::get('success') != '')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (Session::get('failed') != '')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('failed') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @else
                    @endif
                    @yield('content')
                </div>
            </div>
            
            @include('layouts.footer')
        </div>        
    </div>
    
    
    {{-- VENDOR --}}
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-confirm/jquery-confirm.js') }}"></script>
    <script src="{{ asset('assets/vendor/date-time-picker/DateTimePicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/iro-color-picker/iro.js') }}"></script>
    
    {{-- Javascript For Template --}}
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    @yield('javascript')

</body>
</html>
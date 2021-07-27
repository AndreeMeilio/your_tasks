<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.vendor.vendor_css')

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
    
    @include('layouts.vendor.vendor_js')

    @yield('javascript')

</body>
</html>
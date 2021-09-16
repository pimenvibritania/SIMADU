<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="g-sidenav-show  bg-gray-100">
@include('includes.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('includes.navbar')
    <div class=" py-4">
        @if(auth()->user()->biodata == null || auth()->user()->biodata->riwayatPendidikan->isEmpty())
            @yield('biodata')
        @else
            @yield('content')
        @endif
        @include('includes.copyright')
    </div>
</main>

@include('includes.footer')
</body>
</html>

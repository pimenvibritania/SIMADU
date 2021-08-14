<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<header>
    @include('includes.header')
</header>

<div class="container">

    <div id="main" class="row">

        @if(auth()->user()->biodata == null)
            @yield('biodata')
        @else
            @yield('content')
        @endif

{{--            @yield('content')--}}
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>

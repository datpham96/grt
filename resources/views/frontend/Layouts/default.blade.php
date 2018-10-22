<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @includeif('frontend.Layouts.partial._default_css')
    @includeif ('frontend.Layouts.partial._angular')
    @includeif('frontend.Layouts.partial._css')
    @yield('myCss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('') }}/images/grt-logo.png" type="image/jpg" >
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body ng-app="ngApp" ng-cloak class="container">
    @includeif('frontend.Layouts.partial._header')               
    @includeif ('frontend.Layouts.partial._menu')

    @yield('content')

    @yield('myJs')
    @includeif('frontend.Layouts.partial._default_js')
    @includeif('frontend.Layouts.partial._js')
    @includeif('frontend.Layouts.partial._footer')
</body>

</html>
@yield('upload')
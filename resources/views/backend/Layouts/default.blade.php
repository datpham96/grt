<!DOCTYPE html>
<html >
    <head>
        <title >@yield('title')</title>
        <link rel="icon" href="{{url('/')}}/images/grt-logo.png" sizes="16x16">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @includeif ('backend.Layouts.partial._angular')
        @includeif('backend.Layouts.partial._css')
        @yield('myCss')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var SiteUrl = '{{url("/")}}';
            var curUserInfo = {!!json_encode(auth()->user()->toArray())!!};
        </script>
    </head>
    <body class=" pace-done" ng-app="ngApp" ng-cloak>
        <div id="container" class="effect aside-float aside-bright mainnav-lg" >
            @includeif('backend.Layouts.partial._header')
            @includeif ('backend.Layouts.partial._menu')
            <div class="boxed">
                <div id="content-container">

                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            @yield('content')
                        </div>                  
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
            </div>
            @includeif('backend.Layouts.partial._modalLoader')
            @includeif('backend.Layouts.partial._js')
            @yield('myJs')
            <script src="{{ URL::asset('/js/ctrl/backend/headerCtrl.js') }}"></script>
        </div>
    </body>
</html>

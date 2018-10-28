<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @includeif('frontend.Layouts.partial._css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('') }}/images/grt-logo.png" type="image/jpg" >
   
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body>
    @includeif('frontend.Layouts.partial._header')               
    @includeif('frontend.Layouts.partial._banner')               

    <div class="content-product">
            <div class="container">
                <div class="col-sm-3">
                    @includeif('frontend.Layouts.partial._sibarLeft') 
                    <!-- END left-sidebar -->   
                </div>              
                 @yield('content')
            </div>
    </div>
   

    @yield('myJs')
    @includeif('frontend.Layouts.partial._js')
    @includeif('frontend.Layouts.partial._footer')
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{url('/')}}/images/grt-logo.png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title >Đặng nhập</title>
    @includeif('backend.Layouts.partial._default_css')
    @includeif ('backend.Layouts.partial._angular')
    @includeif('backend.Layouts.partial._css')
    <link type="text/css" rel="stylesheet" href="{{ url('')}}/css/styleLogin.css">
    @yield('myCss')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var SiteUrl = '{{url("/")}}';
    </script>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body ng-app="ngApp" ng-cloak>

    <div id="container" class="cls-container" ng-controller="loginCtrl">

        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay" class="bg-img" style="background-image: url('{{ url('') }}/Nifty/img/bg-img/bg-img-3.jpg');">

        </div>
       
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
          <div class="cls-content-sm panel">
              <div class="panel-body" style="margin-top: 50px;">
                  <div class="mar-ver pad-btm">


                    <div class="cls-brand logoLogin">
                        <a class="box-inline" href="javascript:void(0)">
                            <!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
                            <img  src="{{url('/')}}/images/grt-logo.png" alt="Grt Logo" class="brand-icon" style="padding: 0; width: 100px !important; height: 100px !important">
                        </a>
                    </div>
                    <p>Đăng nhập hệ thống</p>
                </div>
                <form id="loginForm" ng-enter="actions.login()">
                  <div class="alert alert-danger" ng-if="data.errorMsg">
                        @{{data.errorMsg}}
                  </div>
                    <div class="form-group">
                      <input type="text" ng-model="data.params.email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}" autofocus>
                  </div>
                  <p style="color:#F56262; padding: 5px;" ng-show="data.checks.checkEmail" >Tên tài khoản không được để trống<p>
                      <div class="form-group">
                          <input type="password" ng-model="data.params.password" class="form-control" id="password" placeholder="Password" name="password">
                      </div>
                      <p style="color:#F56262; padding: 5px;" ng-show="data.checks.checkPassword" >Mật khẩu không được để trống<p>
                        
                        {!! csrf_field() !!}

                        <button class="btn btn-primary btn-lg btn-block" type="button" ng-click="actions.login()">Đăng nhập</button>
                        
                    </form>
                </div>
          </div>
      </div>


  </div>

  <!--JAVASCRIPT-->
  <!--=================================================-->
  @includeif('backend.Layouts.partial._modalLoader')
  @includeif('backend.Layouts.partial._default_js')
  @includeif('backend.Layouts.partial._js')
  @yield('myJs')
    <script src="{{ URL::asset('/js/ctrl/backend/loginCtrl.js') }}"></script>
    <script src="{{url('')}}/js/factory/service/backend/userService.js"></script>
    <script src="{{ URL::asset('/js/ctrl/backend/headerCtrl.js') }}"></script>
    <script>
        ngApp.value('$productInfo', {redirectProduct: '{{route("products")}}', redirectLogin: '{{route("login")}}'});
  </script>
  
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    @includeif('backend.Layouts.partial._default_css')
    @includeif ('backend.Layouts.partial._angular')
    @includeif('backend.Layouts.partial._css')
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>
    
    <!-- <script src="{{ url('js/ctrl/backend/loginCtrl.js') }}"></script> -->
    
    <body ng-app="ngApp">
        <div id="container" class="cls-container" style="background-color: #26ae8f  !important;">

            <!-- BACKGROUND IMAGE -->
            <!--===================================================-->
            <!-- <div id="bg-overlay" class="bg-img img-balloon"></div> -->
            
            <!-- HEADER -->
            <!--===================================================-->
            <div class="cls-header cls-header-lg">
                <div class="cls-brand">
                    <a class="box-inline">
                        <img style="opacity: 1; border-radius: 10px;" alt="logo-icon" src="{{ url('') }}/images/frontend/img-icon-logo.jpg" class="brand-icon">
                        <span class="brand-title" style="font-size: 25px; color: white !important; opacity: 1; font-weight: bold;">HỆ THỐNG QUẢN TRỊ VNHOT.VN</span></span>
                    </a>
                </div>
            </div>
            <!--===================================================-->


            <!-- LOGIN FORM -->
            <!--===================================================-->
            <div class="cls-content">
                <div class="cls-content-sm panel">
                    <div class="panel-body">
                        <p class="pad-btm" style="font-size: 15px;">Đăng nhập hệ thống</p>
                        
                        <!-- ========================================== -->
                        <form data-parsley-validate class="form-horizontal" id="formLogin" action="{{ url('login') }}" method="POST" role="form" >

                            <div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
                                <label style="padding-left:0px;" for="inputEmail3" class="col-sm-3 control-label">Tài khoản: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account"  required ="" placeholder="Tên tài khoản" name="account" value="{{old('account')}}">
                                    @if ($errors->has('account'))
                                <div class="text-left text-danger" style="margin-top: 5px;">
                                    <strong>{{ $errors->first('account') }}</strong>
                                </div>
                                @endif
                                </div>
                                
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label style="padding-left:0px;" for="inputEmail3" class="col-sm-3 control-label">Mật khẩu:</label>
                                <div class="col-sm-9">
                                    <input type="password"  class="form-control" id="password" required ="" placeholder="Mật khẩu" style="height: 33px;" name="password">
                                    @if ($errors->has('password'))
                                    <div class="text-left text-danger" style="margin-top: 5px;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                    @endif
                                </div>
                                
                            </div>
                            {!! csrf_field() !!}
                            <button class="btn btn-primary btn-lg btn-block" style="background-color: #26ae8f !important" type="submit">
                                Đăng nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!--===================================================-->



        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->



        <!--JAVASCRIPT-->
        <!--=================================================-->

        @includeif('backend.Layouts.partial._default_js')
        @includeif('backend.Layouts.partial._js')
        @yield('myJs')

    </body>

    <!-- Tieu Long Lanh Kute -->
    </html>



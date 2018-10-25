<!--new menu -->
<nav id="mainnav-container" ng-controller="headerCtrl">
    <div id="mainnav">
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano has-scrollbar">
                <div class="nano-content" tabindex="0" style="right: -17px;">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" ng-src="@{{loadImage()}}" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name">{{Auth::user()->name}}</p>
                                <!-- <span class="mnp-desc">aaron.cha@themeon.net</span> -->
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="{{url('')}}/admin/userInfo" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i>
                                Tài khoản
                            </a>

                            <a href="{{url('/logout')}}" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i>Đăng xuất 
                            </a>
                        </div>
                    </div>

                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">
                        <li class="{{ request()->is('admin/products') ? 'active-link' : '' }}">
                            <a href="{{url('')}}/admin/products">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ti-package"></i>
                                <span class="menu-title">
                                    <b>Sản phẩm</b>
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/categorys') ? 'active-link' : '' }}">
                            <a href="{{url('')}}/admin/categorys">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ti-folder"></i>
                                <span class="menu-title">
                                    <b>Chuyên mục</b>
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/posts') ? 'active-link' : '' }}">
                            <a href="{{url('')}}/admin/posts">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ti-marker-alt"></i>
                                <span class="menu-title">
                                    <b>Bài viết</b>
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/links') ? 'active-link' : '' }}">
                            <a href="{{url('')}}/admin/links">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ti-link"></i>
                                <span class="menu-title">
                                    <b>Liên kết</b>
                                </span>
                            </a>
                        </li>                        
                        <li class="{{ request()->is('admin/supports') ? 'active-link' : '' }}">
                            <a href="{{url('')}}/admin/supports">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ti-info"></i>
                                <span class="menu-title">
                                    <b>Liên hệ</b>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>           
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
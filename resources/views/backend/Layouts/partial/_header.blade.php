
<header id="navbar" style="z-index: 10000;">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header confLogo" style="text-align: center;">
            <a  href="{{url('')}}" class="navbar-brand">
                <div>
                    <img style="width: 30px; height: 30px; margin-left: 14px; margin-top: 14px;" src="{{url('/')}}/images/logo_icon.png" alt="Nifty Logo" class="brand-icon">
                </div>
                
                <div class="brand-title">
                    <span class="brand-text" style="font-size:16px">FRT</span>
                </div>
            </a>
        </div>
        <!--================================-->

        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

             <!--Navigation toogle button-->
             <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
             <li class="tgl-menu-btn">
                <a class="mainnav-toggle" href="#">
                    <i  class="demo-pli-list-view"></i>
                    <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
                </a>
            </li>

        </ul>

        <ul class="nav navbar-top-links">   
            <li id="dropdown-user" class="dropdown iconDoc" >
                <a  ng-click="showModal()" class="dropdown-toggle text-right" aria-expanded="false">
                    <span class="pull-right">
                        <i style="font-size: 25px;" class="fa fa-question-circle-o" aria-hidden="true"></i>
                    </span>
                </a>
            </li>             
        </ul>
    </div>
</div>
</header>


{{ request()->get('id') }}
<div class="left-sidebar">
    <div class="left-category">
        <div class="list-group" style="text-align: center";>
            <a href="#" class="list-group-item list-group-item-success active" style="background-color:#25a003;border-color:#25a003">DANH MỤC SẢN PHẨM</a>
            @foreach(app('Home')->getCategory() as $val)
            <a href="{{ url('') }}/category/{{ $val['id'] }}" class="list-group-item list-group-item-action {{ (request('id') == $val['id']) ? 'active-item' : '' }}">{{ $val['name'] }}</a>
            @endforeach
           
        </div>
    </div>  
    <!-- END left-category -->
    <div class="left-service">
        <div class="list-group" style="text-align: center";>
            <a href="#" class="list-group-item list-group-item-success active" style="background-color:#25a003;border-color:#25a003">HỖ TRỢ TRỰC TUYẾN</a>
            @foreach(app('Home')->getSupport() as $val)
            <div href="#" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="service-online col-sm-3">
                        <img class="rounded-circle" style="margin-top: 10px;" src="{{url('')}}/{{$val['avatar']}}" width="50">                                          
                    </div>
                    <div class="col-sm-9">
                        <ul>
                            <li class="text-left"><i class="fa fa-user" style="color: #79CDFE"></i> {{$val['name']}}</li>
                            <li class="text-left"><i class="fa fa-phone" style="color: blue"></i> {{$val['phone']}}</li>
                            @php
                                $email = $val['email'];
                                if(strlen($email) > 15){
                                    $explode = explode("@", $val['email']);
                                    $email1 = $explode[0].'@';
                                    $email2 = $explode[1];
                                }else{
                                    $email1 = $email;
                                    $email2 = '';
                                }
                                
                            @endphp
                            <li class="text-left"><i class="fa fa-envelope" style="color: orangered"></i> {{$email1}} <br>{{$email2}}</li>
                        </ul>                                           
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END left-service -->
    <div class="left-actor">
        <div class="list-group" style="text-align: center";>
            <a href="#" class="list-group-item active" style="background-color:#25a003;border-color:#25a003">ĐƠN VỊ LIÊN KẾT</a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="owl-carousel owl-theme">
                    @foreach(app('Home')->getLink() as $val)
                    <a href="{{ $val->link }}"">
                    <div class="item-partner"><img src="{{url('')}}/{{$val['avatar']}}"alt="">
                    </div>
                    </a>
                    @endforeach
                </div>
            </a>
        </div>
    </div>
</div>
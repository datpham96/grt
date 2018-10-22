@extends('backend.Layouts.default')
@section('title' , 'Thông tin người dùng')
@section('myJs')
<!--include modal-->
<script src="{{ url('')}}/js/directives/backend/modal/chossePasswordModal.js"></script>
<script src="{{url('')}}/js/factory/service/backend/userService.js"></script>
<script src="{{ URL::asset('/js/ctrl/backend/userInfoCtrl.js') }}"></script>
@endsection

@section('content')

<div class="col-md-8 col-md-offset-2" ng-controller="userInfoCtrl">
    <div class="row">
        <div class="eq-height">
            <div class="col-sm-4 eq-box-sm">
                <!--Panel with Header-->
                <!--===================================================-->
                <div class="panel cat-panel">
                    
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-user" data-parsley-validate ng-enter="actions.update()" ng-dom="formUpdateUser">
                            <div class="col-md-7 col-md-offset-1">
                                <div class="form-group">
                                    <div class="cat-color-user">Họ tên</div>
                                    <input type="text" placeholder="Họ tên" class="form-control" ng-model="data.name" required>
                                </div>
                                <div class="form-group">
                                    <div class="cat-color-user">Email</div>
                                    <input type="text" class="form-control" ng-model="data.email"required data-parsley-type="email" placeholder="Email" ng-disabled="true">
                                </div>
                                <div class="form-group">
                                    <div class="cat-color-user">Điện thoại</div>
                                    <input type="text" class="form-control" ng-model="data.phone" required placeholder="Điện thoại" data-parsley-type="number" >
                                </div>
                                <div class="form-group">
                                    <button type="button" ng-click="actions.showModal()" class="btn btn-primary">Đổi mật khẩu</button>
                                    <button type="button" class="btn btn-primary" ng-click="actions.update()">Cập nhật thông tin</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <img id="blah" class="avatar" ng-src="@{{ actions.loadImage(data.avatar) }}" alt=""
                                         style="width: 140px; height: 150px;">
                                    <br>
                                    <div>
                                        <button class="cat-button-file" onclick="$('#upload-user').click()">Chọn file</button>
                                        <input onchange="readURL(this);" type="file" name="avatar" id="upload-user" style="display: none;" ng-model="data.avatar">
                                    </div>	
                                </div>							
                            </div>
                        </form>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Panel with Header-->

            </div>

        </div>
    </div>
    
    <chosse-password-modal  form-update-password="formUpdatePassword" modal-dom="chossePasswordModal" data='data.dataPassword' ret-func="actions.successUpdate(data)"></chosse-password-modal>
</div>
@endsection
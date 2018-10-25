<!-- Modal inser user-->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">@{{title}}</h5>
            </div>
            <div class="modal-body">
                <div class=" panel-primary">
                    <!--Panel body-->
                    <div class="panel-body">
                        <form id="form-user" class="form-horizontal" id="form-user" data-parsley-validate ng-dom="formUpdateUser" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
                                <div class="col-sm-8">
                                    <ul ng-repeat="error in modalData.errors">
                                        <li style="color: #dd4b39; list-style-type: none;">@{{ error}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Loại tài khoản: </label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-width="100%" ng-model="modalData.is_ldap" watch ng-disabled="modalData.id">
                                        <option value="">Tự quản lý</option>
                                        <option value="1">Xác thực LDAP</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group" ng-if="modalData.is_ldap == '1' && !modalData.id">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">LDAP: </label>
                                <div class="col-sm-9">
                                    <a class="btn btn-primary col-sm-12" ng-click="actions.showModalLdap(modalData.department_id)">Chọn tài khoản LDAP</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Đơn vị: </label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-width="100%"  ng-model="modalData.department_id" ng-change="data.disableBtnUpdate()" required>
                                        <option ng-repeat="item in listDep" ng-value="item.id"> 
                                            @{{data.showDepth(item.depth)}} @{{item.name}} (Chủ trì: @{{item.registed_host}}/@{{item.host}} - Khách mời @{{item.registed_guest}}/@{{item.guest}})
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Họ và tên: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Họ và tên" class="form-control input-sm" ng-model="modalData.name"
                                           id="demo-is-inputsmall" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Email công vụ: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Email công vụ" class="form-control input-sm"  ng-model="modalData.email"
                                           id="demo-is-inputsmall" required data-parsley-type="email" ng-disabled="disableEmail">
                                    <div style="margin-top: 5px; color: red;" ng-repeat="err in modalData.errors.email">@{{err}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Điện thoại: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Điện thoại" class="form-control input-sm"  ng-model="modalData.phone"
                                           id="demo-is-inputsmall" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Vai trò: </label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-width="100%" required ng-model="modalData.roles"
                                            ng-change="data.disableBtnUpdate()"
                                            ng-disabled="!modalData.department_id"
                                            >
                                        <option ng-repeat="(key, value) in listRole" value="@{{key}}" >@{{value}}</option>
                                    </select>
                                    <label style="margin-top: 10px;"><input type="checkbox" ng-model="modalData.isDepartmentAdmin"> Quản trị đơn vị</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
                                <div class="col-md-8">
                                    <input name="avatar" onchange="readURL(this)" type="file" ng-model="modalData.avatar" name="" value="123" placeholder="">
                                    <br>
                                    <img id="blah" class="avatar" ng-src="@{{ actions.loadImage(modalData.avatar)}}" alt="avartar" style="width: 140px; height: 150px;">
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="actions.update()" ng-disabled="(modalData.is_ldap == '1' && !statusLdap) || disableUpdateBtn">Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
    <chosse-ldap-modal modal-dom-ldap="chosseLdapModal"  ret-func="actions.infoLdapUser(data)" dep-id="depId"></chosse-ldap-modal>
</div>
<!-- End Modal User-->
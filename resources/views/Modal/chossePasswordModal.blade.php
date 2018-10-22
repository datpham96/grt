<!-- Modal inser user-->
<div class="modal fade" id="edit-password-info-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Đổi mật khẩu</h5>
            </div>
            <div class="modal-body">
                <div class=" panel-primary">

                    <!--Panel heading-->
                    <!--Panel body-->
                    <div class="panel-body">
                        <form class="form-horizontal" data-parsley-validate ng-dom="formUpdatePassword" ng-enter="actions.changePassword()"> 
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="demo-is-inputsmall">Mật khẩu hiện tại: </label>
                                <div class="col-sm-8">
                                    <input autocomplete="off" type="password" placeholder="Mật khẩu hiện tại" class="form-control"
                                           required ng-model="data.currentPassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="demo-is-inputsmall">Mật khẩu mới: </label>
                                <div class="col-sm-8">
                                    <input autocomplete="off" type="password" placeholder="Mật khẩu mới" class="form-control"
                                           required ng-model="data.newPassword">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="actions.changePassword()">Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
    <!-- End Modal User-->
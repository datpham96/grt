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
                        <form class="form-horizontal" data-parsley-validate ng-dom="formSupport" enctype="multipart/form-data" ng-enter="actions.update()">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Họ và tên: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Họ và tên" class="form-control input-sm" ng-model="getData.name" id="demo-is-inputsmall" required>
                                    <div style="margin-top: 5px; color: red;" ng-repeat="err in errors.name">@{{err}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Email: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Email" class="form-control input-sm"  ng-model="getData.email" id="demo-is-inputsmall" required data-parsley-type="email">
                                    <div style="margin-top: 5px; color: red;" ng-repeat="err in errors.email">@{{err}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Điện thoại: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Điện thoại" class="form-control input-sm"  ng-model="getData.phone"
                                           id="demo-is-inputsmall" required>
                                    <div style="margin-top: 5px; color: red;" ng-repeat="err in errors.phone">@{{err}}</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
                                <div class="col-md-8">
                                    <div class="input-group my-btn-image" >
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Chọn ảnh
                                            </a>
                                        </span>
                                        <input disabled="" style="display: none;" ng-model="getData.avatar" id="thumbnail" class="form-control" type="text" name="imageTitle">
                                            
                                    </div>
                                    <p class="text-danger" style="margin-top: 5px;" ng-repeat="er in errors.avatar">
                                        @{{ er }}
                                    </p>
                                    <img id="holder" ng-dom="domAvatar" style="margin-top:15px;max-height:150px; max-width: 140px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="actions.update()">Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-dom='modalDom'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">@{{title}}</h5>
            </div>
            <div class="modal-body">
                <div class=" panel-primary">
                    <!--Panel body-->
                    <div class="panel-body">
                        <form class="form-horizontal" data-parsley-validate ng-dom="formData" enctype="multipart/form-data" ng-enter="actions.update()">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên chuyên mục: </label>
                                <div class="col-sm-9">
                                    <input autocomplete="off" type="text" placeholder="Tên chuyên mục" class="form-control" ng-model="getData.name" id="demo-is-inputsmall" required>
                                    <div style="margin-top: 5px; color: red;" ng-repeat="err in errors.name">@{{err}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="demo-is-inputsmall">Chuyên mục cha: </label>
                                <div class="col-sm-9">
                                    <select class="form-control" data-width="100%" ng-model="getData.parent_id">
                                        <option value="">---Chuyên mục cha---</option>
                                        <option ng-if="checkIf != val.id && val.parent_id == 0" ng-value="val.id" ng-repeat="(key, val) in listParent">@{{ val.name }}</option>
                                    </select> 
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